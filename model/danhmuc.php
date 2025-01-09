<?php 
function  loadAll_danhmuc(){
    $sql = "SELECT * FROM `danh_muc`";
    return pdo_query($sql);
}
function  loadAll_iddanhmuc($id_dm){
    $sql = "SELECT * FROM `danh_muc` where id_dm = $id_dm";
    return pdo_query_one($sql);
}

function delete_dm($id_dm)
{
    $sql = "DELETE FROM `danh_muc` WHERE id_dm =$id_dm";
    pdo_execute($sql);
}
function insert_dm($ten_danhmuc)
{
    $sql = "INSERT INTO `danh_muc`(`ten_danhmuc`, `ngay_tao`) VALUES ('$ten_danhmuc',now())";
    pdo_execute($sql);
}
function update_dm($id_dm, $ten_danhmuc)
{
    $sql = "update danh_muc set ten_danhmuc='" . $ten_danhmuc . "' , ngay_sua = now()  where id_dm=" . $id_dm;
    pdo_execute($sql);
}
?>
