<?php
$noteID = $_REQUEST['note_id'];
$countPages = count(scandir($noteID))-3;
$pageName = $countPages+1;

if(isset($_REQUEST['fio'])){
    $fio = $_REQUEST['fio'];
}else{
    echo("Ошибка: нет обязательного поля fio");
}
if(isset($_REQUEST['tel'])){
    $tel = $_REQUEST['tel'];
}else{
    echo("Ошибка: нет обязательного поля tel");
}
if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
}else{
    echo("Ошибка: нет обязательного поля email");
}
if(isset($_REQUEST['company'])){
    $company = $_REQUEST['company'];
}else{
    $company = "";
}
if(isset($_REQUEST['date_born'])){
    $date_born = $_REQUEST['date_born'];
}else{
    $date_born = "";
}
if(isset($_FILES['foto'])){
    $foto = $_FILES['foto']['name'];
    $fotoFile = move_uploaded_file($_FILES['foto']['tmp_name'],$noteID."/"."fotos/".$_FILES['foto']['name']);
}else{
    $foto = "";
}

$info = [];
$info[0] = $fio;
$info[1] = $tel;
$info[2] = $email;
$info[3] = $company;
$info[4] = $date_born;
$info[5] = $foto;

file_put_contents((string)$noteID."/".(string)($pageName).".txt",$info[0]."|");
for($i = 1; $i != 6; $i ++){
    if($i == 5){
        file_put_contents((string)$noteID."/".(string)($pageName).".txt",$info[$i],FILE_APPEND);
    }else{
        file_put_contents((string)$noteID."/".(string)($pageName).".txt",$info[$i]."|",FILE_APPEND);
    }
}
echo(json_encode($info));
?>