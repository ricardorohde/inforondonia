<?php

$upload_dir = 'uploads';
if (isset($del) && $del === true):
    $name = filter_input(INPUT_POST, 'filename');
    unlink($upload_dir . '/' . $name);
    echo json_encode(array("res" => true));
else:
    $file = $_FILES['file'];
    $tempFile = $file['tmp_name'];
    $nameFile = $file['name'];
    $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
    $mainFile = $targetPath . time() . '-' . $nameFile;
    move_uploaded_file($tempFile, $mainFile);
endif;