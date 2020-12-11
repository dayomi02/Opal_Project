<?php
	include("db.php");

	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Max-Age: 86400');
    header('Access-Control-Allow-Headers: x-requested-with');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
	
	if(isset($_GET['country'])){
        $country=$_GET['country'];
	}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compaatible" content="ie=edge"/>


	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="5858">
    <meta name="description" content="오팔멋쟁이">
    <meta name="keywords" content="여행지, 트렌드, 취미, 음악">
    <title>오팔멋쟁이_메인</title>

    <!-- style -->
    <link rel="stylesheet" href="../css/reset.css?ver=1">
	<link rel="stylesheet" href="../css/travel_sub.css?ver=1">
	<link rel="stylesheet" href="../css/slick.css?ver=1"/>

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
		<!-- <img src="../../img/travel/europe/파리.PNG"> -->
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
					<a href="trend.html">trend</a><br>
					<a href="travel.html" class="check">travel</a><br>
					<a href="hobby.html">hobby</a><br>
					<a href="music.html">music</a><br>
					<a href="./OPAL_BOARD/">board</a>
				</div>
				<!-- //header -->
			</div>
			<?php
				$sql = mq("SELECT DISTINCT contry_english, contry_korea FROM opalc WHERE contry_num=$country"); 
				while($opalc = $sql->fetch_array())
				{
					$contry_english=$opalc["contry_english"]; 
					$contry_korea=$opalc["contry_korea"];
			?>
				<div class="english"><?=$contry_english?></div>
				
				<!-- //banner -->
			</div>
		</div>
		<div class="container">
			<!-- main_background -->
			<main class="background">
				<!-- contents -->
				<div class="contents">
					<div class="content1">
						<div class="attraction"><?=$contry_korea?>에 가면 꼭 방문해야 하는 관광지는 어디일까요?</div>
					<?php
					}

					$sql = mq("SELECT DISTINCT num,title, place_img, place_address, place_link, content FROM opalc WHERE contry_num=$country ORDER BY num"); 
					while($opalc = $sql->fetch_array())
					{
						$num=$opalc["num"];
						$title=$opalc["title"]; 
						$place_img=$opalc["place_img"];
						$place_img_slice=explode('_',$place_img);
						// echo $place_img."<br>";
						// echo $place_img_slice[0]."<br>";
						// echo $place_img_slice[1]."<br>";
						// echo $place_img_slice[2]."<br>";
						// echo $place_img_slice[3]."<br>";
						// echo $place_img_slice[4];
						$place_address=$opalc["place_address"]; 
						$place_link=$opalc["place_link"]; 
						$content=$opalc["content"]; 
					
					?>
						<div class="place">
							<div class="num"><?=$num?></div>
							<div class="title"><?=$title?></div>
							<div class="position">
								<a href="<?=$place_link?>">
									<?=$place_address?>
								</a>
							</div><br><br><br><br><br>
							<div class="content">
								<?=$content?>						
							</div><br>
							<div class="contentimg">
								<div class="imgs">
									<div class="imgimg">
										<img src="../../<?=$place_img_slice[0]?>">
									</div>
									<div class="imgimg">
										<img src="../../<?=$place_img_slice[1]?>">
									</div>
									<div class="imgimg">
										<img src="../../<?=$place_img_slice[2]?>">
									</div>
									<div class="imgimg">
										<img src="../../<?=$place_img_slice[3]?>">
									</div>
									<div class="imgimg">
										<img src="../../<?=$place_img_slice[4]?>">
									</div>
								</div>
							</div>
						</div><br><br>
					<?php
					}//여행지 정보 출력
					?>
					</div>
					<div class="content2">
						<?php
							$sql = mq("SELECT DISTINCT contry_korea FROM opalf WHERE contry_num=$country"); 
							while($opalc = $sql->fetch_array())
							{
								$contry_korea=$opalc["contry_korea"];
						?>
						<div class="attraction">여행가서 못 먹고 오면 평생 후회할 <?=$contry_korea?> 추천 맛집을 소개해 드립니다!</div>
						<div class="restaurants">
							<!-- restaurant1 -->
							<?php
							}
							$sql = mq("SELECT DISTINCT contry_korea, food_store, num, food_address, food_link, food_img FROM opalf WHERE contry_num=$country ORDER BY num"); 
								while($opalc = $sql->fetch_array())
									{
										$contry_korea=$opalc["contry_korea"];
										$food_store=$opalc["food_store"];
										//$num=$opalc["num"];
										$food_address=$opalc["food_address"];
										$food_link=$opalc["food_link"];
										$food_img=$opalc["food_img"];
										$food_img_slice=explode('_',$food_img);
							?>
							<div class="restaurant">
								<div class="foodimg">
									<div class="foodimgimg"><img src="<?=$food_img_slice[0]?>"></div>
									<div class="foodimgimg"><img src="../../<?=$food_img_slice[1]?>"></div>
								</div>
								<a href="<?=$food_link?>">
									<div class="over">
										<div class="overtxt">
										식당으로 이동하시겠습니까 >>
									</div>
								</div>
							</a>
							<div class="title"><?=$food_store?></div>
							<a href="<?=$food_link?>">
								<div class="position"><?=$food_address?></div><br>
							</a>
						</div>
						<?php
							}//여행지 맛짐 추천
						?>
						<!-- //restaurant1 -->
					</div>
				</div>
			</div>
			<!-- //contents -->
		</main>
		<!-- //main_background -->
	</div>

	<!-- footer -->
	<div class="footer">
			
	</div>
	<!-- //footer -->
	<!-- script -->
	<script src="../js/jquery.min_1.12.4.js"></script>
	<script src="../js/slick.min.js"></script>
	<script>
		//이미지 갤러리
		$('.imgs').slick({
			autoplay: true,
			autoplaySpeed: 4000,
			lazyLoad: 'ondemand',
			slidesToShow: 4,
			slidesToScroll: 1
		});

		//음식 이미지
		$('.foodimg').slick({
			fade: true,             //가로로 움직이지 않고 나타나는 효과
    		arrows: false,
    		infinite: true,
    		autoplay: true,
    		autoplaySpeed: 4000,
			speed: 400,
			pauseOnHover: false
		});
	</script>
	<!-- //script -->
</body>
</html>