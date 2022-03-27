<meta charset="utf-8">
<?php
function GenerateString($length)
{
    $characters  = "0123456789";
    $characters .= "abcdefghijklmnopqrstuvwxyz";
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $characters .= "_";

    $string_generated = "";

    $nmr_loops = $length;
    while ($nmr_loops--)
    {
        $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string_generated;
}
 $host = 'localhost';
 $user = 'kjwook0523';
 $pw = 'Kimmark4167*';
 $dbName = 'kjwook0523';
 $mysqli = mysqli_connect($host, $user, $pw, $dbName);
 
 $id=$_POST['id'];
 $password=$_POST['pwd'];
 $password2=$_POST['pwd2'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $created = date("Y-m-d H:i:s");
 $memberid = GenerateString(20);
 
 $sql = "insert into account_info (id, pwd, name, email, created, member_id) values('$id','$password','$name','$email','$created','$memberid')";

 $result = mysqli_query($mysqli ,$sql);
 if($result){
    ?><script type="text/javascript">alert("회원가입에 성공하였습니다.")</script>
        <h1>회원가입에 성공하였습니다!!</h1>
        <a href="mainpage.php" class="buttn">돌아가기</a><br/>
        <style type="text/css">
            .buttn {
                font-size: 50px;
                color: black;
            }
        </style>
    <?php
 }else{
  ?> <script> alert("회원가입에 실패하였습니다."); </script> <?php
 }
?>