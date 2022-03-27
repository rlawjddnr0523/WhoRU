<?php
session_start();
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

$name = $_SESSION['userid'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$writed = date("Y-m-d H:i:s");
$sdfsdf = GenerateString(15);
$sql = "insert into blog (blog_title, blog_contents, writed, writer, contents_id) values('$title','$contents','$writed','$name','$sdfsdf')";

$query = mysqli_query($mysqli, $sql);

if ($query) {
	echo "Upload Success";?>
    <script>alert("업로드에 성공하였습니다."); location.href = 'mainpage.php';</script><?php
} else {
	echo "Upload failed";
}
?>