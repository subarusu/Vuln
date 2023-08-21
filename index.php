<!DOCTYPE html>
<html>
<head>
    <title>Simple Image Gallery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Image Gallery</h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload">
    </form>

    <div class="gallery">
        <?php
        $image_files = glob('images/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        foreach ($image_files as $image) {
            echo '<img src="' . $image . '" alt="' . basename($image) . '">';
        }
        ?>
    </div>
</body>
</html>
