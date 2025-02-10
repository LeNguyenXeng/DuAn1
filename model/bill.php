<?php
function deletebill($id_donhang) {
    $sql = "DELETE FROM don_hang WHERE id_donhang = $id_donhang";
    pdo_execute2($sql);
}
?>