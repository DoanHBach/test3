<?php
// Lấy danh sách các file trong thư mục upload
$files = glob('upload/*');

echo "<h2>Uploaded Files</h2>";
echo "<table>";
echo "<tr><th onclick='sortTable(0)'>File Name</th><th onclick='sortTable(1)'>Type</th><th onclick='sortTable(2)'>Upload Date</th><th onclick='sortTable(3)'>File Size</th></tr>";

foreach ($files as $file) {
    // Lấy thông tin chi tiết về file
    $fileName = basename($file);
    $fileType = pathinfo($file, PATHINFO_EXTENSION);
    $uploadDate = date("Y-m-d H:i:s", filemtime($file));
    $fileSize = filesize($file);

    echo "<tr><td>$fileName</td><td>$fileType</td><td>$uploadDate</td><td>$fileSize bytes</td></tr>";
}

echo "</table>";
?>

<script>
// Hàm sắp xếp bảng theo cột được chọn
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.querySelector("table");
  switching = true;
  dir = "asc"; 
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
