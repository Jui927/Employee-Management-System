<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --warning-color: #f59e0b;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
        --input-focus: rgba(79, 70, 229, 0.1);
    }

    .edit-container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 2rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .edit-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .edit-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .edit-header h2::before {
        content: "✏️";
        font-size: 2.5rem;
    }

    .edit-header p {
        color: var(--text-secondary);
        font-size: 1rem;
    }

    .employee-id-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #e0e7ff, #ddd6fe);
        color: var(--primary-color);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .employee-id-badge::before {
        content: "🆔";
    }

    .edit-card {
        background: white;
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
        border-left: 4px solid var(--warning-color);
    }

    .form-notice {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border-left: 4px solid var(--warning-color);
        padding: 1rem 1.25rem;
        border-radius: 0.75rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: start;
        gap: 0.75rem;
    }

    .form-notice-icon {
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .form-notice-content h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1rem;
        font-weight: 700;
        color: #92400e;
    }

    .form-notice-content p {
        margin: 0;
        font-size: 0.875rem;
        color: #78350f;
    }

    .form-group {
        margin-bottom: 1.75rem;
        position: relative;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group label .required {
        color: var(--danger-color);
        font-size: 1.25rem;
    }

    .form-group label .icon {
        font-size: 1.1rem;
    }

    .form-control {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--bg-light);
        color: var(--text-primary);
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--warning-color);
        background: white;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
    }

    .form-control.changed {
        background: #fef3c7;
        border-color: var(--warning-color);
    }

    .input-hint {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-top: 0.375rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .input-hint::before {
        content: "ℹ️";
        font-size: 0.875rem;
    }

    .change-indicator {
        position: absolute;
        right: 1rem;
        top: 2.5rem;
        background: var(--warning-color);
        color: white;
        padding: 0.25rem 0.625rem;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        font-weight: 600;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .change-indicator.visible {
        opacity: 1;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 2px solid var(--border-color);
    }

    .btn {
        padding: 0.875rem 2rem;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        flex: 1;
    }

    .btn-primary {
        background: var(--warning-color);
        color: white;
        box-shadow: 0 4px 6px rgba(245, 158, 11, 0.2);
    }

    .btn-primary:hover {
        background: #d97706;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(245, 158, 11, 0.3);
    }

    .btn-primary::before {
        content: "💾";
        font-size: 1.1rem;
    }

    .btn-secondary {
        background: white;
        color: var(--text-primary);
        border: 2px solid var(--border-color);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary:hover {
        background: var(--bg-light);
        border-color: var(--text-secondary);
        transform: translateY(-2px);
    }

    .btn-secondary::before {
        content: "↩️";
        font-size: 1.1rem;
    }

    .btn-danger {
        background: var(--danger-color);
        color: white;
        flex: 0.5;
        box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
    }

    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(239, 68, 68, 0.3);
    }

    .btn-danger::before {
        content: "🗑️";
        font-size: 1.1rem;
    }

    .comparison-view {
        background: var(--bg-light);
        border-radius: 0.75rem;
        padding: 1.25rem;
        margin-top: 2rem;
        border: 2px dashed var(--border-color);
    }

    .comparison-view h4 {
        margin: 0 0 1rem 0;
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .comparison-item {
        display: grid;
        grid-template-columns: 150px 1fr 1fr;
        gap: 1rem;
        padding: 0.75rem;
        background: white;
        border-radius: 0.5rem;
        margin-bottom: 0.75rem;
        font-size: 0.875rem;
    }

    .comparison-item:last-child {
        margin-bottom: 0;
    }

    .comparison-label {
        font-weight: 600;
        color: var(--text-primary);
    }

    .comparison-old {
        color: var(--text-secondary);
        text-decoration: line-through;
    }

    .comparison-new {
        color: var(--success-color);
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .edit-container {
            padding: 1rem;
            margin: 1rem auto;
        }

        .edit-card {
            padding: 1.5rem;
        }

        .edit-header h2 {
            font-size: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .comparison-item {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .comparison-label {
            font-weight: 700;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.5rem;
        }
    }

    /* Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .edit-card {
        animation: slideIn 0.4s ease-out;
    }

    .form-group {
        animation: slideIn 0.5s ease-out backwards;
    }

    .form-group:nth-child(2) { animation-delay: 0.1s; }
    .form-group:nth-child(3) { animation-delay: 0.2s; }
    .form-group:nth-child(4) { animation-delay: 0.3s; }
    .form-group:nth-child(5) { animation-delay: 0.4s; }
</style>

<div class="edit-container">
    <div class="edit-header">
        <h2>Edit Employee</h2>
        <p>Update employee information below</p>
        <div class="employee-id-badge">Employee ID: <?= htmlspecialchars($employee['id']) ?></div>
    </div>

    <div class="edit-card">
        <div class="form-notice">
            <div class="form-notice-icon">⚠️</div>
            <div class="form-notice-content">
                <h4>Editing Mode</h4>
                <p>You are currently modifying employee information. Make sure all changes are accurate before saving.</p>
            </div>
        </div>

        <form method="post" action="/employees/update/<?= $employee['id'] ?>" id="editForm">
            <div class="form-group">
                <label>
                    <span class="icon">👤</span>
                    Full Name
                    <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    value="<?= htmlspecialchars($employee['name']) ?>" 
                    class="form-control"
                    data-original="<?= htmlspecialchars($employee['name']) ?>"
                    placeholder="Enter employee's full name"
                    required
                    autocomplete="name"
                >
                <span class="change-indicator">Modified</span>
                <div class="input-hint">Complete name of the employee</div>
            </div>

            <div class="form-group">
                <label>
                    <span class="icon">📧</span>
                    Email Address
                    <span class="required">*</span>
                </label>
                <input 
                    type="email" 
                    name="email" 
                    value="<?= htmlspecialchars($employee['email']) ?>" 
                    class="form-control"
                    data-original="<?= htmlspecialchars($employee['email']) ?>"
                    placeholder="employee@company.com"
                    required
                    autocomplete="email"
                >
                <span class="change-indicator">Modified</span>
                <div class="input-hint">Work email address for communication</div>
            </div>

            <div class="form-group">
                <label>
                    <span class="icon">📱</span>
                    Phone Number
                    <span class="required">*</span>
                </label>
                <input 
                    type="tel" 
                    name="phone" 
                    value="<?= htmlspecialchars($employee['phone']) ?>" 
                    class="form-control"
                    data-original="<?= htmlspecialchars($employee['phone']) ?>"
                    placeholder="+1 (555) 123-4567"
                    required
                    autocomplete="tel"
                >
                <span class="change-indicator">Modified</span>
                <div class="input-hint">Contact number with country code</div>
            </div>

            <div class="form-group">
                <label>
                    <span class="icon">🏢</span>
                    Department
                    <span class="required">*</span>
                </label>
                <select 
                    name="department" 
                    class="form-control"
                    data-original="<?= htmlspecialchars($employee['department']) ?>"
                    required
                >
                    <option value="">Select a department</option>
                    <option value="Human Resources" <?= $employee['department'] == 'Human Resources' ? 'selected' : '' ?>>Human Resources</option>
                    <option value="Engineering" <?= $employee['department'] == 'Engineering' ? 'selected' : '' ?>>Engineering</option>
                    <option value="Marketing" <?= $employee['department'] == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                    <option value="Sales" <?= $employee['department'] == 'Sales' ? 'selected' : '' ?>>Sales</option>
                    <option value="Finance" <?= $employee['department'] == 'Finance' ? 'selected' : '' ?>>Finance</option>
                    <option value="Operations" <?= $employee['department'] == 'Operations' ? 'selected' : '' ?>>Operations</option>
                    <option value="Customer Support" <?= $employee['department'] == 'Customer Support' ? 'selected' : '' ?>>Customer Support</option>
                    <option value="IT" <?= $employee['department'] == 'IT' ? 'selected' : '' ?>>IT</option>
                    <option value="Product" <?= $employee['department'] == 'Product' ? 'selected' : '' ?>>Product</option>
                    <option value="Design" <?= $employee['department'] == 'Design' ? 'selected' : '' ?>>Design</option>
                </select>
                <span class="change-indicator">Modified</span>
                <div class="input-hint">Select the employee's primary department</div>
            </div>

            <div class="form-actions">
                <a href="/employees" class="btn btn-secondary">Cancel</a>
                <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this employee? This action cannot be undone.')) { window.location.href='/employees/delete/<?= $employee['id'] ?>'; }">Delete</button>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Track changes and show indicators
    document.querySelectorAll('.form-control').forEach(input => {
        const originalValue = input.dataset.original;
        const indicator = input.parentElement.querySelector('.change-indicator');
        
        input.addEventListener('input', function() {
            if (this.value !== originalValue) {
                this.classList.add('changed');
                if (indicator) indicator.classList.add('visible');
            } else {
                this.classList.remove('changed');
                if (indicator) indicator.classList.remove('visible');
            }
        });
    });

    // Warn on unsaved changes
    let formChanged = false;
    document.getElementById('editForm').addEventListener('change', function() {
        formChanged = true;
    });

    document.getElementById('editForm').addEventListener('submit', function() {
        formChanged = false;
    });

    window.addEventListener('beforeunload', function(e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
</script>

<?= $this->endSection() ?>