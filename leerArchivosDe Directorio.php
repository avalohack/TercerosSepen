<?php
$dir = "./terceros/";

// Open a directory, and read its contents
// si funciona
// esto era mucho mas facil
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "filename:" . $file . "<br>";
    }
    closedir($dh);
  }
}
?>