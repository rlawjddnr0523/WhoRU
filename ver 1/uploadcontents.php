<meta charset="utf-8">
<script type="text/javascript">
function checkid(){
	var userid = document.getElementById("name").value;
	if(userid)
	{
		url = "checkid.php?username="+userid;
			window.open(url);
		}else{
			alert("아이디를 입력하세요");
		}
	}
    document.getElementById("bttn").style.display="none";
</script>
<form method="POST" action="upload.post.php">
	<?php session_start(); echo $_SESSION['userid'];?><br/>
	<input type="text" name="title"  placeholder="제목을 입력하세요" required><br/>
	<textarea name="contents" placeholder="내용을 입력하세요"required></textarea><br/>
	<input type="file" name="image" id="image" value="사진 올리기"><br/>
    <button type="submit" value="올리기" id="btn">업로드 하기</button>
</form>