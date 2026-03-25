<?php
require_once 'model/ProductModel.php';
$list = (new ProductModel())->getAll();

// Tính tổng số lượng trong giỏ hàng để hiển thị badge
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) { $cart_count += $item['quantity']; }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Pickleball Shop | Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f4f7fe; font-family: 'Plus Jakarta Sans', sans-serif; }
        .main-card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .img-prod { width: 55px; height: 55px; border-radius: 12px; object-fit: cover; }
        .badge-brand { background: #eef2ff; color: #4318ff; border-radius: 8px; padding: 5px 12px; }
        .btn-cart-float { position: relative; }
        .cart-badge { position: absolute; top: -5px; right: -10px; font-size: 0.7rem; padding: 3px 6px; }
    </style>
</head>
<body class="p-4">
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div><h2 class="fw-bold mb-0">Cửa Hàng Vợt</h2><p class="text-muted">Lựa chọn mẫu vợt ưng ý nhất</p></div>
        <div class="d-flex gap-3">
            <a href="index.php?action=view_cart" class="btn btn-outline-primary rounded-pill px-4 btn-cart-float">
                <i class="fa fa-shopping-cart me-2"></i> Giỏ hàng
                <?php if($cart_count > 0): ?>
                    <span class="badge rounded-pill bg-danger cart-badge"><?= $cart_count ?></span>
                <?php endif; ?>
            </a>
            <a href="index.php?action=add" class="btn btn-primary rounded-pill px-4 shadow-sm"><i class="fa fa-plus me-2"></i>Quản lý kho</a>
        </div>
    </div>

    <div class="card main-card bg-white p-3">
        <div class="d-flex justify-content-between mb-3 px-2">
            <h5 class="fw-bold m-0">Danh sách sản phẩm</h5>
            <input type="text" id="searchBox" class="form-control w-25 border-0 bg-light" placeholder="Tìm vợt...">
        </div>
        <table class="table align-middle">
            <thead class="table-light">
                <tr><th>SẢN PHẨM</th><th>HÃNG</th><th class="text-end">GIÁ BÁN</th><th class="text-center">MUA HÀNG</th><th class="text-center">ADMIN</th></tr>
            </thead>
            <tbody id="productTable">
                <?php foreach ($list as $p): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= $p['image'] ?>" class="img-prod me-3">
                            <div>
                                <span class="fw-bold d-block"><?= htmlspecialchars($p['name']) ?></span>
                                <small class="text-muted"><?= $p['surface'] ?></small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-brand"><?= $p['brand'] ?></span></td>
                    <td class="text-end fw-bold text-primary"><?= number_format($p['price']) ?>đ</td>
                    
                    <td class="text-center">
                        <a href="index.php?action=add_to_cart&id=<?= $p['id'] ?>" class="btn btn-sm btn-success rounded-pill px-3">
                            <i class="fa fa-cart-plus me-1"></i> Thêm vào giỏ
                        </a>
                    </td>

                    <td class="text-center">
                        <a href="index.php?action=edit&id=<?= $p['id'] ?>" class="text-warning me-2"><i class="fa fa-edit"></i></a>
                        <a href="index.php?action=delete&id=<?= $p['id'] ?>" class="text-danger" onclick="return confirm('Xóa?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('searchBox').addEventListener('keyup', function() {
        let val = this.value.toLowerCase();
        document.querySelectorAll('#productTable tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
        });
    });
</script>
</body>
</html>