<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>메인페이지</title>
	<?php
        sleep(1);
		session_start();
	 ?>
	<style type="text/css">
		.header {
			text-decoration-line: none;
			color: black;

		}
		.title {
			font-size: 30px;
			font-weight: bold;
			text-decoration-line: none;
			color: black;
		}
		.nav {
			text-decoration-line: none;
			color: black;
			margin-left: auto;
			margin-right: 15px;
		}
		.t {
			display:  flex;
			border-bottom: 1px solid black;
			vertical-align: middle;
		}
		.tt{
			margin-left: auto;
			text-decoration-line: none;
			color: black;
		}
		.ttt {
			font-size: 10px;
			font-weight: bold;
		}
		.header{
			margin-left: auto;
			vertical-align: middle;
		}
		.subtitle {
			display: flex;
			margin-left: auto;
		}
	</style>
</head>
<body>
	<?php

	?>
	<div class="t">
		<div class="ttt">BlogOnlyForMe</div>
		<?php
        	if (isset($_SESSION) === false){session_start();}
			if (isset($_SESSION['userid']) === false){
        	?>
        		<a href="regist.php" class="header">회원가입</a>
        	<?php
        	}else{
        		?>
        		<a href="logout.php" class="header">로그아웃</a>
        		<?php
        	}
    	?>
	</div>
	<div class="header">
		<div class="title">
			<a href="mainpage.php" class="title">나만 올ㄹ릴거야.com</a>
		</div>
        <?php
        if (isset($_SESSION['userid'])===true){
        ?><a href="how.php" class="nav" class="subtitle" class="title">글 올리는 법<br/></a>
        <a href="mypage.php?memberid=<?php echo $_GET['memberid']; ?>" class="nav" class="subtitle"class="title "><?php echo $_SESSION['userid'];?>로 로그인 된 상태입니다. 내정보 보기<br/></a><?php
            } else {
            ?><a href="login.php" class="nav" class="subtitle">로그인 해주세요!<br/></a><?php
        }
        ?>

		</div>
	</div>
	<div class="main">
        <h3><script>var a = new Date(); document.write("오늘의 날짜 : " + a.toLocaleDateString())</script></h3><h1>오늘의 게시물!</h1>
		<?php
			$host = 'localhost';
    		$user = 'kjwook0523';
    		$pw = 'Kimmark4167*';
    		$dbName = 'kjwook0523';

			$mysqli = mysqli_connect($host, $user, $pw, $dbName);

 			$sql = "SELECT * FROM blog WHERE writed >= current_date";

 			$result = mysqli_query($mysqli, $sql);  

 			while ($row = mysqli_fetch_array($result)) {
 				?><div class="no"><h2><?php echo "$row[blog_order]"; ?>번째 게시물 입니다.</h2></div>
 				<a href="blogview.php?id=<?php echo "$row[contents_id]"; ?>" class="blog_title"><h4><?php echo "$row[blog_title]"; ?></h4></a>
 				<?php
            }
?>
        <?php

        if (isset($_SESSION['userid']) === true) {
            ?><a href = "uploadcontents.php" > 게시물올리기</a>
        <?php
 		}else{
        ?><a href="login.php">로그인 후 이용하여 주세요</a><?php
        }
 		?>
	</div>
</body>
</html>