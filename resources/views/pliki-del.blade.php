<?php
// $del=$_GET['del'];
$file = $_GET['file_name'];
$katalog = 'images';
if (unlink($katalog .'/'. $file))
 {
 echo "Plik zostal pomyslnie usuniety. <a href=pliki-all.php>Wroc</a>.";
 }
?>
