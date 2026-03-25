<?php
require_once 'model/ProductModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class ProductController {
    private $model;

    public function __construct() { 
        $this->model = new ProductModel(); 
    }

    public function index() {
        $list = $this->model->getAll();
        include 'view/product_list.php';
    }

    public function add_to_cart() {
        $id = $_GET['id'] ?? null;
        $product = $this->model->getById($id);
        if ($product) {
            if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity']++;
            } else {
                $_SESSION['cart'][$id] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'quantity' => 1
                ];
            }
        }
        header('Location: index.php');
        exit();
    }

    public function view_cart() {
        $cart = $_SESSION['cart'] ?? [];
        include 'view/cart_detail.php';
    }

    // HÀM QUAN TRỌNG ĐỂ HẾT LỖI GẠCH ĐỎ
    public function update_cart() {
        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? 'increase';
        if (isset($_SESSION['cart'][$id])) {
            if ($type === 'increase') $_SESSION['cart'][$id]['quantity']++;
            else {
                $_SESSION['cart'][$id]['quantity']--;
                if ($_SESSION['cart'][$id]['quantity'] <= 0) unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: index.php?action=view_cart');
        exit();
    }

    // HÀM QUAN TRỌNG ĐỂ HẾT LỖI GẠCH ĐỎ
    public function remove_from_cart() {
        $id = $_GET['id'] ?? null;
        if (isset($_SESSION['cart'][$id])) unset($_SESSION['cart'][$id]);
        header('Location: index.php?action=view_cart');
        exit();
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagePath = 'assets/images/default.jpg';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploadDir = 'assets/images/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetPath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) $imagePath = $targetPath;
            }
            $data = $_POST; $data['image'] = $imagePath;
            $this->model->save($data);
            header('Location: index.php'); exit();
        } else include 'view/product_add.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        $product = $this->model->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagePath = $product['image'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $fileName)) $imagePath = 'assets/images/' . $fileName;
            }
            $data = $_POST; $data['image'] = $imagePath;
            $this->model->update($id, $data);
            header('Location: index.php'); exit();
        } else include 'view/product_edit.php';
    }

    public function delete() {
        $this->model->delete($_GET['id'] ?? null);
        header('Location: index.php'); exit();
    }
}