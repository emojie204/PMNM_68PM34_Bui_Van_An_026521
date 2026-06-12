<?php
$username = $username ?? ($_SESSION['username'] ?? 'Khách');
$currentPath = trim($_GET['url'] ?? '', '/');
?>
<header class="site-header">
    <div class="header-inner">
        <a href="/HomeController/index" class="brand">
            <span class="brand-icon">PM</span>
            <span class="brand-text">Quản lý PMNM</span>
        </a>

        <nav class="main-nav">
            <a href="/HomeController/index" class="nav-link <?= $currentPath === 'HomeController/index' || $currentPath === '' ? 'active' : '' ?>">Trang chủ</a>
            <a href="/StudentController/index" class="nav-link <?= strpos($currentPath, 'StudentController') === 0 ? 'active' : '' ?>">Sinh viên</a>
            <a href="/HomeController/about" class="nav-link <?= $currentPath === 'HomeController/about' ? 'active' : '' ?>">Giới thiệu</a>
        </nav>

        <div class="header-user">
            <span class="user-badge">
                <span class="user-avatar"><?= strtoupper(substr(htmlspecialchars($username), 0, 1)) ?></span>
                <?= htmlspecialchars($username) ?>
            </span>
            <a href="/AuthController/logout" class="btn-logout">Đăng xuất</a>
        </div>
    </div>
</header>
