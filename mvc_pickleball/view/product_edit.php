<?php
// Đảm bảo trang không chết nếu Controller quên gửi biến
$p_id      = $product['id'] ?? 0;
$p_name    = $product['name'] ?? '';
$p_brand   = $product['brand'] ?? '';
$p_price   = $product['price'] ?? 0;
$p_weight  = $product['weight'] ?? '';
$p_surface = $product['surface'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa vợt #<?= sprintf("%03d", $p_id) ?> | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --primary: #4318ff; --primary-soft: rgba(67, 24, 255, 0.05);
            --bg-body: #f4f7fe; --card-shadow: 14px 17px 40px 4px rgba(112, 144, 176, 0.08);
            --text-dark: #1b2559; --text-gray: #a3aed0;
        }
        body { background-color: var(--bg-body); font-family: 'Plus Jakarta Sans', sans-serif; color: var(--text-dark); padding: 40px 0; }
        .breadcrumb-custom { font-size: 0.8rem; font-weight: 700; color: var(--text-gray); margin-bottom: 25px; }
        .breadcrumb-custom a { color: var(--text-gray); text-decoration: none; }
        .edit-card { border: none; border-radius: 30px; background: #fff; box-shadow: var(--card-shadow); padding: 40px; }
        .section-title { font-size: 1rem; font-weight: 800; color: var(--primary); margin-bottom: 25px; display: flex; align-items: center; }
        .section-title::after { content: ""; flex: 1; height: 1px; background: #f4f7fe; margin-left: 15px; }
        .form-label { font-size: 0.75rem; font-weight: 800; color: var(--text-dark); text-transform: uppercase; margin-bottom: 8px; }
        .input-group-custom { background: #f4f7fe; border-radius: 16px; padding: 5px 15px; display: flex; align-items: center; border: 2px solid transparent; transition: 0.3s; }
        .input-group-custom:focus-within { background: #fff; border-color: var(--primary); }
        .input-group-custom input { border: none; background: transparent; outline: none; padding: 10px 0; width: 100%; font-weight: 600; color: var(--text-dark); }
        .btn-save { background: var(--primary); color: white; border: none; border-radius: 18px; padding: 14px 30px; font-weight: 700; box-shadow: 0px 10px 20px rgba(67, 24, 255, 0.2); transition: 0.3s; }
        .btn-cancel { background: #f4f7fe; color: var(--text-dark); border: none; border-radius: 18px; padding: 14px 25px; font-weight: 700; text-decoration: none; }
        .info-box { background: linear-gradient(135deg, #868CFF 0%, #4318ff 100%); border-radius: 24px; padding: 30px; color: white; height: 100%; position: relative; overflow: hidden; }
        .id-badge { background: var(--primary-soft); color: var(--primary); padding: 5px 15px; border-radius: 12px; font-weight: 800; font-size: 0.85rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-11">
            <div class="breadcrumb-custom text-uppercase">
                <a href="index.php">DASHBOARD</a> 
                <i class="fa-solid fa-chevron-right mx-2" style="font-size: 10px;"></i> 
                KHO HÀNG 
                <i class="fa-solid fa-chevron-right mx-2" style="font-size: 10px;"></i> 
                <span class="text-primary">CHỈNH SỬA VỢT #<?= sprintf("%03d", $p_id) ?></span>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card edit-card">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h2 class="fw-800 mb-0" style="letter-spacing: -1px;">Cập nhật hồ sơ</h2>
                            <span class="id-badge">ID: #<?= sprintf("%03d", $p_id) ?></span>
                        </div>
                        
                        <form action="index.php?controller=product&action=edit&id=<?= $p_id ?>" method="POST">
                            <div class="section-title">THÔNG TIN CƠ BẢN</div>
                            
                            <div class="mb-4">
                                <label class="form-label">Tên sản phẩm</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-signature me-2 text-muted"></i>
                                    <input type="text" name="name" value="<?= htmlspecialchars($p_name) ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Thương hiệu</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-copyright me-2 text-muted"></i>
                                        <input type="text" name="brand" value="<?= htmlspecialchars($p_brand) ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Giá niêm yết</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-coins me-2 text-muted"></i>
                                        <input type="number" name="price" value="<?= $p_price ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="section-title mt-3">THÔNG SỐ KỸ THUẬT</div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Trọng lượng (oz)</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-dumbbell me-2 text-muted"></i>
                                        <input type="text" name="weight" value="<?= htmlspecialchars($p_weight) ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Chất liệu</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-microchip me-2 text-muted"></i>
                                        <input type="text" name="surface" value="<?= htmlspecialchars($p_surface) ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4 pt-4 border-top">
                                <button type="submit" class="btn btn-save flex-grow-1">Xác nhận cập nhật</button>
                                <a href="index.php" class="btn btn-cancel">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="info-box d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="fw-800 mb-3">Thông tin hiện tại</h4>
                            <h3 class="fw-800 text-white"><?= htmlspecialchars($p_name ?: 'Sản phẩm mới') ?></h3>
                            <p class="small opacity-75">Vui lòng kiểm tra kỹ các thông số trước khi lưu vào hệ thống kho.</p>
                        </div>
                        <div class="text-end opacity-25">
                            <i class="fa-solid fa-pen-nib fa-4x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>