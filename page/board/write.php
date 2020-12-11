<!doctype html>
<head>
<meta charset="UTF-8">      
<title>오팔멋쟁이</title>

<!-- style -->
<link rel="stylesheet" href="../../css/reset.css">
<link rel="stylesheet" href="../../css/index.css">
<link rel="stylesheet" href="../../css/slick.css">

<!-- 아이콘 -->
<link rel="apple-touch-icon" sizes="180x180" href="../../../img/배너.png"/>
<link rel="icon" type="image/png" sizes="192x192" href="../../../img/배너.png"/>

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
              <a href="../../../index.html">trend</a><br>
              <a href="../../../travel.html">travel</a><br>
              <a href="../../../hobby.html">hobby</a><br>
              <a href="../../../music.html">music</a><br>
              <a href="../../index.php" class="check">board</a>
            </div>
            <!-- //header -->
          </div>
          <div class="big_title">Board</div>
          <div class="small_title">오팔 친구들과 자유롭게 소통해보세요</div>
          <!-- //banner -->
        </div>
        </div>
    </div>
    <div id="board_write">
        <h4 class="h4h4">게시글을 작성해 주세요</h4>
            <div id="write_area">
                <form action="write_ok.php" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" placeholder="글쓴이" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div class="wi_line_content"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>