<?php include("../db.php"); ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>오팔멋쟁이</title>

<!-- style -->
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="../css/slick.css">

<!-- 아이콘 -->
<link rel="apple-touch-icon" sizes="180x180" href="../img/배너.png"/>
<link rel="icon" type="image/png" sizes="192x192" href="../img/배너.png"/>

<!-- font -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bannersize">
        <div class="border">
        <div class="container">
          <!-- banner -->
          <div class="banner">
            <!-- title -->
            <!-- <div class="title">
              <div class="big_title">오팔 멋쟁이</div><br>
              <div class="small_title">
                당신을 멋쟁이로 만들어 드립니다.<br>새롭게 떠오르고 있는 소비층 오팔세대를 위한 웹사이트
              </div><br>
              <div class="line"></div>
            </div> -->
            <!-- //title -->
            <!-- header -->
            <div class="header">
              <a href="../index.html">trend</a><br>
              <a href="../travel.html">travel</a><br>
              <a href="../hobby.html">hobby</a><br>
              <a href="../music.html">music</a><br>
              <a href="index.php" class="check">board</a>
            </div>
            <!-- //header -->
          </div>
          <div class="big_title">Board</div>
          <div class="small_title">오팔 친구들과 자유롭게 소통해보세요</div>
          <!-- //banner -->
        </div>
        </div>
    </div>
    <div id="board_area"> 
        <table class="list-table">
            <thead>
                <tr>
                    <th class="widthth">번호</th>
                    <th>제목</th>
                    <th class="widthth">글쓴이</th>
                    <th class="widthth">작성일</th>
                    <th class="widthth">조회수</th>
                </tr>
            </thead>
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $sql = mq("select * from board");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                $list = 5; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수
    
                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                $block_end = $block_start + $block_ct - 1; //블록 마지막 번호
    
                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
    
                $page=$_GET['page'];
                $view_article=5;//페이지당 게시물 개수
                if(!$page)$page=1;
                $start=($page-1)*$view_article;
           
                // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                $sql = mq("select * from board order by idx desc limit $start,$view_article"); 
                while($board = $sql->fetch_array()){
                    //title변수에 DB에서 가져온 title을 선택
                    $title=$board["title"]; 
                    if(strlen($title)>30){ 
                        //title이 30을 넘어서면 ...표시
                        $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }
            ?>
            <tbody>
                <tr>
                    <td width="70"><?php echo $board['idx']; ?></td>
                    <td width="500"><a href="page/board/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
                    <td width="120"><?php echo $board['name']?></td>
                    <td width="100"><?php echo $board['date']?></td>
                    <td width="100"><?php echo $board['hit'];?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>

        <!---페이징 넘버 --->
        <div id="page_num">
            <ul>
            <?php
                if($page <= 1){ //만약 page가 1보다 크거나 같다면
                    echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
                }else{
                    echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }

                if($page <= 1){ //만약 page가 1보다 크거나 같다면 빈값
                }else{
                    $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                    echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                }

                for($i=$block_start; $i<=$block_end; $i++){ 
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                    if($page == $i){ //만약 page가 $i와 같다면 
                        echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                    }else{
                        echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
                    }
                }
                
                if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                }else{
                    $next = $page + 1; //next변수에 page + 1을 해준다.
                    echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                 
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                    echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                    echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }
            ?>
            </ul>
        </div>
      
        <div id="write_btn">
          <a href="page/board/write.php"><button>글쓰기</button></a>
        </div>
    </div>
</body>
</html>