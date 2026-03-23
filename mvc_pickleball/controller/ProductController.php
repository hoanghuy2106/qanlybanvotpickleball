<?php
// Sử dụng đường dẫn tuyệt đối để tránh lỗi Failed to open stream
require_once __DIR__ . '/../model/ProductModel.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    /**
     * Hiển thị danh sách sản phẩm
     */
    public function index() {
        // Lấy danh sách từ Model
        $allProducts = $this->model->getAll();
        
        // Đảo ngược để sản phẩm mới thêm lên đầu
        $products = array_reverse($allProducts);
        
        require_once __DIR__ . '/../view/product_list.php';
    }

    /**
     * Thêm sản phẩm mới
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Trim dữ liệu để tránh khoảng trắng dư thừa
            $data = [
                'name'    => trim($_POST['name'] ?? ''),
                'brand'   => trim($_POST['brand'] ?? ''),
                'price'   => (int)($_POST['price'] ?? 0),
                'weight'  => trim($_POST['weight'] ?? ''),
                'surface' => trim($_POST['surface'] ?? '')
            ];

            // Validate cơ bản: Không được để trống tên và giá phải dương
            if (!empty($data['name']) && $data['price'] > 0) {
                $this->model->add($data);
                header("Location: index.php?msg=add_success");
                exit();
            } else {
                $error = "Vui lòng nhập đầy đủ thông tin sản phẩm và giá hợp lệ!";
            }
        }
        require_once __DIR__ . '/../view/product_add.php';
    }

    /**
     * Chỉnh sửa sản phẩm
     */
    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $product = $this->model->getById($id);
        
        // Nếu không tìm thấy sản phẩm, quay về trang chủ
        if (!$product) {
            header("Location: index.php?msg=not_found");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'    => trim($_POST['name'] ?? ''),
                'brand'   => trim($_POST['brand'] ?? ''),
                'price'   => (int)($_POST['price'] ?? 0),
                'weight'  => trim($_POST['weight'] ?? ''),
                'surface' => trim($_POST['surface'] ?? '')
            ];

            if (!empty($data['name'])) {
                $this->model->update($id, $data);
                header("Location: index.php?msg=update_success");
                exit();
            } else {
                $error = "Tên sản phẩm không được để trống!";
            }
        }
        
        require_once __DIR__ . '/../view/product_edit.php';
    }

    /**
     * Xóa sản phẩm
     */
    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($id > 0) {
            $result = $this->model->delete($id);
            if ($result) {
                header("Location: index.php?msg=delete_success");
            } else {
                header("Location: index.php?msg=error");
            }
        } else {
            header("Location: index.php");
        }
        exit();
    }
}