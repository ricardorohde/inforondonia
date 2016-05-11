<?php

$del = filter_input(INPUT_GET, 'del', FILTER_VALIDATE_BOOLEAN);
$upload_dir = 'uploads';

if (isset($del) && $del === true):
    $name = filter_input(INPUT_POST, 'filename');
    unlink($upload_dir . '/' . $name);

    echo json_encode(array("res" => true));
else:
    $tempFile = $_FILES['file']['tmp_name'];
    // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code <span id="IL_AD7" class="IL_AD">portable</span>.
    $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
    // Adding timestamp with image's name so that files with same name can be uploaded easily.
    $mainFile = $targetPath . time() . '-' . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $mainFile);
endif;