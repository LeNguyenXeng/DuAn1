<?php
 function insert_nguoidung($hoten,$sdt,$email,$matkhau,$diachi){
        $sql = "INSERT INTO nguoi_dung(hoten,sdt,email,matkhau,diachi,ngaydangky) values('$hoten','$sdt','$email','$matkhau','$diachi',now())";
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
    function loadall_nguoidung($kyw, $role) {
        $sql = "SELECT * FROM nguoi_dung WHERE 1";
        
        if ($kyw != "") {
            $sql .= " AND email LIKE '%" . $kyw . "%'";
        }
        if ($role !== '0' && $role > 0) {
            $sql .= " and role = '" . $role . "'";
        } elseif ($role === '0') {
            $sql .= " and role = 0";
        }
        
        $sql .= " ORDER BY id_nguoidung DESC";
        
        $listnguoidung = pdo_query($sql);
        return $listnguoidung;
    }
    function delete_taikhoan($id_nguoidung){
        $sql = "DELETE FROM nguoi_dung WHERE id_nguoidung=".$id_nguoidung;
        pdo_execute($sql);
    }
    function loadone_nguoidung($id_nguoidung){
        $sql = "SELECT * FROM nguoi_dung WHERE id_nguoidung=".$id_nguoidung;
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function loadall_role() {
        $sql = "SELECT DISTINCT role FROM nguoi_dung ORDER BY role";
        $listrole = pdo_query($sql);
        return $listrole;
    }
?>