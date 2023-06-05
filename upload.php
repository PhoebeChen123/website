<?php
  $target_dir = "uploads/"; // 上传文件存储目录
  $target_file = $target_dir . basename($_FILES["resume"]["name"]); // 上传文件的路径和文件名
  $uploadOk = 1; // 文件上传标志，默认为1（表示上传成功）

  // 检查文件类型和大小
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
    echo "只允许上传PDF、DOC或DOCX格式的文件。";
    $uploadOk = 0;
  } else if ($_FILES["resume"]["size"] > 5000000) { // 5MB
    echo "上传的文件大小不能超过5MB。";
    $uploadOk = 0;
  }

  // 检查文件上传是否成功
  if ($uploadOk == 0) {
    echo "上传失败。";
  } else {
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
      echo "文件" . basename($_FILES["resume"]["name"]) . "已上传。";
    } else {
      echo "上传失败。";
    }
  }
?>
