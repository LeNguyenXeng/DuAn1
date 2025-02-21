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
    $sql = "SELECT * FROM `binh_luan` ORDER BY id_bl DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id) {
    $sql="delete from binh_luan where id_bl=".$id;
    pdo_execute($sql);
}

function loadId_binhluan($id_sp) {
    $sql = "SELECT * FROM `binh_luan` WHERE id_sp = " . $id_sp . " ORDER BY id_bl DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}

function check_existing_comment($id_nguoidung, $id_sp) {
    $sql = "SELECT COUNT(*) FROM `binh_luan` WHERE `id_nguoidung` = ? AND `id_sp` = ?";
    return pdo_query_value($sql, $id_nguoidung, $id_sp);
}


?>