<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Vợt Mới | Pickleball Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #4318ff; --bg: #f4f7fe; }
        body { background: var(--bg); font-family: 'Plus Jakarta Sans', sans-serif; padding: 40px 0; }
        .add-card { border: none; border-radius: 30px; background: #fff; box-shadow: 0 10px 40px rgba(112,144,176,0.1); padding: 40px; }
        .form-label { font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #1b2559; }
        .input-custom { background: #f4f7fe; border: 2px solid transparent; border-radius: 15px; padding: 12px 15px; font-weight: 600; }
        .input-custom:focus { background: #fff; border-color: var(--primary); box-shadow: none; }
        .btn-save { background: var(--primary); color: #fff; border-radius: 15px; padding: 12px; font-weight: 700; border: none; width: 100%; }
        #preview { width: 100px; height: 100px; object-fit: cover; border-radius: 15px; display: none; margin-top: 10px; border: 2px dashed #ddd; }
    </style>
</head>
<body>
<div class="container" style="max-width: 800px;">
    <div class="add-card">
        <h2 class="fw-800 mb-4"><i class="fa-solid fa-plus-circle me-2 text-primary"></i>Thêm Vợt Vào Kho</h2>
        
        <form action="index.php?action=add" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control input-custom" placeholder="Ví dụ: Joola Perseus 16mm" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Thương hiệu</label>
                    <input type="text" name="brand" class="form-control input-custom" placeholder="BombaX, Joola..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Giá niêm yết (VNĐ)</label>
                    <input type="number" name="price" class="form-control input-custom" placeholder="5400000" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Trọng lượng (oz)</label>
                    <input type="text" name="weight" class="form-control input-custom" placeholder="7.8 - 8.2">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Chất liệu bề mặt</label>
                    <input type="text" name="surface" class="form-control input-custom" placeholder="Carbon Fiber, Graphite...">
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Tải ảnh sản phẩm lên</label>
                <input type="file" name="image" id="imageInput" class="form-control input-custom" accept="image/*" required>
                <img id="preview" src="#" alt="Xem trước ảnh">
            </div>

            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-save">Xác nhận thêm</button>
                <a href="index.php" class="btn btn-light w-50" style="border-radius: 15px; padding: 12px; font-weight: 700;">Hủy</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Script để xem trước ảnh ngay khi chọn file
    imageInput.onchange = evt => {
        const [file] = imageInput.files
        if (file) {
            preview.src = URL.createObjectURL(file)
            preview.style.display = 'block'
        }
    }
</script>
</body>
</html>