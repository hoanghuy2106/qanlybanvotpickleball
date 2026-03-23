<?php
class ProductModel {
    public function __construct() {
        // Khởi tạo SESSION nếu chưa có
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Tạo dữ liệu sản phẩm ảo (Seed Data) nếu SESSION trống
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            $_SESSION['products'] = [
                [
                    'id' => 1, 
                    'name' => 'WAVEX Pro T700 Elite', 
                    'brand' => 'WAVEX', 
                    'price' => 2550000, 
                    'weight' => '7.8', 
                    'surface' => 'Toray T700 Carbon'
                ],
                [
                    'id' => 2, 
                    'name' => 'Selkirk Vanguard Control Air', 
                    'brand' => 'Selkirk', 
                    'price' => 4500000, 
                    'weight' => '7.9', 
                    'surface' => 'QuadCarbon Face'
                ],
                [
                    'id' => 3, 
                    'name' => 'Joola Perseus CFS 16mm', 
                    'brand' => 'JOOLA', 
                    'price' => 5200000, 
                    'weight' => '8.0', 
                    'surface' => 'Carbon Friction'
                ],
                [
                    'id' => 4, 
                    'name' => 'Agassi Power Hybrid 16mm', 
                    'brand' => 'Agassi', 
                    'price' => 1890000, 
                    'weight' => '8.2', 
                    'surface' => 'Fiberglass Poly'
                ],
                [
                    'id' => 5, 
                    'name' => 'Vatic Pro Prism Flash', 
                    'brand' => 'Vatic Pro', 
                    'price' => 2800000, 
                    'weight' => '8.0', 
                    'surface' => 'Raw Carbon Fiber'
                ],
                [
                    'id' => 6, 
                    'name' => 'Franklin Signature Pro Series', 
                    'brand' => 'Franklin', 
                    'price' => 2100000, 
                    'weight' => '7.7', 
                    'surface' => 'MaxGrit Texture'
                ],
                [
                    'id' => 7, 
                    'name' => 'WAVEX Mach 1 Speed', 
                    'brand' => 'WAVEX', 
                    'price' => 1250000, 
                    'weight' => '7.5', 
                    'surface' => 'Graphite Composite'
                ],
                [
                    'id' => 8, 
                    'name' => 'Six Zero Double Black Diamond', 
                    'brand' => 'Six Zero', 
                    'price' => 3900000, 
                    'weight' => '8.1', 
                    'surface' => 'Carbon Fiber'
                ],
                [
                    'id' => 9, 
                    'name' => 'CRBN 1X Power Series', 
                    'brand' => 'CRBN', 
                    'price' => 4990000, 
                    'weight' => '8.0', 
                    'surface' => 'Raw Carbon'
                ],
                [
                    'id' => 10, 
                    'name' => 'ProKennex Black Ace Ovation', 
                    'brand' => 'ProKennex', 
                    'price' => 3500000, 
                    'weight' => '7.9', 
                    'surface' => 'Graphite'
                ]
            ];
        }
    }

    // --- CÁC HÀM CRUD GIỮ NGUYÊN HOẶC CẬP NHẬT NHẸ ---

    public function getAll() {
        return $_SESSION['products']; // Trả về danh sách gốc
    }

    public function getById($id) {
        foreach ($_SESSION['products'] as $p) {
            if ((int)$p['id'] === (int)$id) return $p;
        }
        return null;
    }

    public function add($data) {
        $maxId = 0;
        if (!empty($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $p) { 
                if ($p['id'] > $maxId) $maxId = $p['id']; 
            }
        }
        $data['id'] = $maxId + 1;
        $_SESSION['products'][] = $data;
    }

    public function update($id, $data) {
        foreach ($_SESSION['products'] as &$p) {
            if ((int)$p['id'] === (int)$id) {
                unset($data['id']); // Bảo mật: Không cho đổi ID qua form
                $p = array_merge($p, $data);
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        foreach ($_SESSION['products'] as $key => $p) {
            if ((int)$p['id'] === (int)$id) {
                unset($_SESSION['products'][$key]);
                $_SESSION['products'] = array_values($_SESSION['products']); // Reset chỉ mục mảng
                return true;
            }
        }
        return false;
    }
}