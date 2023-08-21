<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $target_dir = "images/"; $target_file = $target_dir . 
    basename($_FILES["image"]["name"]); $uploadOk = 1; 
    $imageFileType = strtolower(pathinfo($target_file, 
    PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake 
    // image
    $check = getimagesize($_FILES["image"]["tmp_name"]); 
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . 
        "."; $uploadOk = 1;
    } else {
        echo "File is not an image."; $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) { echo "Sorry, file 
        already exists."; $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 5000000) { // 5MB echo 
        "Sorry, your file is too large."; $uploadOk = 0;
    }
    // Allow certain file formats
    $allowed_formats = array("jpg", "jpeg", "png", 
    "gif"); if (!in_array($imageFileType, 
    $allowed_formats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files 
        are allowed."; $uploadOk = 0;
    }
    if ($uploadOk == 0) { echo "Sorry, your file was not 
        uploaded.";
    } else {
        if 
        (move_uploaded_file($_FILES["image"]["tmp_name"], 
        $target_file)) {
            echo "The file " . 
            basename($_FILES["image"]["name"]) . " has 
            been uploaded.";
        } else {
            echo "Sorry, there was an error uploading 
            your file.";
        }
    }
}
?>
