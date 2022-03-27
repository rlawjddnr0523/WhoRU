<!doctype html>
<?php
session_start();
?>
<html lang="kr">
<head>
    <title>게시물 업로드</title>
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
                <a href="viewallpost.php"><span class="fa fa-user"></span> 블로그</a>
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
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>by Colorlib.com
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">메인페이지</a>
                        </li>
                        <li class="nav-item">
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

        <h2 class="mb-4">WRU.</h2>
        <h6 class="mb-4">Who Are You.</h6>
        <h3 class="mb-4"><span class="fa fa-bars"></span> 게시물 올리기</h3>
        <h6 class="mb-4"><span class="fa fa-address-card"></span> 사용자 이름 : <?php echo $_SESSION['userid']; ?></h6>
        <form method="post" action="upload.post.php">
        <table>
            <tr>
                <td><label>제목 : </label></td><td><input type="text" placeholder="게시물 제목을 쓰세요" required size = 17px id="title" name="title"></td>
            </tr>
            <tr>
                <td><label>내용 : </label></td><td><textarea placeholder="게시물 내용을 쓰세요" required style="resize: none; width: 200px; height: 100px" id="contents" name="contents"></textarea></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" value="게시물 올리기"></td>
            </tr>
        </table>
        </form>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
