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
function loadone_sanpham ($id_sp){
    $sql ="select * from san_pham where id_sp=".$id_sp;
    $sanpham =pdo_query_one($sql);
    return $sanpham;
}function update_sanpham($id_sp, $hang, $id_dm, $tensp, $giasp, $mota, $hinh) {
    if ($hinh != "") {
        $sql = "UPDATE san_pham SET id_dm='" . $id_dm . "', hang='" . $hang . "', tensp='" . $tensp . "', gia='" . $giasp . "', mota='" . $mota . "', anhsp='" . $hinh . "', ngaycapnhat = now() WHERE id_sp=" . $id_sp;
    } else {
        $sql = "UPDATE san_pham SET id_dm='" . $id_dm . "', hang='" . $hang . "', tensp='" . $tensp . "', gia='" . $giasp . "', mota='" . $mota . "',ngaycapnhat = now() WHERE id_sp=" . $id_sp;
    }
    pdo_execute($sql);
}
function loadAll_sanpham_home(){
    $sql = "SELECT * FROM san_pham WHERE 1 order by id_sp desc limit 0,8";
    $listsanpham =pdo_query($sql);
    return $listsanpham;
}
function loadAll_sanpham_shop(){
    $sql = "SELECT * FROM san_pham WHERE 1 order by id_sp desc";
    $listsanpham =pdo_query($sql);
    return $listsanpham;
}

?>