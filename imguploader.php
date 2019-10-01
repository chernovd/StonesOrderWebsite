<?php
    include_once "components/db/db_connect.php";
?>
<html lang="EN">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="imguploader.php" method="POST" enctype="multipart/form-data">
            Image
            <input type="file" name="image" id="image">
            <input type="submit" value="upload" name="upload">
        </form>
        <?php
        $TableName="product";
        if(isset($_POST["upload"]) && isset($_FILES["image"]))
        {
            //check the type of the image
            if($_FILES["image"]["type"]=="image/jpeg" || $_FILES["image"]["type"]=="image/png"  || $_FILES["image"]["type"]=="image/jpg"  || $_FILES["image"]["type"]=="image/gif")
            {             
                $target_dir = "picture/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;               
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false)
                {
                    $uploadOk = 1;
                } 
                else
                {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0)
                {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                }
                else
                {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
                    {
                       $pics= basename( $_FILES["image"]["name"]);    
                       $SQLstring2 = "INSERT INTO .$TableName. (product_image) VALUES (?);";
                        if ($stmt = mysqli_prepare($DBConnect, $SQLstring2))
                        {
                            mysqli_stmt_bind_param($stmt, 's',$pics);          
                            $QueryResult2 = mysqli_stmt_execute($stmt);
                        }
                       echo"Upload was succes.";

                    } 
                    else
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } 
            }
        }
        ?>
    </body>
</html>