<?php


  function getFolderFilePaths( $folder ) {
    // Obtiene todos los paths a ficheros dentro de una carpeta

    if (is_dir($folder)) {
      return array_diff(scandir($folder), array('.', '..'));
    }

    return false;
  }

  function getFileContent( $path ) {
    // This function returns the content of a file
    // if succed the function will return the raw info, if not it will return a false.

    if (file_exists($path)) {
      $content = file_get_contents($path);

      if ($content !== false) return $content;
    }

    return false;

  }

  function getAllFileContentInFolder ( $folderPath ) {
    // This function returns an array where every element
    // represents the content of every file inside a specific folder.
    // If the function cannot retrieve the info it will return a false.
    $output = array();

    if (is_dir($folderPath)) {
      foreach (getFolderFilePaths($folderPath) as $fileName) {
        $file = json_decode(getFileContent($folderPath . '/' . $fileName), true);

        if ($file) {
          array_push($output, $file);
        }
      }

      return $output;
    }

    return false;
  }

?>
