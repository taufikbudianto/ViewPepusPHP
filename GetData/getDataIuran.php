<?php
include "../connection.php";
$query = $db->prepare("SELECT * FROM tipeiuran");
$query->execute();
$data = $query->fetchAll();
$list = array();
foreach ($data as $user) {
    $list[] = array('jenis' => $user["jenis"], 'jumlah' => $user["Jumlah"]);
}
echo json_encode($list);
?>