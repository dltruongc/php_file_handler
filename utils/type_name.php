<?php

function getFileType($extension = '') {
  switch ($extension) {
    case 'txt':
    case 'inp':
      return 'Text Document';
    case 'zip':
    case 'rar':
    case 'gz':
    case 'tar':
      return 'Compressed file';
    case 'png':
    case 'jpg':
    case 'jpeg':
    case 'bmp':
    case 'gif':
      return 'Image';
    case 'mp3':
      return 'Audio';
      break;
    case 'mp4':
    case 'mov':
      return 'Audio';
    case 'doc':
    case 'docx':
      return 'MS Word';
      break;
    case 'pdf':
      return 'PDF';
      break;
    default:
      return 'Other';
  }
}

?>