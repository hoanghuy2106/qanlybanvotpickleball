<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --primary: #4318ff;
            --primary-soft: rgba(67, 24, 255, 0.05);
            --text-dark: #1b2559;
            --text-muted: #a3aed0;
            --bg-body: #f4f7fe;
            --shadow: 14px 17px 40px 4px rgba(112, 144, 176, 0.08);
        }

        body { 
            background-color: var(--bg-body); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: var(--text-dark);
            padding: 50px 0;
        }
        
        /* Breadcrumb tinh tế */
        .breadcrumb-custom { font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 10px; }
        .breadcrumb-custom a { color: var(--text-muted); text-decoration: none; transition: 0.2s; }
        .breadcrumb-custom a:hover { color: var(--primary); }

        /* Card thiết kế nổi */
        .form-card { 
            border: none; border-radius: 30px; 
            background: #fff; box-shadow: var(--shadow);
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .section-title {
            font-size: 1.1rem; font-weight: 800; color: var(--primary);
            margin-bottom: 25px; display: flex; align-items: center;
        }
        .section-title::after {
            content: ""; flex: 1; height: 1px; background: #f4f7fe; margin-left: 15px;
        }

        /* Form Controls chuyên nghiệp */
        .form-label { font-size: 0.75rem; font-weight: 800; color: var(--text-dark); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        
        .input-group-custom {
            background: #f4f7fe; border-radius: 16px; padding: 5px 15px;
            display: flex; align-items: center; border: 2px solid transparent;
            transition: 0.3s;
        }
        .input-group-custom:focus-within {
            background: #fff; border-color: var(--primary); box-shadow: 0 10px 20px rgba(67, 24, 255, 0.05);
        }
        .input-group-custom i { color: var(--text-muted); width: 20px; text-align: center; margin-right: 12px; }
        .input-group-custom input {
            border: none; background: transparent; outline: none;
            padding: 10px 0; width: 100%; font-weight: 600; color: var(--text-dark);
        }
        .input-group-custom input::placeholder { color: #cbd5e0; font-weight: 500; }

        /* Buttons */
        .btn-save { 
            background: var(--primary); color: white; border: none;
            border-radius: 18px; padding: 15px 35px; font-weight: 700;
            box-shadow: 0px 10px 20px rgba(67, 24, 255, 0.2);
            transition: 0.3s;
        }
        .btn-save:hover { transform: translateY(-3px); box-shadow: 0px 15px 25px rgba(67, 24, 255, 0.3); color: #fff; }
        
        .btn-back {
            background: #f4f7fe; color: var(--text-dark); border: none;
            border-radius: 18px; padding: 15px 25px; font-weight: 700; transition: 0.3s;
        }
        .btn-back:hover { background: #eef2ff; color: var(--primary); }

        /* Alert Lỗi */
        .error-badge {
            background: #fff5f5; color: #e53e3e; border: 1px solid #feb2b2;
            border-radius: 15px; padding: 12px 20px; font-size: 0.85rem; font-weight: 600;
            margin-bottom: 25px; display: flex; align-items: center;
        }

        /* Trợ giúp trực quan */
        .help-box {
            background: linear-gradient(135deg, #4318ff 0%, #3311db 100%);
            border-radius: 24px; padding: 30px; color: white; height: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            
            <div class="breadcrumb-custom text-uppercase">
                <a href="index.php">DASHBOARD</a> <i class="fa-solid fa-chevron-right mx-2" style="font-size: 8px;"></i> QUẢN LÝ KHO <i class="fa-solid fa-chevron-right mx-2" style="font-size: 8px;"></i> THÊM MỚI
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card form-card">
                        <h3 class="fw-extrabold mb-4" style="letter-spacing: -1.5px;">Thiết lập thông số vợt</h3>

                        <?php if (isset($error)): ?>
                            <div class="error-badge">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                                <?= $error ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="index.php?controller=product&action=create" method="POST">
                            
                            <div class="section-title">THÔNG TIN CƠ BẢN</div>
                            
                            <div class="mb-4">
                                <label class="form-label">Tên sản phẩm đầy đủ</label>
                                <div class="input-group-custom">
                                    <i class="fa-solid fa-signature"></i>
                                    <input type="text" name="name" placeholder="Ví dụ: WAVEX Pro T700 Elite Edition" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Thương hiệu</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-copyright"></i>
                                        <input type="text" name="brand" placeholder="Ví dụ: WAVEX" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Giá niêm yết (VNĐ)</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-coins"></i>
                                        <input type="number" name="price" placeholder="2.500.000" required min="1">
                                    </div>
                                </div>
                            </div>

                            <div class="section-title mt-2">THÔNG SỐ KỸ THUẬT</div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Trọng lượng (oz)</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-dumbbell"></i>
                                        <input type="text" name="weight" placeholder="7.8 - 8.2">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Bề mặt chất liệu</label>
                                    <div class="input-group-custom">
                                        <i class="fa-solid fa-microchip"></i>
                                        <input type="text" name="surface" placeholder="Carbon Fiber T700">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4 pt-4 border-top">
                                <button type="submit" class="btn btn-save flex-grow-1">
                                    <i class="fa-solid fa-check-double me-2"></i> Xác nhận nhập kho
                                </button>
                                <a href="index.php" class="btn btn-back">Hủy bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="help-box d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="fw-bold mb-3">Mẹo nhỏ chuyên gia</h4>
                            <ul class="list-unstyled opacity-75 small">
                                <li class="mb-3"><i class="fa-solid fa-lightbulb me-2"></i> <b>Tên sản phẩm:</b> Nên bao gồm phiên bản (Ví dụ: 16mm hoặc 14mm) để khách hàng dễ phân biệt.</li>
                                <li class="mb-3"><i class="fa-solid fa-lightbulb me-2"></i> <b>Giá cả:</b> Hãy nhập giá trị thực tế của các dòng vợt cao cấp như WAVEX hoặc Selkirk.</li>
                                <li class="mb-3"><i class="fa-solid fa-lightbulb me-2"></i> <b>Thông số:</b> Bề mặt Carbon T700 là điểm cộng lớn cho hiệu suất xoáy của vợt.</li>
                            </ul>
                        </div>
                        <div class="text-center pt-4">
                            <i class="fa-solid fa-rocket fa-4x text-white opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>