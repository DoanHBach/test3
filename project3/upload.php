<?php
// Kiểm tra kích thước tệp tải lên
if ($_FILES['fileToUpload']['size'] > 2097152) {
    echo "File is too large.";
    exit;
}

// Mã hoá tên file
$fileName = date("ymdHis") . '_' . substr(md5(rand()), 0, 6) . '_' . basename($_FILES['fileToUpload']['name']);
$targetDir = "upload/";
$targetFile = $targetDir . $fileName;

// Kiểm tra xem file đã tồn tại hay chưa
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    exit;
}

// Kiểm tra và chuyển file vào thư mục upload
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
    echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
