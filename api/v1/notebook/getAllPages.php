<?php
$noteID = $_REQUEST['note_id'];
$countPages = count(scandir($noteID))-3;
$note = [];
for($i = 0; $i != $countPages; $i ++){
    $textPage = file_get_contents($noteID."/".(string)($i+1).".txt");
    $textPage = explode("|",$textPage);
    $file = $textPage[count($textPage)-1];
    array_pop($textPage);
    $linkToFoto = "http://project1/api/v1/notebook/".$noteID."/".(string)($i+1)."/"."fotos/".$file;
    array_push($textPage,$linkToFoto);
    array_push($note,$textPage);

}
echo(json_encode($note));
?>