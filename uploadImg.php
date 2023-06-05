<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //todo Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        //todo Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        //todo Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        //todo Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        //todo Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            //todo If everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
    <form action="uploadImg.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
        <br><br>
        <img id="preview" src="#" alt="Image Preview" style="display:none; max-width: 300px; max-height: 300px;">
        <br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = $('#preview');
            output.attr('src', reader.result);
            output.css('display', 'block');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>

</body>

</html>