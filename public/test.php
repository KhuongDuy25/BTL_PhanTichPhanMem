<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=laravel", "root", "");
    echo "Kết nối thành công!";
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>
