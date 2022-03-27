<?php
	$host = 'localhost';
    $user = 'kjwook0523';
    $pw = 'Kimmark4167*';
    $dbName = 'kjwook0523';
    $mysqli = mysqli_connect($host, $user, $pw, $dbName);

	$uid = $_GET['username'];
	$sql = "select * from account_info;";
    $result = mysqli_query($mysqli, $sql);
	$member = mysqli_fetch_array($result);
	if($member['name']==$uid){
?>
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 DB에 등록된 (<?php echo "$member[name]";?>) 이름 정보와 동일합니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>는 DB에 등록된적이 없는 아이디 입니다.</div>
        <script>
            alert("<?php echo $uid ?>는 등록된적이 없는 아이디 입니다. 회원가입후 이용하여주세요.");
            location.href = 'mainpage.php';
        </script>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>
<meta charset="utf-8">