<?php
$targetDir = "upload/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Kiểm tra nếu file đã tồn tại
if (file_exists($targetFile)) {
    echo "Rất tiếc, file đã tồn tại.";
    $uploadOk = 0;
}

// Kiểm tra kích thước file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Rất tiếc, kích thước file quả lớn.";
    $uploadOk = 0;
}

// Cho phép chỉ tải lên các loại file nhất định
if($fileType != "txt" && $fileType != "pdf" && $fileType != "doc") {
    echo "Rất tiếc, chỉ file TXT, PDF, and DOC mới được chấp nhận.";
    $uploadOk = 0;
}

// Kiểm tra nếu $uploadOk = 0 tức là có lỗi
if ($uploadOk == 0) {
    echo "Rất tiếc, tập tin của bạn chưa được tải lên.";
} else {
    // Nếu mọi thứ đều ổn, tiến hành tải lên file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Rất tiếc, đã xảy ra lỗi khi tải tệp của bạn.";
    }
}
?>
