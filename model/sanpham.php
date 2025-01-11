<?php

function insert_sanpham($tensp,$giasp,$filename,$mota,$id_dm,$hang) {
    $sql="insert into san_pham(hang,tensp,mota,anhsp,ngaytao,gia,id_dm) values('$hang','$tensp','$mota','$filename',now(),'$giasp','$id_dm')";
    pdo_execute($sql);
}
function delete_sanpham($id) {
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadAll_sanpham() {
    $sql="select * from sanpham order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham ($id){
    $sql ="select * from sanpham where id=".$id;
}
function update_sanpham($id,$tenloai) {
    $sql="update sanpham set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}