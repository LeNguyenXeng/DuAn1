<?php
function insert($id_nguoidung,$soluong, $price, $anhsp, $name)
{
    $sql = "INSERT INTO `gio_hang`(`id_nguoidung`,`soluong`, `price`, `anhsp`, `name`, `date_added`) values('$id_nguoidung','$soluong' , '$price', '$anhsp', '$name', now())";
    pdo_execute($sql);
}
function get_cart_items($id_nguoidung) {
    $query = "SELECT * FROM gio_hang WHERE id_nguoidung = $id_nguoidung";
    return pdo_query($query);

}
function check_product_in_cart($id_nguoidung, $name) {
    $sql = "SELECT * FROM gio_hang WHERE id_nguoidung = $id_nguoidung AND name = '$name'";
    return pdo_query_one2($sql);
}
function update_cart_quantity($id_nguoidung, $name, $soluong) {
    $sql = "UPDATE gio_hang SET soluong = soluong + ? WHERE id_nguoidung = ? AND name = ?";
    pdo_execute2($sql, [$soluong, $id_nguoidung, $name]);
}
function deletesp($id_nguoidung, $name) {
    $sql = "DELETE FROM gio_hang WHERE id_nguoidung = $id_nguoidung AND name = '$name'";
    pdo_execute2($sql);
}
?>
