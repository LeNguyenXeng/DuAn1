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
function insert_chi_tiet_don_hang($idbill, $soluong, $thanhtien, $img, $name, $price) {
    // Câu lệnh SQL để chèn thông tin vào bảng chitietdonhang
    $sql = "INSERT INTO chitietdonhang (id_donhang, soluong, thanhtien, img, name, price) VALUES (?, ?, ?, ?, ?, ?)";
    // Thực thi câu lệnh SQL
    pdo_execute($sql, $idbill, $soluong, $thanhtien, $img, $name, $price);
}
?>