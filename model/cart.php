<?php
function tongdonhang()
{
    $tong = 0;
    global $spadd;

    if (is_array($spadd) && !empty($spadd)) {
        foreach ($spadd as $stt => $sp) {
            $ttien = $sp['soluong'] * $sp['price'];
            $tong += $ttien;
        }
    }
    return $tong;
}

// function loadone_billuser($id_nguoidung)
// {
//     $sql = "SELECT * FROM don_hang WHERE id_nguoidung = $id_nguoidung ORDER BY id_donhang DESC";
//     $listBill = pdo_query1($sql);
//     return $listBill;
// }

function insert_bill($id_nguoidung,$id_trangthai,$madh,$pttt,$hoten,$sdt,$diachi,$email,$ngaydathang,$tongtien)
{
    $sql = "INSERT INTO don_hang (id_nguoidung,id_trangthai,madh,pttt,hoten,sdt,diachi,email,ngaydathang,tongtien) VALUES ('$id_nguoidung', '$id_trangthai', '$madh', '$pttt', '$hoten','$sdt', '$diachi','$email','$ngaydathang','$tongtien')";
    return pdo_execute_return_lastInsertId($sql);
}
// function insert_cart($id_nguoidung, $id_giohang, $anhsp, $price, $soluong, $id_variant, $pttt)
// {
//     $sql = "INSERT INTO don_hang (hoten, diachi, email, sdt, tongtien , ngaydathang,pttt) 
//                                             VALUES ('$tongdonhang', '$hoten', '$diachi', '$email', '$sdt','$ngaydathang', '$pttt')";
//     return pdo_execute($sql);
// }
function load_donhang($id_nguoidung) {
    $sql = "SELECT * FROM don_hang WHERE id_nguoidung = :id_nguoidung ORDER BY id_donhang DESC";
    $params = [':id_nguoidung' => $id_nguoidung]; 
    $listdonhang = pdo_query($sql, $params);
    return $listdonhang;
}
function load_trangthai(){
    $sql = "SELECT * FROM `trang_thai_don_hang` WHERE id_trangthai";
    $trangthaidonhang = pdo_query($sql);
    return $trangthaidonhang;
}
function loadall_chitietdonhang($id){
    $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_donhang = $id ";
    return pdo_query($sql);
    
}
function insert_checkout($hoten, $diachi, $email, $sdt, $pttt) {
    $sql = "INSERT INTO `don_hang`(`hoten`, `sdt`, `diachi`, `email`, `pttt`) 
            VALUES(:hoten, :sdt, :diachi, :email, :pttt)";
    pdo_execute($sql, [
        ':hoten' => $hoten,
        ':sdt' => $sdt,
        ':diachi' => $diachi,
        ':email' => $email,
        ':pttt' => $pttt
    ]);
}

function loadall_bill_admin($status = 0) {
    $sql = "SELECT * FROM don_hang";
    if ($status > 0) {
        $sql .= " WHERE id_trangthai = $status";
    }
    $sql .= " ORDER BY ngaydathang DESC";
    return pdo_query($sql);
}