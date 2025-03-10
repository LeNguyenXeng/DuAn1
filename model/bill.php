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
function insert_billdetail($id_donhang, $soluong, $thanhtien, $img, $name, $price, $id_variant, $id_sp) {
    $sql = "INSERT INTO `chi_tiet_don_hang` (`id_donhang`, `soluong`, `thanhtien`, `img`, `name`, `price`, `id_variant`, `id_sp`) 
            VALUES (:id_donhang, :soluong, :thanhtien, :img, :name, :price, :id_variant, :id_sp)";
    
    $stmt = pdo_prepare($sql); // Giả sử bạn có một hàm pdo_prepare
    $stmt->bindParam(':id_donhang', $id_donhang);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->bindParam(':thanhtien', $thanhtien);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id_variant', $id_variant);
    $stmt->bindParam(':id_sp', $id_sp);
    
    $stmt->execute();
}

$pdo = pdo_get_connection();
function updateOrderStatus($id_donhang, $new_status) {
    global $pdo;
    $sql = "UPDATE don_hang SET id_trangthai = ? WHERE id_donhang = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$new_status, $id_donhang]);
}
function get_order_products($id_donhang)
{
    $query = "SELECT name, soluong FROM chi_tiet_don_hang WHERE id_donhang = ?";
    return pdo_query2($query, [$id_donhang]);
}


function increase_product_quantity($name, $soluong)
{
    // Truy vấn cập nhật số lượng sản phẩm
    $sql = "UPDATE san_pham SET soluong = soluong + :soluong WHERE tensp = :name";
    // Thực thi câu truy vấn với các tham số
    pdo_execute2($sql, ['soluong' => $soluong, 'name' => $name]);
}


?>