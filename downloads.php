<?php function forceDownload($filename, $path){

$complete_path = $path.$filename;
$urlFilename = urlencode($filename);

header("Content-type: application/download");
header("Content-Disposition: attachment; filename=$urlFilename");
header("Pragma: no-cache");
header("Expires: 0");
$fr = fopen($complete_path, 'r');
$data = fread($fr, filesize($complete_path));
fclose($fr);
print($data);
return;

}
if (isset($_GET['file'])){
$file=$_GET['file'];
forceDownload($file, "");
}

?>




