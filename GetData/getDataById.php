<?php
include "../connection.php";
$id=$_GET["id"];
$query = $db->prepare("SELECT * FROM mst_anggota a join header_anggota b on a.id =b.idanggota where a.id ='$id'");
$query->execute();
$data = $query->fetchAll();
$query2 = $db->prepare("select (case when a.tipeiuran=1 then concat('admin')
when a.tipeiuran=2 then concat('Masa Berlaku kartu')when a.tipeiuran=3 then concat('Masa Berlaku Anggota')end)iuran
,a.tipeiuran,a.createdon,DATE_ADD(a.createdon, INTERVAL 3 MONTH)masaaktif,DATE_ADD(a.createdon, INTERVAL 12 MONTH)masaaktifanggota,a.jumlah from detail_header_anggota a where a.headerid=(select b.id from header_anggota b where b.idanggota='$id') limit 1");
$query2->execute();
$f4 = $query2->fetch();
$card= $f4["masaaktif"];
$anggota=$f4["masaaktifanggota"];
$list = array();
foreach ($data as $user) {
    $kec =$user["idkecamatan"];
    $desa =$user["idkelurahan"];
    $kota =$user["idkota"];
    $q3 = $db->prepare("SELECT * FROM regencies WHERE id='$kota'");
    $q3->execute();
    $f3 = $q3->fetch();
    $res= $f3["name"];
    $q = $db->prepare("SELECT * FROM districts WHERE id='$kec'");
    $q->execute();
    $f = $q->fetch();
    $result = $f["name"];
    $q2 = $db->prepare("SELECT * FROM villages WHERE id='$desa'");
    $q2->execute();
    $f2 = $q2->fetch();
    $result2 = $f2["name"];
    $list = array('id' => $user["kodeanggota"], 'nama' => $user["nama"], 'alamat' => $user["alamat"],'provinsi' => $user["idprovinsi"]
        ,'kota' => $user["idkota"],'kecamatan' => $user["idkecamatan"],'kelurahan' => $user["idkelurahan"]
        ,'email' => $user["email"],'notelp' => $user["notelp"],'noreg' => $user["noregistrasi"]
        ,'namakec' => $result,'namadesa' => $result2,'namakota' => $res,'card'=>$user["masaberlakukartu"],'anggota'=>$user["masaberlakuanggota"]
    );
}
echo json_encode($list);
?>