<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --success-color: #10b981;
        --success-hover: #059669;
        --danger-color: #ef4444;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
        --input-focus: rgba(79, 70, 229, 0.1);
    }

    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .form-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .form-header h2::before {
        content: "👤";
        font-size: 2.5rem;
    }

    .form-header p {
        color: var(--text-secondary);
        font-size: 1rem;
    }

    .form-card {
        background: white;
        border-radius: 1rem;
        padding: 2.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
    }

    .form-group {
        margin-bottom: 1.75rem;
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
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 4px var(--input-focus);
    }

    .form-control::placeholder {
        color: #9ca3af;
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

    .btn-success {
        background: var(--success-color);
        color: white;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
    }

    .btn-success:hover {
        background: var(--success-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-success::before {
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

    .progress-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--border-color);
    }

    .progress-step {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .progress-step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.5rem;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .progress-step-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 1rem;
            margin: 1rem auto;
        }

        .form-card {
            padding: 1.5rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .progress-indicator {
            flex-direction: column;
            gap: 1rem;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .progress-step-number {
            margin: 0;
        }

        .progress-step-label {
            text-align: left;
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

    .form-card {
        animation: slideIn 0.4s ease-out;
    }

    .form-group {
        animation: slideIn 0.5s ease-out backwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
</style>

<div class="form-container">
    <div class="form-header">
        <h2>Add New Employee</h2>
        <p>Fill in the details below to add a new employee to the system</p>
    </div>

    <div class="form-card">
        <div class="progress-indicator">
            <div class="progress-step">
                <div class="progress-step-number">1</div>
                <div class="progress-step-label">Personal Info</div>
            </div>
        </div>

        <form method="post" action="/employees/store">
            <div class="form-group">
                <label>
                    <span class="icon">👤</span>
                    Full Name
                    <span class="required">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Enter employee's full name"
                    required
                    autocomplete="name"
                >
                <div class="input-hint">Please enter the complete name of the employee</div>
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
                    class="form-control" 
                    placeholder="employee@company.com"
                    required
                    autocomplete="email"
                >
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
                    class="form-control" 
                    placeholder="+1 (555) 123-4567"
                    required
                    autocomplete="tel"
                >
                <div class="input-hint">Contact number with country code</div>
            </div>

            <div class="form-group">
                <label>
                    <span class="icon">🏢</span>
                    Department
                    <span class="required">*</span>
                </label>
                <select name="department" class="form-control" required>
                    <option value="">Select a department</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Sales">Sales</option>
                    <option value="Finance">Finance</option>
                    <option value="Operations">Operations</option>
                    <option value="Customer Support">Customer Support</option>
                    <option value="IT">IT</option>
                    <option value="Product">Product</option>
                    <option value="Design">Design</option>
                </select>
                <div class="input-hint">Select the employee's primary department</div>
            </div>

            <div class="form-actions">
                <a href="/employees" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success">Save Employee</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>