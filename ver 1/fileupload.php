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
if(isset($_POST['submit'])) {
    $host = 'localhost';
    $user = 'kjwook0523';
    $pw = 'Kimmark4167*';
    $dbName = 'kjwook0523';
    $mysqli = mysqli_connect($host, $user, $pw, $dbName);

    $name = $_POST['name'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $writed = date("Y-m-d H:i:s");
    $id = GenerateString(15);

    //Process the image that is uploaded by the user

    $target_dir = "html/blogforme/std_photo";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["image"]["name"],".jpeg"); // used to store the filename in a variable

    //storind the data in your database
    mysqli_query("INSERT INTO blog(writer,blog_title, blog_contents,writed,contents_id, image) VALUES ('$name','$title','$contents','$writed','$id','$image')";
}
?>