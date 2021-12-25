<?php

include 'utils/size_formatter.php';
include 'utils/type_name.php';

// - scandir(): đọc danh sách các tập tin/thư mục con của một thư mục đầu vào.
// - is_dir(): kiểm tra xem có phải thư mục hay không
// - is_file(): kiểm tra xem có phải file hay không
// - file_exists(): kiểm tra xem file tồn tại hay chưa.
// - is_readable(): kiểm tra xem có quyền đọc hay không
// - is_writable(): kiểm tra xem có quyền ghi hay không
// - filesize(): lấy kích thước file (bytes)
// - filemtime(): trả về lời gian unix time của last modified
// - mkdir(): tạo thư mục mới
// - rename(): đổi tên tập tin, thư mục
// - unlink(): xóa một tập tin
// - rmdir(): xóa thư mục rỗng. thư mục khác rỗng phải xóa đệ quy
// - file_put_contents(): ghi nội dung vào tập tin
// - pathinfo(): lấy thông tin tên tập tin, thư mục, đuôi tập tin 
// PATHINFO_DIRNAME, PATHINFO_BASENAME, PATHINFO_EXTENSION, PATHINFO_FILENAME

$arrFiles = array();
$arrFiles[] = scandir('./uploads');
$directories = array();

foreach ($arrFiles[0] as $value) {
  if ($value != '.' && $value != '..') {
    $path = './uploads/'.$value;
    $lastModified = filemtime($path);

    $date = date('d-m-Y', $lastModified);

    if (is_file($path)) {
      $size = formatBytes(filesize($path));
      $extension = pathinfo($path, PATHINFO_EXTENSION);
      

      array_push($directories, array("Base"=>pathinfo($path, PATHINFO_FILENAME), "Name"=>"{$value}", "Type"=>getFileType($extension), "Size"=>"{$size}", "Last modified"=>"{$date}"));
    }
    if (is_dir($path)) {
      array_push($directories, array("Base"=>"{$value}", "Name"=>"{$value}", "Type"=>"Folder", "Size"=>"-", "Last modified"=>"{$date}"));
    }
  }
}

?>