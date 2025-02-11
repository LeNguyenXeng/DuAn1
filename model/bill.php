<?php
function deletebill($id_donhang) {
    $sql = "DELETE FROM don_hang WHERE id_donhang = $id_donhang";
    pdo_execute2($sql);
}
function loadall_donhang($tendonhang) {
    $sql = "SELECT * FROM don_hang WHERE 1";
    
    if ($tendonhang != "") {
        $sql .= " AND hoten LIKE '%" . $tendonhang . "%'";
    }
    $sql .= " ORDER BY id_nguoidung DESC";
    $listnguoidung = pdo_query($sql);
    return $listnguoidung;
}
function insert_chi_tiet_don_hang($id_donhang, $id_variant, $soluong, $price) {
    $sql = "INSERT INTO chi_tiet_don_hang (id_donhang, id_variant, soluong, price) VALUES (:id_donhang, :id_variant, :soluong, :price)";
    pdo_execute($sql, [
        ':id_donhang' => $id_donhang,
        ':id_variant' => $id_variant,
        ':soluong' => $soluong,
        ':price' => $price
    ]);
}
?>