<?php
$conn = mysqli_connect("localhost" , "kjwook0523", "Kimmark4167*", "kjwook0523");
$query = "Select * from account_info";

$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)){
    if ($row['member_id'] == $_GET['memberid']){
        echo "$row[member_id]";
    }
}
?>
<meta charset="utf-8">
<h5>만일 자신의 정보가 보이지 않는다면, 로그아웃을 했다가 다시 로그인해주시기 바랍니다.</h5>
