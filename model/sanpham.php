<?php

function insert_sanpham($tensp,$giasp,$filename,$mota,$id_dm,$hang) {
    $sql="insert into san_pham(hang,tensp,mota,anhsp,ngaytao,gia,id_dm) values('$hang','$tensp','$mota','$filename',now(),'$giasp','$id_dm')";
    pdo_execute($sql);
}
function delete_sanpham($id) {
    $sql="delete from san_pham where id_sp=".$id;
    pdo_execute($sql);
}
function loadAll_sanpham($kyw, $id_dm) {
    $sql="select * from san_pham where 1";
    if ($kyw!="") {
        $sql.=" and tensp like '%".$kyw."%'";
    }
    if( $id_dm>0){
        $sql.=" and id_dm = '".$id_dm."'";
    }
    $sql.=" ORDER by id_sp desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham ($id){
    $sql ="select * from san_pham where id=".$id;
}
function update_sanpham($id,$tenloai) {
    $sql="update san_pham set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}