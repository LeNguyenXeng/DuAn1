<?php
function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function pdo_execute($sql)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare($sql);
    $sql->execute();
}

function pdo_execute_return_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);  // Get the arguments passed after the SQL query
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args); // Correctly pass the arguments to the execute function
        return $conn->lastInsertId(); // Get the last inserted ID
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn); // Clean up the connection
    }
}

// truy vấn nhiều dữ liệu
function pdo_query($sql, $params = [])
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);

    // Gán tham số vào câu truy vấn
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare($sql);
    $sql->execute();
    $kq = $sql->fetch(PDO::FETCH_ASSOC);
    return $kq;
}
function pdo_query_one2($sql, $params = [])
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params); // Truyền tham số vào execute
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function pdo_execute2($sql, $params = [])
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params); // Đảm bảo truyền đúng tham số
}

function pdo_execute4($sql, $params = []) {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $conn->lastInsertId(); 
}


function pdo_query2($sql, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($sql);

    // Đảm bảo các tham số được gán đúng chỉ mục, bắt đầu từ 1
    foreach ($params as $index => $param) {
        $stmt->bindValue($index + 1, $param);  // Bind từ chỉ mục 1 thay vì 0
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function pdo_prepare($sql) {
    global $pdo; // Giả sử bạn đã khởi tạo đối tượng PDO
    return $pdo->prepare($sql);
}
function pdo_query_value($sql, ...$params) {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchColumn();
}