<div class="page-card">
    <h1 class="page-title">Trang chủ</h1>
    <p class="page-subtitle">
        Xin chào, <span class="highlight"><?= htmlspecialchars($username ?? 'Khách') ?></span>! Bạn đã đăng nhập thành công.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
        <a href="/StudentController/index" style="text-decoration:none;">
            <div style="background:#f0f7ff; border:1px solid #cce0ff; border-radius:10px; padding:24px; text-align:center; transition:transform 0.2s;">
                <div style="font-size:32px; margin-bottom:8px;">👨‍🎓</div>
                <strong style="color:#007bff;">Quản lý sinh viên</strong>
                <p style="margin:6px 0 0; font-size:13px; color:#666;">Xem danh sách sinh viên</p>
            </div>
        </a>
        <a href="/HomeController/about" style="text-decoration:none;">
            <div style="background:#f0fff4; border:1px solid #b8f0c8; border-radius:10px; padding:24px; text-align:center;">
                <div style="font-size:32px; margin-bottom:8px;">ℹ️</div>
                <strong style="color:#28a745;">Giới thiệu</strong>
                <p style="margin:6px 0 0; font-size:13px; color:#666;">Thông tin hệ thống</p>
            </div>
        </a>
    </div>
</div>
