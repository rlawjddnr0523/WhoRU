<html>
<meta charset="utf-8">
<script type="text/javascript">
    var pw_passed = true;  // 추후 벨리데이션 처리시에 해당 인자값 확인을 위해

    function fn_pw_check() {
        var pw = document.getElementById("sdf").value; //비밀번호
        var pw2 = document.getElementById("sdfsdf").value; // 확인 비밀번호
        var id = document.getElementById("id").value; // 아이디

        pw_passed = true;

        var pattern1 = /[0-9]/;
        var pattern2 = /[a-zA-Z]/;
        var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거
        var pw_msg = "";

        if(id.length == 0) {
            alert("아이디를 입력해주세요");
            return false;
        }

        if(pw.length == 0) {
            alert("비밀번호를 입력해주세요");
            return false;
        } else {
            if( pw  !=  pw2) {
                alert("비밀번호가 일치하지 않습니다.");
                return false;
            }
        }
        if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50){
            alert("영문+숫자+특수기호 8자리 이상으로 구성하여야 합니다.");
            return false;
        }
        if(pw.indexOf(id) > -1) {
            alert("비밀번호는 ID를 포함할 수 없습니다.");
            return false;
        }
        var SamePass_0 = 0; //동일문자 카운트
        var SamePass_1 = 0; //연속성(+) 카운드
        var SamePass_2 = 0; //연속성(-) 카운드
        for(var i=0; i < pw.length; i++) {
            var chr_pass_0;
            var chr_pass_1;
            var chr_pass_2;
            if(i >= 2) {
                chr_pass_0 = pw.charCodeAt(i-2);
                chr_pass_1 = pw.charCodeAt(i-1);
                chr_pass_2 = pw.charCodeAt(i);
                //동일문자 카운트
                if((chr_pass_0 == chr_pass_1) && (chr_pass_1 == chr_pass_2)) {
                    SamePass_0++;
                }
                else {
                    SamePass_0 = 0;
                }
                //연속성(+) 카운드
                if(chr_pass_0 - chr_pass_1 == 1 && chr_pass_1 - chr_pass_2 == 1) {
                    SamePass_1++;
                }
                else {
                    SamePass_1 = 0;
                }
                //연속성(-) 카운드
                if(chr_pass_0 - chr_pass_1 == -1 && chr_pass_1 - chr_pass_2 == -1) {
                    SamePass_2++;
                }
                else {
                    SamePass_2 = 0;
                }
            }

            if(SamePass_0 > 0) {
                alert("동일문자를 3자 이상 연속 입력할 수 없습니다.");
                pw_passed=false;
            }

            if(SamePass_1 > 0 || SamePass_2 > 0 ) {
                alert("영문, 숫자는 3자 이상 연속 입력할 수 없습니다.");
                pw_passed=false;
            }

            if(!pw_passed) {
                return false;
                break;
            }
        }
        alert("성공하였습니다.")
        return true;
    }
</script>
<!doctype html>
<?php
session_start();
?>
<html lang="kr">
<head>
    <title>회원가입</title>
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
                <a href="myinfo.php?memberid=<?php echo $_GET['memberid']; ?>"><span class="fa fa-cogs"></span> 내정보</a>
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
                        <li class="nav-item">
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
                        <li class="nav-item active">
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
        <form method="post" action="regist.post.php">
            <table border="1">
                <tr>
                    <td>아이디</td>
                    <td><input type="text" size="30" name="id" required minlength="5" maxlength="15" id="id"></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" size="30" name="pwd" required minlength="10" id="sdf"></td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                    <td><input type="password" size="30" name="pwd2" required id="sdfsdf"></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><input type="text" size="30" maxlength="4" name="name" required></td>
                </tr>
                <tr>
                    <td>e-mail</td>
                    <td><input type="email" size="30" name="email" id="email"required></td>
                </tr>
            </table>
            <button type="button" onclick="fn_pw_check()"><span class="fa fa-address-card-o"></span>비밀번호 확인하기</button>
            <button type=submit><span class="fa fa-check-square-o"></span>회원가입하기</button><br/>
        </form>
        <h6>회원가입은 한 번만 해주세요! 시스템 오류가 납니다ㅠㅠ</h6>
        <h6>만일 오류가 났을 경우에는 yeoback07@icloud.com 으로 메일 날려주시기 바랍니다!</h6>
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>