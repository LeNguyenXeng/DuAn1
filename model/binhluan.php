<?php
function insert_rating($id_bl,$id_nguoidung, $hoten, $id_sp, $tensp, $noidung, $ngaybl, $star) {
    $sql = "INSERT INTO `binh_luan`(`id_bl`, `id_nguoidung`, `hoten`, `id_sp`, `tensp`, `noidung`, `ngaybl`, `star`) VALUES ('$id_bl','$id_nguoidung','$hoten','$id_sp','$tensp','$noidung','$ngaybl','$star')";
    pdo_execute($sql);
}

function load_All_rating($id_sp) {
    if ($id_sp <= 0) {
        return []; // Trả về mảng rỗng nếu id_sp không hợp lệ
    }
    
    $sql = "SELECT * FROM `binh_luan` WHERE id_sp = ?";
    return pdo_query($sql, [$id_sp]);
}

function loadAll_binhluan(){
    $sql = "SELECT * FROM `binh_luan` WHERE visible = 1 ORDER BY id_bl DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id) {
    $sql="delete from binh_luan where id_bl=".$id;
    pdo_execute($sql);
}

function loadId_binhluan($id_sp) {
    $sql = "SELECT * FROM `binh_luan` WHERE id_sp = :id_sp AND visible = 1 ORDER BY id_bl DESC";
    $stmt = pdo_prepare($sql); // Đảm bảo bạn có hàm chuẩn bị câu lệnh
    $stmt->bindParam(':id_sp', $id_sp, PDO::PARAM_INT); // Liên kết tham số
    $stmt->execute(); // Thực thi câu lệnh
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả bình luận phù hợp
}
function check_existing_comment($id_nguoidung, $id_sp) {
    $sql = "SELECT COUNT(*) FROM `binh_luan` WHERE `id_nguoidung` = ? AND `id_sp` = ?";
    return pdo_query_value($sql, $id_nguoidung, $id_sp);
}

function toggle_visibility($id) {
    $sql = "UPDATE `binh_luan` SET visible = NOT visible WHERE id_bl = :id";
    $stmt = pdo_prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function loadAll_binhluan_with_hidden() {
    $sql = "SELECT * FROM `binh_luan` ORDER BY id_bl DESC";
    return pdo_query($sql);
}
?>