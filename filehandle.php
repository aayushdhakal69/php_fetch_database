<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handle</title>
</head>
<body>


<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);
?>

<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Aayush Baba\n";
fwrite($myfile, $txt);
$txt = "Khatra\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
</body>
</html>