<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <?php
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "kjwook0523", "Kimmark4167*", "kjwook0523");
        $sql = "DELETE FROM blog WHERE contents_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
        ?>
<script type="text/javascript">
        alert("성공적으로 삭제되었습니다.");
        history.back();<?php
    } else { ?>
        location.href = "blogview.php?id=" +<?php $id ?>;<?php
    }
        ?>
</script>
<head>

</head>
<body>

</body>
</html>