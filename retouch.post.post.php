<meta charset="utf-8">
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
$id = $_GET['id'];
$sql = "UPDATE blog SET blog_title='$title' WHERE contents_id='$id'";

$query = mysqli_query($mysqli, $sql);
$sql2 = "UPDATE blog SET blog_contents='$contents' WHERE contents_id='$id'";
$query2 = mysqli_query($mysqli, $sql2);
if ($query) {
    echo "Upload Success";?>
    <?php
    if ($query2){
        ?><script>alert("수정에 성공하였습니다."); location.href = 'index.php';</script><?php
    }
} else {
    echo "Upload failed";?>
    <script>alert("수정에 실패하였습니다.. 다시 시도하여 주십시오<?php echo mysqli_error($mysqli);?>"); history.back();</script><?php
}
?>

