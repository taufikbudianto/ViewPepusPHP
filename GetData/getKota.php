<?php
include "../connection.php";
$provinsi=$_GET["provinsi"];
if ($_GET["data"]=="kota"){
    $query = $db->prepare("SELECT * FROM regencies where province_id ='$provinsi'");
}elseif ($_GET["data"]=="kecamatan") {
    $query = $db->prepare("SELECT * FROM districts where regency_id ='$provinsi'");
}else{
    $query = $db->prepare("SELECT * FROM villages where district_id ='$provinsi'");
}

$query->execute();
$data = $query->fetchAll();
$list = array();
foreach ($data as $user) {
    $list[] = array('id' => $user["id"], 'name' => $user["name"]);
}
echo json_encode($list);
?>