<?php
	include("../../db.php");
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>오팔멋쟁이</title>

<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="../../css/index.css" />
<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/common.js"></script>

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
<div class="read">
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
	
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
	<!-- 글 불러오기 -->
	<div id="board_read" style="margin-top: 40px;">
		<h2><?php echo $board['title']; ?></h2>
			<div id="user_info">
				<?php echo $board['name']; ?>&nbsp;&nbsp;<?php echo $board['date']; ?>&nbsp;&nbsp;조회 : <?php echo $board['hit']; ?>
			    <div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="../../index.php">[목록으로]</a></li>
				<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
				<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
	</div>
	<!--- 댓글 불러오기 -->
	<div class="reply_view">
		<h3>* 댓글목록 *</h3>
			<?php
				$sql3 = mq("select * from reply where con_num='".$bno."' order by grp desc, sep asc");
				while($reply = $sql3->fetch_array()){ 
					// if ($reply['depth'] > 0 ) {  //공백출력
					// 	for($k = 0 ; $k < 10; $k++)
					// 		echo "&nbsp";  
					// 	echo("▶");
						?>
							<!-- <div class="dap_add">덧글 들여쓰기 공백 부분</div> -->
						<?php
					// }
			
			
			?>
			<div class="dap_lo">
				<?php
					if ($reply['lvl'] > 0 ) {  //공백출력
				?>
				<div class="dap_add">
					<img src="../../css/images/arrow.png" width="30px" height="30px">
					<div class="dep_add_content">
						<div><b><?php echo $reply['name'];?></b></div>
						<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
						<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
						<div class="rep_me rep_menu">
							<a class="dat_edit_bt" href="#">[수정]</a>
							<a class="dat_delete_bt" href="#">[삭제]</a>
						</div>
					</div>
				</div>
				<?php 
					}
					else{?>
					<div>
						<div><b><?php echo $reply['name'];?></b></div>
						<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
						<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
						<div class="rep_me rep_menu">
							<a class="dat_edit_bt" href="#">[수정]</a>
							<a class="dat_delete_bt" href="#">[삭제]</a>
							<a class="dat_add_bt" href="#">[덧글달기]</a>
						</div>
					</div>
					<?php }
				?>
				<!-- 댓글 수정 폼 dialog -->
				<div class="dat_edit">
					<form method="post" action="reply_modify_ok.php">
						<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
						<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
						<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
						<input type="submit" value="수정하기" class="re_mo_bt">
					</form>
				</div>
				<!-- 댓글 삭제 비밀번호 확인 -->
				<div class='dat_delete'>
					<form action="reply_delete.php" method="post">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
							<p>비밀번호 <input type="password" name="pw" style="height: 20px; margin-top: 20px;"/> <input type="submit" value="확인" style="width: 60px; height: 24px;"></p>
					</form>
				</div>
				<!-- 덧글 달기 폼 dialog -->
				<div class="dat_add">
					<form method="post" action="reply_add_ok.php">
						<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
						<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
						<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
						<textarea name="content" id="re_content2"></textarea>
						<button class="re_mo_bt">덧글 남기기</button>
					</form>
				</div>
			</div>
		<?php } ?>

		<!--- 댓글 입력 폼 -->
		<div class="dap_ins">
			<form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
				<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
				<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
				<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
				<textarea name="content" id="re_content"></textarea>
				<button class="re_bt">댓글</button>
			</form>
		</div>
	</div><!--- 댓글 불러오기 끝 reply view -->
	</div>
	<div id="foot_box"></div>
	
</body>
</html>