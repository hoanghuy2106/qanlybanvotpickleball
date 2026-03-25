<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f4f7fe; font-family: 'Plus Jakarta Sans', sans-serif; }
        .cart-card { border: none; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); background: #fff; }
        .img-cart { width: 70px; height: 70px; border-radius: 15px; object-fit: cover; }
        .btn-qty { width: 30px; height: 30px; border-radius: 8px; border: 1px solid #ddd; background: #fff; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; color: #333; }
        .btn-qty:hover { background: #4318ff; color: #fff; border-color: #4318ff; }
        .total-section { background: #f8f9fa; border-radius: 20px; padding: 25px; }
    </style>
</head>
<body class="py-5">
<div class="container">
    <div class="cart-card p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-800 mb-0"><i class="fa-solid fa-cart-shopping text-primary me-2"></i>Giỏ Hàng Của Bạn</h2>
            <a href="index.php" class="text-decoration-none fw-bold text-muted"><i class="fa fa-arrow-left me-1"></i> Tiếp tục mua sắm</a>
        </div>

        <?php if (!empty($cart)): ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="text-muted small">
                    <tr>
                        <th class="border-0">SẢN PHẨM</th>
                        <th class="border-0 text-center">GIÁ</th>
                        <th class="border-0 text-center">SỐ LƯỢNG</th>
                        <th class="border-0 text-end">TỔNG</th>
                        <th class="border-0 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; foreach ($cart as $id => $item): 
                        $sub = $item['price'] * $item['quantity']; 
                        $total += $sub; 
                    ?>
                    <tr>
                        <td class="py-3">
                            <div class="d-flex align-items-center">
                                <img src="<?= $item['image'] ?>" class="img-cart me-3 shadow-sm">
                                <span class="fw-bold text-dark"><?= htmlspecialchars($item['name']) ?></span>
                            </div>
                        </td>
                        <td class="text-center fw-bold"><?= number_format($item['price']) ?>đ</td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <a href="index.php?action=update_cart&id=<?= $id ?>&type=decrease" class="btn-qty">-</a>
                                <span class="fw-bold px-2"><?= $item['quantity'] ?></span>
                                <a href="index.php?action=update_cart&id=<?= $id ?>&type=increase" class="btn-qty">+</a>
                            </div>
                        </td>
                        <td class="text-end fw-bold text-primary"><?= number_format($sub) ?>đ</td>
                        <td class="text-center">
                            <a href="index.php?action=remove_from_cart&id=<?= $id ?>" class="text-danger p-2" onclick="return confirm('Bỏ sản phẩm này?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-md-5">
                <div class="total-section">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tạm tính:</span>
                        <span class="fw-bold"><?= number_format($total) ?>đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Phí vận chuyển:</span>
                        <span class="text-success fw-bold">Miễn phí</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="h5 mb-0 fw-bold">Tổng cộng:</span>
                        <span class="h4 mb-0 fw-800 text-primary"><?= number_format($total) ?>đ</span>
                    </div>
                    <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow" onclick="alert('Đơn hàng đã được ghi nhận!')">
                        TIẾN HÀNH THANH TOÁN
                    </button>
                </div>
            </div>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <img src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" style="width: 150px; opacity: 0.5;">
            <p class="mt-4 text-muted fw-bold">Giỏ hàng của bạn đang trống!</p>
            <a href="index.php" class="btn btn-primary rounded-pill px-4 mt-2">Đi mua sắm ngay</a>
        </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>