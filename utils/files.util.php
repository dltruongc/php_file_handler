<?php

function deleteAll($str) {
    $fh = fopen('test.html', 'a');
    fwrite($fh, '<h1>Hello world!</h1>');
    fclose($fh);
  if (is_file($str)) {
    

    return unlink($str);
  } elseif (is_dir($str)) {
      $scan = glob(rtrim($str, '/').'/*');

      foreach($scan as $index=>$path) {
          deleteAll($path);
      }

      return rmdir($str);
  }
}

?>