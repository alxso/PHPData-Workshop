<?php
$ApplicationCounter = file_get_contents("counter.txt");
if ($ApplicationCounter == ""){
 $ApplicationCounter = 0;
}

if($_POST){
$file = 'registration.csv';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit();
}}

echo "Number of registration entries: $ApplicationCounter";


?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration Entries</title>
</head>
<body>
<form action="lab5part2.php" method="post">
<input type="submit" name="download" value="Download File" />
</form>
<br><br>

</body>
</html>
