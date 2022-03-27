<meta charset="utf-8">

<?php

	$host = 'localhost';
    $user = 'kjwook0523';
    $pw = 'Kimmark4167*';
    $dbName = 'kjwook0523';
    $mysqli = mysqli_connect($host, $user, $pw, $dbName);

    $sql = "SELECT * FROM blog";

    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($result)) {
    	if ($_GET['id'] == $row['contents_id']) {
			echo "<h1>$row[blog_title]</h1>";
			echo "<h3>$row[blog_contents]</h3><br/><br/><br/>";
            echo "<h6>$row[writer]</h6>";
    	}
	}

?>
<title><?php echo "$row[blog_title]"; ?></title>