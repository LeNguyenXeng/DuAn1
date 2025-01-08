<?php
 function insert_nguoidung($hoten,$sdt,$email,$matkhau){
        $sql = "INSERT INTO nguoi_dung(hoten,sdt,email,matkhau) values('$hoten','$sdt','$email','$matkhau')";
        pdo_execute($sql);
    }
    function checkuser($email,$matkhau){
        $sql = "SELECT * FROM nguoi_dung WHERE email='".$email."' AND matkhau='".$matkhau."'";
        $tk = pdo_query_one($sql);
        return $tk;
        
    }
    function update_nguoidung($id_nguoidung,$hoten, $matkhau, $email,$diachi,$sdt){
        $sql = "UPDATE nguoi_dung SET hoten='".$hoten."',matkhau='".$matkhau."',email='".$email."',diachi='".$diachi."',sdt='".$sdt."' WHERE id_nguoidung=".$id_nguoidung;
        pdo_execute($sql);
    }
    function checkemail($email, $sdt){
        $sql = "SELECT * FROM nguoi_dung WHERE email='".$email."' AND sdt='".$sdt."' ";
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function loadall_nguoidung(){
        $sql = "SELECT * FROM nguoi_dung ORDER by id_nguoidung desc";
        $listnguoidung = pdo_query($sql);
        return $listnguoidung;
    }
    function delete_taikhoan($id_nguoidung){
        $sql = "DELETE FROM nguoi_dung WHERE id_nguoidung=".$id_nguoidung;
        pdo_execute($sql);
    }
?>