<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?> | PMNM</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f6f9 0%, #e8eef5 100%);
            color: #333;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .site-header {
            background: #ffffff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #333;
            font-weight: 700;
            flex-shrink: 0;
        }
        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
        }
        .brand-text { font-size: 16px; }
        .main-nav {
            display: flex;
            gap: 8px;
            flex: 1;
            justify-content: center;
        }
        .nav-link {
            padding: 8px 16px;
            text-decoration: none;
            color: #555;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .nav-link:hover { background: #f0f4ff; color: #007bff; }
        .nav-link.active {
            background: #e7f1ff;
            color: #007bff;
            font-weight: 600;
        }
        .header-user {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }
        .user-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #555;
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }
        .btn-logout {
            padding: 8px 16px;
            background: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-logout:hover { background: #b02a37; }

        /* Main content */
        .site-main {
            flex: 1;
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
            padding: 32px 24px;
        }

        /* Footer */
        .site-footer {
            background: #ffffff;
            border-top: 1px solid #e9ecef;
            margin-top: auto;
        }
        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px 24px;
            text-align: center;
        }
        .site-footer p {
            margin: 0;
            font-size: 13px;
            color: #666;
        }
        .footer-sub {
            margin-top: 4px !important;
            color: #999 !important;
            font-size: 12px !important;
        }

        /* Shared card styles for child views */
        .page-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            padding: 36px 40px;
        }
        .page-title {
            margin: 0 0 8px;
            font-size: 24px;
            color: #222;
        }
        .page-subtitle {
            margin: 0 0 28px;
            color: #777;
            font-size: 15px;
        }
        .highlight { color: #007bff; font-weight: 700; }

        /* Table styles */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .page-header-text { flex: 1; }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-primary:hover { background: #0056b3; }
        .table-wrap {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .data-table thead {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
        }
        .data-table th {
            padding: 14px 16px;
            text-align: left;
            font-weight: 600;
            white-space: nowrap;
        }
        .data-table td {
            padding: 13px 16px;
            border-bottom: 1px solid #f0f0f0;
            color: #444;
        }
        .data-table tbody tr:hover { background: #f8fbff; }
        .data-table tbody tr:last-child td { border-bottom: none; }
        .data-table .col-stt { width: 60px; text-align: center; color: #999; }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-nam { background: #e7f1ff; color: #007bff; }
        .badge-nu { background: #fde8f0; color: #d63384; }
        .badge-other { background: #f0f0f0; color: #666; }
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #999;
        }
        .empty-state-icon { font-size: 48px; margin-bottom: 12px; }
        .stat-badge {
            display: inline-block;
            background: #e7f1ff;
            color: #007bff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 8px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 24px;
            flex-wrap: wrap;
        }
        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            background: #fff;
            color: #444;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .page-btn:hover:not(.disabled):not(.active) {
            background: #f0f7ff;
            border-color: #007bff;
            color: #007bff;
        }
        .page-btn.active {
            background: #007bff;
            border-color: #007bff;
            color: #fff;
            font-weight: 700;
        }
        .page-btn.disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }
        .pagination-info {
            text-align: center;
            margin: 12px 0 0;
            font-size: 13px;
            color: #888;
        }

        @media (max-width: 768px) {
            .header-inner { flex-wrap: wrap; height: auto; padding: 12px 16px; }
            .main-nav { order: 3; width: 100%; justify-content: flex-start; overflow-x: auto; }
            .header-user { margin-left: auto; }
        }
    </style>
</head>
<body>

    <?php require __DIR__ . '/partial/header.php'; ?>

    <main class="site-main">
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/partial/footer.php'; ?>

</body>
</html>
