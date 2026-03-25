<?php
$p = $product ?? ['id'=>'','name'=>'','brand'=>'','price'=>0,'weight'=>'','surface'=>'','image'=>''];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh Sửa #<?= $p['id'] ?> | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --warning: #ffb800; --bg: #f4f7fe; }
        body { background: var(--bg); font-family: 'Plus Jakarta Sans', sans-serif; padding: 40px 0; }
        .edit-card { border: none; border-radius: 30px; background: #fff; box-shadow: 0 10px 40px rgba(112,144,176,0.1); padding: 40px; }
        .form-label { font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #1b2559; }
        .input-custom { background: #f4f7fe; border: 2px solid transparent; border-radius: 15px; padding: 12px 15px; font-weight: 600; }
        .input-custom:focus { background: #fff; border-color: var(--warning); box-shadow: none; }
        .btn-update { background: #1b2559; color: #fff; border-radius: 15px; padding: 12px; font-weight: 700; border: none; width: 100%; }
        .id-badge { background: #ebeef5; color: #1b2559; padding: 5px 15px; border-radius: 10px; font-size: 0.8rem; font-weight: 800; }
        .current-img { width: 60px; height: 60px; border-radius: 12px; object-fit: cover; margin-bottom: 10px; border: 2px solid #eee; }
    </style>
</head>
<body>
<div class="container" style="max-width: 800px;">
    <div class="edit-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-800 mb-0"><i class="fa-solid fa-pen-to-square me-2 text-warning"></i>Cập Nhật Vợt</h2>
            <span class="id-badge">ID: #<?= $p['id'] ?></span>
        </div>
        
        <form action="index.php?action=edit&id=<?= $p['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control input-custom" value="<?= htmlspecialchars($p['name']) ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Thương hiệu</label>
                    <input type="text" name="brand" class="form-control input-custom" value="<?= htmlspecialchars($p['brand']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Giá bán</label>
                    <input type="number" name="price" class="form-control input-custom" value="<?= $p['price'] ?>" required>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label d-block">Ảnh sản phẩm hiện tại</label>
                <?php if(!empty($p['image'])): ?>
                    <img src="<?= $p['image'] ?>" class="current-img">
                <?php endif; ?>
                <input type="file" name="image" class="form-control input-custom" accept="image/*">
                <small class="text-muted">Để trống nếu muốn giữ nguyên ảnh cũ</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Trọng lượng</label>
                    <input type="text" name="weight" class="form-control input-custom" value="<?= htmlspecialchars($p['weight']) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bề mặt</label>
                    <input type="text" name="surface" class="form-control input-custom" value="<?= htmlspecialchars($p['surface']) ?>">
                </div>
            </div>
            
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="btn btn-update">Lưu thay đổi</button>
                <a href="index.php" class="btn btn-light w-50" style="border-radius: 15px; padding: 12px; font-weight: 700;">Quay lại</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>