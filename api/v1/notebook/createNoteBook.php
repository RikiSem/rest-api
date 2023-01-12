<?php
$info = [];
$dirId = rand(10,1000000000);
mkdir((string)$dirId);
mkdir((string)$dirId."/fotos");
$info['note_id'] = $dirId;
echo(json_encode($info));
?>