<?php
                        function tongdonhang(){
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
                        
                        function loadone_billuser($id_nguoidung)
                        {
                            $sql = "SELECT * FROM don_hang WHERE id_nguoidung = $id_nguoidung ORDER BY id_donhang DESC";
                            $listBill = pdo_query1($sql);
                            return $listBill;
                        }
                        
                        function insert_bill($tongdonhang, $hoten, $diachi, $email, $sdt, $ngaydathang, $pttt){
                            $sql = "INSERT INTO don_hang (hoten, diachi, email, sdt, tongtien , ngaydathang,pttt) 
                                    VALUES ('$tongdonhang', '$hoten', '$diachi', '$email', '$sdt','$ngaydathang', '$pttt')"; 
                                   return pdo_execute_return_lastInsertId($sql);
                                }
                                function insert_cart($id_nguoidung , $id_giohang , $anhsp, $price, $soluong, $id_variant , $pttt){
                                    $sql = "INSERT INTO don_hang (hoten, diachi, email, sdt, tongtien , ngaydathang,pttt) 
                                            VALUES ('$tongdonhang', '$hoten', '$diachi', '$email', '$sdt','$ngaydathang', '$pttt')"; 
                                           return pdo_execute($sql);
                                        }
?>