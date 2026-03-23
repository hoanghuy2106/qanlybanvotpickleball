<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kho Vợt | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --primary: #4318ff;
            --bg-body: #f4f7fe;
            --text-main: #1b2559;
            --text-muted: #a3aed0;
            --shadow: 14px 17px 40px 4px rgba(112, 144, 176, 0.08);
        }

        body { 
            background-color: var(--bg-body); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: var(--text-main);
            padding: 40px 0;
        }

        .container { max-width: 1100px; }
        
        /* Dashboard Card */
        .product-card { 
            border: none; border-radius: 24px; 
            background: #fff; box-shadow: var(--shadow);
            padding: 25px;
        }

        /* Badge thông báo */
        .alert-toast {
            position: fixed; top: 20px; right: 20px; z-index: 1060;
            border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 15px 25px; display: flex; align-items: center; gap: 12px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .page-title { font-weight: 800; letter-spacing: -1.5px; margin-bottom: 2px; }
        
        .btn-add-new {
            background: var(--primary); color: #fff; border: none;
            padding: 12px 28px; border-radius: 16px; font-weight: 700;
            transition: all 0.3s ease; box-shadow: 0px 10px 20px rgba(67, 24, 255, 0.2);
        }
        .btn-add-new:hover { transform: translateY(-3px); color: #fff; opacity: 0.9; }

        /* Table UI */
        .table thead th {
            border: none; color: var(--text-muted); font-size: 11px;
            text-transform: uppercase; letter-spacing: 1px; padding: 15px 20px;
        }
        .table tbody td { padding: 18px 20px; border-top: 1px solid #f4f7fe; vertical-align: middle; }
        .table tbody tr:hover { background: #fafbff; }

        .brand-label { 
            background: #eef2ff; color: var(--primary); 
            font-weight: 800; font-size: 10px; padding: 6px 14px; border-radius: 10px;
            text-transform: uppercase;
        }
        
        .spec-item { font-size: 12px; color: var(--text-muted); font-weight: 600; background: #f8f9fa; padding: 3px 8px; border-radius: 6px; }

        .action-btn {
            width: 38px; height: 38px; border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center;
            text-decoration: none; transition: 0.2s;
        }
        .edit-btn { background: rgba(67, 24, 255, 0.08); color: var(--primary); }
        .edit-btn:hover { background: var(--primary); color: #fff; }
        .delete-btn { background: rgba(238, 93, 80, 0.08); color: #ee5d50; }
        .delete-btn:hover { background: #ee5d50; color: #fff; }
    </style>
</head>
<body>

<?php if(isset($_GET['msg'])): ?>
    <?php 
        $msg_type = 'success'; $icon = 'fa-circle-check'; $text = '';
        switch($_GET['msg']) {
            case 'add_success': $text = 'Đã thêm vợt mới vào kho!'; break;
            case 'update_success': $text = 'Cập nhật thông tin thành công!'; break;
            case 'delete_success': $text = 'Đã xóa sản phẩm khỏi hệ thống.'; break;
            case 'not_found': $msg_type = 'danger'; $icon = 'fa-circle-exclamation'; $text = 'Không tìm thấy sản phẩm!'; break;
        }
    ?>
    <?php if($text): ?>
        <div class="alert alert-<?= $msg_type ?> alert-toast shadow" id="auto-alert">
            <i class="fa-solid <?= $icon ?> fs-4"></i>
            <div class="fw-bold"><?= $text ?></div>
        </div>
        <script>
            setTimeout(() => { 
                const el = document.getElementById('auto-alert');
                if(el) el.style.display = 'none';
            }, 4000);
        </script>
    <?php endif; ?>
<?php endif; ?>

<div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3">
        <div>
            <h2 class="page-title">Kho Hàng Pickleball</h2>
            <p class="text-muted mb-0 small fw-bold text-uppercase" style="letter-spacing: 1px;">
                <i class="fa-solid fa-boxes-stacked text-primary me-2"></i> Tổng cộng: <?= count($products ?? []) ?> phiên bản
            </p>
        </div>
        <a href="index.php?controller=product&action=create" class="btn btn-add-new">
            <i class="fa-solid fa-plus-circle me-2"></i> Thêm Vợt Mới
        </a>
    </div>

    <div class="card product-card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="10%">Mã Số</th>
                        <th width="40%">Chi Tiết Sản Phẩm</th>
                        <th width="15%">Thương Hiệu</th>
                        <th width="20%" class="text-end">Giá Niêm Yết</th>
                        <th width="15%" class="text-center">Quản Lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($products)): ?>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td class="fw-bold text-muted small">#<?= sprintf("%03d", $p['id']) ?></td>
                            <td>
                                <div class="fw-extrabold mb-1" style="font-size: 1.05rem;"><?= htmlspecialchars($p['name']) ?></div>
                                <div class="d-flex gap-2">
                                    <span class="spec-item"><?= htmlspecialchars($p['surface']) ?></span>
                                    <span class="spec-item"><?= htmlspecialchars($p['weight']) ?> oz</span>
                                </div>
                            </td>
                            <td><span class="brand-label"><?= htmlspecialchars($p['brand']) ?></span></td>
                            <td class="text-end">
                                <span class="fw-800 text-primary fs-5"><?= number_format($p['price'], 0, ',', '.') ?></span>
                                <small class="fw-bold text-muted">đ</small>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="index.php?controller=product&action=edit&id=<?= $p['id'] ?>" class="action-btn edit-btn" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                    <a href="index.php?controller=product&action=delete&id=<?= $p['id'] ?>" 
                                       class="action-btn delete-btn" 
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa mẫu vợt này?')" title="Xóa">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="py-5">
                                <div class="text-center opacity-50">
                                    <i class="fa-solid fa-box-open fs-1 mb-3"></i>
                                    <p class="fw-bold">Kho hàng hiện tại đang trống.</p>
                                    <a href="index.php?controller=product&action=create" class="btn btn-sm btn-outline-primary rounded-pill">Thêm ngay</a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5 text-center">
        <p class="text-muted fw-800 text-uppercase" style="font-size: 10px; letter-spacing: 2px;">
            © 2026 Pickleball Hub Management System
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>