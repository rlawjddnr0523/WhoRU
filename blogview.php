<!doctype html>
<html lang="kr">
<?php session_start();
    if ($_SESSION['userid'] == null){
?><script>alert("로그인 후 이용가능한 콘텐츠 입니다."); history.back();</script><?php
    }
?>
<head>
    <title>블로그 뷰</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h4><a href="index.php" class="logo">WRU.</a></h4>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="index.php"><span class="fa fa-home"></span> 메인페이지</a>
            </li>
            <li>
                <a href="blogview.php"><span class="fa fa-user"></span> 블로그</a>
            </li>
            <li>
            <?php
            if (isset($_SESSION['userid']) === true) {
                ?><a href = "uploadpost.php" ><span class="fa fa-angle-double-up"></span> 게시물올리기</a>
                <?php
            }else{
                ?><a href="login.php"><span class="fa fa-check"></span> 로그인</a><?php
            }
            ?>
            </li>
            <li>
                <a href="ver1/mainpage.php"><span class="fa fa-sticky-note"></span> ver.1</a>
            </li>
            <li>
                <a href="myinfo.php"><span class="fa fa-cogs"></span> 내정보</a>
            </li>
        </ul>

        <div class="footer">
            <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib.com</a>
            </p>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">메인페이지</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="viewallpost.php">모든 게시물 보기</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION) === false){session_start();}
                            if (isset($_SESSION['userid']) === false){
                                ?>
                                <a href="login.php" class="nav-link">로그인</a>
                                <?php
                            }else{
                                ?>
                                <a href="infodeveloper.php" class="nav-link">개발자 정보</a>
                                <?php
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION) === false){session_start();}
                            if (isset($_SESSION['userid']) === false){
                                ?>
                                <a href="regist.php" class="nav-link">회원가입</a>
                                <?php
                            }else{
                                ?>
                                <a href="logout.php" class="nav-link">로그아웃</a>
                                <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $userid = $_SESSION['userid'];
        $conn = mysqli_connect("localhost", "kjwook0523", "Kimmark4167*", "kjwook0523");
        $sql = "SELECT * FROM blog";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            if ($_GET['id'] == $row['contents_id']) {
                echo "<h1>$row[blog_title]</h1>";
                echo "<h3>$row[blog_contents]</h3><br/><br/><br/>";
                echo "<h6>$row[writed]에 포스팅됨</h6>";
                echo "<h6>$row[writer]가 올림</h6><br/><br/>";
                echo $row['writer'];
                if ($userid == $row['writer']) {
                    ?><h5><span class="fa fa-list"></span>메뉴</h5>
                    <div class="sdfsdf" onclick="del()">게시물 삭제하기</div>
                    <div class="sdfsdfsdf" onclick="retuch()">게시물 수정하기</div>
                    <?php
                } else {
                    ?><h6><span class="fa fa-list"></span>당신은 이 게시물을 삭제하거나 수정할수 없습니다.</h6><?php
                }
            }
        }
        ?>
        <style>
            .sdfsdf:hover {
                cursor: pointer;
                text-decoration-line: underline;
            }
            .sdfsdfsdf:hover {
                cursor: pointer;
                text-decoration-line: underline;
            }
        </style>
        <script>
            function del() {
                var a = 'id=<?php echo $_GET['id']; ?>';
                var b = confirm('삭제 페이지로 이동하시겠습니까?');
                if(b == true) {
                    location.href = 'delete.post.php?' + a;
                }
            }
            function retuch() {
                var b = 'id=<?php echo $_GET['id']; ?>';
                confirm('수정 페이지로 이동하시겠습니까?');
                location.href='retouch.post.php?'+ b;
            }
        </script>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>