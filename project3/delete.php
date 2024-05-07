<?php
if(isset($_GET['file'])) {
    $file = $_GET['file'];

    // Xóa file trên ổ đĩa
    if (unlink($file)) {
        echo "File deleted successfully.";
    } else {
        echo "Failed to delete file.";
    }

    // Xóa file khỏi CSDL
    // ...
}
?>
