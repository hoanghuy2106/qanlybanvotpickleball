<?php
session_start();

// 1. Bật hiển thị lỗi để "diệt bug" nhanh hơn trong lúc phát triển
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Nạp các file cốt lõi (Database & Model)
// Edit cần lấy dữ liệu cũ từ DB nên ProductModel là bắt buộc phải có ở đây
require_once 'model/ProductModel.php'; 

// 3. Lấy tham số điều hướng từ URL
$controllerParam = $_GET['controller'] ?? 'product';
$actionParam     = $_GET['action']     ?? 'index';

// 4. Hệ thống điều hướng (Router)
if ($controllerParam === 'product') {
    $controllerFile = 'controller/ProductController.php';
    
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new ProductController();
        
        // Kiểm tra xem Action (ví dụ: edit, update, delete) có tồn tại trong Class không
        if (method_exists($controller, $actionParam)) {
            
            // Đối với Action 'edit', chúng ta nên kiểm tra xem có ID truyền lên không
            if ($actionParam === 'edit' && !isset($_GET['id'])) {
                die("Lỗi: Thiếu tham số ID để thực hiện chỉnh sửa.");
            }

            // Triệu gọi Action (Ví dụ: $controller->edit())
            // Bên trong hàm edit(), bạn sẽ dùng $_GET['id'] để lấy dữ liệu từ Model
            $controller->$actionParam();
            
        } else {
            echo "<h3>Lỗi 404:</h3> Action <strong>'{$actionParam}'</strong> không tồn tại trong ProductController.";
        }
    } else {
        echo "<h3>Lỗi:</h3> Không tìm thấy file Controller tại <code>{$controllerFile}</code>.";
    }
} else {
    // Trang mặc định hoặc thông báo chào mừng
    echo "<h2>Chào mừng bạn đến với hệ thống quản lý Pickleball Hub!</h2>";
    echo "<a href='index.php?controller=product&action=index'>Đi tới Quản lý sản phẩm</a>";
}