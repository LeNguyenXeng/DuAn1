<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SWE Admin</title>
    <?php
    include "header.php";
?>
<div>
    <div>
        <!-- php1 -->
    <?php 
$connect = new mysqli('localhost', 'root', '', 'duan1');
$query = "SELECT `danh_muc`.*, COUNT(san_pham.id_dm) AS 'number_cate' FROM `san_pham` INNER JOIN `danh_muc` ON san_pham.id_dm = danh_muc.id_dm GROUP BY san_pham.id_dm";
$result = mysqli_query($connect, $query);
$data = [];

while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

// Chuyển đổi dữ liệu thành định dạng JavaScript
$chartData = [];
foreach ($data as $item) {
    $chartData[] = [$item['ten_danhmuc'], (int)$item['number_cate']];
}

// Chuyển đổi mảng PHP thành JSON để sử dụng trong JavaScript
$chartDataJson = json_encode($chartData);
?>
<!-- end php1 (lấy dữ liệu biểu đồ 1) -->
<!-- start php2 (lấy dữ liệu biểu đồ 2) -->
<?php
$connect = new mysqli('localhost', 'root', '', 'duan1');



$query = "SELECT * FROM don_hang WHERE id_trangthai = 5";
$result = mysqli_query($connect, $query);
$data = array_fill(0, 12, 0); // Khởi tạo mảng để lưu tổng cho từng tháng

function getMonth($time) {
    return date('n', strtotime($time)); // 'n' trả về tháng không có số 0 đầu
}

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $month = getMonth($row['ngaydathang']); 
        
        // Tăng tổng cho tháng tương ứng
        if ($month >= 1 && $month <= 12) {
            $data[$month -1] += $row['tongtien']; // Trừ 1 để phù hợp với chỉ số bắt đầu từ 0
        }
    }
}

// var_dump($data);
$data_json = json_encode($data);
?>
<!-- end php2 (lấy dữ liệu biểu đồ 2) -->

<!-- start php 3 -->
<?php    
$connect = new mysqli('localhost', 'root', '', 'duan1');
$query = "SELECT SUM(tongtien) AS total FROM don_hang WHERE id_trangthai = 5";
$result = mysqli_query($connect, $query);

$totalSuccess = 0; // Khởi tạo biến tổng

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalSuccess = $row['total'] ? $row['total'] : 0; 
} else {
    echo "Lỗi truy vấn: " . $connect->error;
}

// In ra kết quả
// echo "Tổng tất cả đơn hàng thành công: " . $totalSuccess;
// strat tong san pham
$query = "SELECT COUNT(*) AS total FROM san_pham";
$result = mysqli_query($connect, $query);

$totalOrders = 0; // Khởi tạo biến tổng số đơn hàng

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalOrders = (int) $row['total']; // Lấy tổng số đơn hàng
} else {
    echo "Lỗi truy vấn: " . $connect->error;
}
// end tổng sản phẩm

// strat tổng bình luận
$query = "SELECT COUNT(*) AS total FROM binh_luan";
$result = mysqli_query($connect, $query);

$tongbl = 0; // Khởi tạo biến tổng số đơn hàng

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $tongbl = (int) $row['total']; // Lấy tổng số đơn hàng
} else {
    echo "Lỗi truy vấn: " . $connect->error;
}



$query = "SELECT COUNT(*) AS total FROM don_hang WHERE id_trangthai = 5";
$result = mysqli_query($connect, $query);

$tongdh = 0; // Khởi tạo biến tổng số đơn hàng

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $tongdh = (int) $row['total']; // Lấy tổng số đơn hàng
} else {
    echo "Lỗi truy vấn: " . $connect->error;
}

// Xuất tổng số đơn hàng đã thành công



// echo "Tổng tất cả đơn hàng thành công: " . $totalOrders;
?>
<!-- end php 3 -->
<!-- js biều đò 1 -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh Mục', 'Số Lượng'],
            <?php
                // In dữ liệu JSON vào JavaScript
                echo implode(",\n", array_map(function($item) {
                    return "['" . addslashes($item[0]) . "', " . $item[1] . "]";
                }, $chartData));
            ?>
        ]);

        var options = {
            title: 'Thống Kê Sản Phẩm Theo Danh Mục'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
<!-- js biều đò 1 -->

<div class="row" style="margin-left: 5px; margin-right:5px">

                        <!-- 1 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng Số Đơn Hàng Thành Công</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tongdh ?> Đơn</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Tổng Tiền Đơn Hàng Thành Công</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($totalSuccess, 0, ',', '.'); ?> đồng</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Sản Phẩm 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalOrders  ?> Sản Phẩm</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               Tổng Bình Luận</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tongbl  ?> Bình Luận</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"> </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


</div>

  <br>
<h1 class="text-center">Doanh Thu Theo Tháng</h1><br>
<!-- start biểu đồ 2 -->
<canvas id="myChart" ></canvas>
<br>
<div id="piechart" style=" height: 500px;"></div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

let abc = 
    {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12',],
      datasets: [{
        label: 'Doanh Thu',
        data: <?php echo $data_json; ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  }


  new Chart(ctx, abc );

</script>
<!-- end biểu đồ 2 -->







<br><br><br>
    <?php
    include "footer.php";
?>