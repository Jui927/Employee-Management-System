<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --danger-color: #ef4444;
        --danger-hover: #dc2626;
        --warning-color: #f59e0b;
        --warning-hover: #d97706;
        --success-color: #10b981;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
    }

    .employee-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--border-color);
    }

    .page-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-header h2::before {
        content: "👥";
        font-size: 2rem;
    }

    .search-add-wrapper {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .search-form {
        flex: 1;
        min-width: 300px;
        position: relative;
    }

    .search-form input {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid var(--border-color);
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .search-form input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .search-form::before {
        content: "🔍";
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
    }

    .btn-add {
        padding: 0.875rem 1.75rem;
        background: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: 0.75rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
        box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
    }

    .btn-add:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
    }

    .btn-add::before {
        content: "➕";
        font-size: 1rem;
    }

    .table-wrapper {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background: linear-gradient(135deg, var(--primary-color), #6366f1);
    }

    .table thead th {
        padding: 1.25rem 1rem;
        font-weight: 600;
        text-align: left;
        color: white;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border: none;
    }

    .table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: var(--bg-light);
        transform: scale(1.01);
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody td {
        padding: 1.25rem 1rem;
        color: var(--text-primary);
        vertical-align: middle;
        border: none;
    }

    .table tbody td:first-child {
        font-weight: 600;
        color: var(--primary-color);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }

    .btn-edit {
        background: var(--warning-color);
        color: white;
    }

    .btn-edit:hover {
        background: var(--warning-hover);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(245, 158, 11, 0.3);
    }

    .btn-edit::before {
        content: "✏️";
    }

    .btn-delete {
        background: var(--danger-color);
        color: white;
    }

    .btn-delete:hover {
        background: var(--danger-hover);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(239, 68, 68, 0.3);
    }

    .btn-delete::before {
        content: "🗑️";
    }

    .employee-badge {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        background: linear-gradient(135deg, #e0e7ff, #ddd6fe);
        color: var(--primary-color);
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-secondary);
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .employee-container {
            padding: 1rem;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .search-add-wrapper {
            flex-direction: column;
        }

        .search-form {
            min-width: 100%;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .table {
            font-size: 0.875rem;
        }

        .table thead th,
        .table tbody td {
            padding: 0.75rem 0.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="employee-container">
    <div class="page-header">
        <h2>Employee Management</h2>
    </div>

    <div class="search-add-wrapper">
        <form class="search-form" method="get">
            <input type="text" name="search" placeholder="Search by name or email...">
        </form>
        <a href="/employees/create" class="btn-add">Add Employee</a>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($employees)): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <div class="empty-state-icon">📋</div>
                            <p>No employees found. Add your first employee to get started!</p>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($employees as $emp): ?>
                    <tr>
                        <td><?= $emp['id'] ?></td>
                        <td><?= htmlspecialchars($emp['name']) ?></td>
                        <td><?= htmlspecialchars($emp['email']) ?></td>
                        <td><?= htmlspecialchars($emp['phone']) ?></td>
                        <td><span class="employee-badge"><?= htmlspecialchars($emp['department']) ?></span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="/employees/edit/<?= $emp['id'] ?>" class="btn-action btn-edit">Edit</a>
                                <a href="/employees/delete/<?= $emp['id'] ?>" class="btn-action btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>