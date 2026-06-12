<?php
/** @var array $sinhvien */
/** @var int $total */
/** @var int $page */
/** @var int $totalPages */
/** @var int $perPage */
/** @var int $offset */
?>
<div class="page-card">
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Danh sách sinh viên</h1>
            <p class="page-subtitle" style="margin-bottom:0;">Quản lý thông tin sinh viên trong hệ thống</p>
            <span class="stat-badge">Tổng: <?= $total ?> sinh viên · <?= $perPage ?> / trang</span>
        </div>
        <a href="/StudentController/create" class="btn-add">
            <span class="btn-add-icon">＋</span> Thêm sinh viên
        </a>
    </div>

    <?php if (!empty($sinhvien)): ?>
    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th class="col-stt">STT</th>
                    <th>MSSV</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhvien as $i => $sv):
                    $gt = mb_strtolower(trim($sv['gioitinh'] ?? ''));
                    if (in_array($gt, ['nam', 'male'])) {
                        $badgeClass = 'badge-nam';
                    } elseif (in_array($gt, ['nữ', 'nu', 'female'])) {
                        $badgeClass = 'badge-nu';
                    } else {
                        $badgeClass = 'badge-other';
                    }
                ?>
                <tr>
                    <td class="col-stt"><?= $offset + $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($sv['mssv']) ?></strong></td>
                    <td><?= htmlspecialchars($sv['hoten']) ?></td>
                    <td>
                        <span class="badge <?= $badgeClass ?>">
                            <?= htmlspecialchars($sv['gioitinh']) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="/StudentController/index?page=<?= $page - 1 ?>" class="page-btn">&laquo; Trước</a>
        <?php else: ?>
            <span class="page-btn disabled">&laquo; Trước</span>
        <?php endif; ?>

        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <a href="/StudentController/index?page=<?= $p ?>"
               class="page-btn <?= $p === $page ? 'active' : '' ?>">
                <?= $p ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="/StudentController/index?page=<?= $page + 1 ?>" class="page-btn">Sau &raquo;</a>
        <?php else: ?>
            <span class="page-btn disabled">Sau &raquo;</span>
        <?php endif; ?>
    </div>
    <p class="pagination-info">
        Hiển thị <?= $offset + 1 ?>–<?= min($offset + $perPage, $total) ?> / <?= $total ?> sinh viên
    </p>
    <?php endif; ?>

    <?php else: ?>
    <div class="empty-state">
        <div class="empty-state-icon">📋</div>
        <p>Chưa có sinh viên nào trong hệ thống.</p>
    </div>
    <?php endif; ?>
</div>
