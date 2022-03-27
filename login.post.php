<meta charset="utf-8">
<?php
$mysqli = mysqli_connect("localhost", "kjwook0523", "Kimmark4167*", "kjwook0523");
$id = $_POST['id'];
$pwd = $_POST['pwd'];

$query = "SELECT * FROM account_info WHERE id = '{$id}'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
$password = $row['pwd'];
$row['id'];

foreach($row as $key => $r){
    echo "{$key} : {$r} <br>";
}

$passwordresult = ($pwd == $password);
if($passwordresult === true) {
    session_start();
    $_SESSION['userid'] = $row['id'];
    $_SESSION['memberid'] = $row['member_id'];
    print_r($_SESSION);
    echo $_SESSION['userid'];
    ?><script>
        alert("로그인에 성공했습니다.<?php echo $_SESSION['memberid'];?>");
        location.href = "index.php?memberid="+ "<?php echo "$row[member_id]";?>";
    </script>
    <?php
}else{
    ?><script>
        alert("로그인에 실패하였습니다.");
        location.href = "index.php";
    </script>
    <?php
}
?>
