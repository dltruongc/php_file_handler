<?php

function getTypeIcon($type) {
  switch ($type) {
    case 'Video':
      return '<i class="fas fa-file-video"></i>';
    case 'Text Document':
      return '<i class="fas fa-file"></i>';
    case 'Compressed file':
      return '<i class="fas fa-file-archive"></i>';
    case 'Image':
      return '<i class="fas fa-file-image"></i>';
    case 'Code':
      return '<i class="fas fa-file-code"></i>';
    case 'Audio':
      return '<i class="fas fa-file-audio"></i>';
    case 'MS Word':
      return '<i class="fas fa-file-word"></i>';
    case 'PDF':
      return '<i class="fas fa-file-pdf"></i>';
    case 'Folder':
      return '<i class="fa fa-folder"></i>';
    case 'Other':
      return '<i class="fas fa-file"></i>';
    default:
      return '<i class="fas fa-file"></i>';
  }
}

?>