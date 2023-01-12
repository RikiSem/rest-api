<?php
$noteID = $_REQUEST['note_id'];
$countFotos = count(scandir($noteID."/"."fotos"));
for($i = 2; $i != $countFotos; $i++){
    unlink($noteID."/fotos"."/".scandir($noteID."/"."fotos/")[$i]);
}
rmdir($noteID."/fotos");
$countPages = count(scandir($noteID));
for($i = 1; $i != $countPages; $i++){
    unlink($noteID."/".(string)$i.".txt");
}
rmdir($noteID);
echo(True);
?>