<?php
include "../connection.php";
$id=$_GET["id"];
$query = $db->prepare("select (case when a.tipeiuran=1 then concat('admin')
when a.tipeiuran=2 then concat('Masa Berlaku kartu')when a.tipeiuran=3 then concat('Masa Berlaku Anggota')end)iuran
,a.tipeiuran,a.createdon,DATE_ADD(a.createdon, INTERVAL 3 MONTH)masaaktif,DATE_ADD(a.createdon, INTERVAL 12 MONTH)masaaktifanggota,a.jumlah from detail_header_anggota a where a.headerid=(select b.id from header_anggota b where b.idanggota='$id')");
$query->execute();
$data = $query->fetchAll();
$list = array();
foreach ($data as $user) {
    $list[] = array('tipeiuran' => $user["tipeiuran"], 'iuran' => $user["iuran"], 'jumlah' => $user["jumlah"], 'createdon' => $user["createdon"]
        , 'kartu' => $user["createdon"], 'masaaktif' => $user["masaaktifanggota"]
    );
}
echo json_encode($list);
?>