<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "duan1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin đơn hàng theo ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM don_hang WHERE id_donhang = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    die("Đơn hàng không tồn tại.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = isset($_POST['status']) ? (int)$_POST['status'] : $order['id_trangthai'];

    // Kiểm tra nếu trạng thái mới nhỏ hơn trạng thái hiện tại
    if ($status < $order['id_trangthai']) {
        echo "<script>alert('Không thể quay lại trạng thái trước.');</script>";
    } else {
        $updateStmt = $conn->prepare("UPDATE don_hang SET id_trangthai = ? WHERE id_donhang = ?");
        $updateStmt->bind_param("ii", $status, $id);
        $updateStmt->execute();
        header("Location: index.php?act=listmanage");
        exit();
    }
}

// Hàm trạng thái đơn hàng
function getOrderStatusOptions($currentStatus) {
    $statusDescriptions = [
        1 => "Chờ xác Nhận",
        2 => "Đã Xác Nhận",
        3 => "Chờ lấy hàng",
        4 => "Đang giao hàng",
        5 => "Giao hàng thành công",
        6 => "Đã huỷ",
        7 => "Trả hàng"
    ];
    foreach ($statusDescriptions as $key => $value) {
        echo "<option value='$key' " . ($currentStatus == $key ? 'selected' : '') . ">$value</option>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update Status</title>
    <script>
    function handleStatusChange() {
        const statusSelect = document.getElementById('status');
        const currentStatus = parseInt(statusSelect.dataset.currentStatus, 10);
        const selectedStatus = parseInt(statusSelect.value, 10);

        if (selectedStatus < currentStatus) {
            alert('Không thể chọn trạng thái trước.');
            statusSelect.value = currentStatus;
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const statusSelect = document.getElementById('status');
        statusSelect.dataset.currentStatus = statusSelect.value;
    });
    </script>
    <?php
    include "view/header.php";
?>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Trạng Thái Đơn Hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="POST">
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select class="form-control" id="status" name="status"
                                    data-current-status="<?php echo $order['id_trangthai']; ?>"
                                    onchange="handleStatusChange()">
                                    <?php getOrderStatusOptions($order['id_trangthai']); ?>
                                </select>
                            </div>
                            <div style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="index.php?act=listmanage" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    <?php
    include "view/footer.php";
?>