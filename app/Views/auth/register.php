<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --success-color: #10b981;
        --success-hover: #059669;
        --danger-color: #ef4444;
        --warning-color: #f59e0b;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
        --input-focus: rgba(16, 185, 129, 0.1);
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .register-container {
        width: 100%;
        max-width: 520px;
        padding: 2rem;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .register-card {
        background: white;
        border-radius: 1.5rem;
        padding: 3rem 2.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .register-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .register-logo {
        font-size: 4rem;
        margin-bottom: 1rem;
        animation: bounce 1s ease-in-out;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .register-header h2 {
        font-size: 1.875rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 0.5rem 0;
    }

    .register-header p {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin: 0;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: start;
        gap: 0.75rem;
        animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    .alert-danger {
        background: #fee2e2;
        border-left: 4px solid var(--danger-color);
        color: #991b1b;
    }

    .alert-icon {
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
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
        border-color: var(--success-color);
        background: white;
        box-shadow: 0 0 0 4px var(--input-focus);
    }

    .form-control.valid {
        border-color: var(--success-color);
        background: #d1fae5;
    }

    .form-control.invalid {
        border-color: var(--danger-color);
        background: #fee2e2;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
        color: var(--text-secondary);
        pointer-events: none;
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.25rem;
        color: var(--text-secondary);
        padding: 0.25rem;
        transition: all 0.2s ease;
    }

    .password-toggle:hover {
        color: var(--success-color);
        transform: translateY(-50%) scale(1.1);
    }

    .validation-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .validation-icon.show {
        opacity: 1;
    }

    .password-strength {
        margin-top: 0.5rem;
        height: 4px;
        background: var(--border-color);
        border-radius: 2px;
        overflow: hidden;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .password-strength.show {
        opacity: 1;
    }

    .password-strength-bar {
        height: 100%;
        width: 0;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .password-strength-bar.weak {
        width: 33%;
        background: var(--danger-color);
    }

    .password-strength-bar.medium {
        width: 66%;
        background: var(--warning-color);
    }

    .password-strength-bar.strong {
        width: 100%;
        background: var(--success-color);
    }

    .password-requirements {
        margin-top: 0.75rem;
        padding: 0.75rem;
        background: var(--bg-light);
        border-radius: 0.5rem;
        font-size: 0.8rem;
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .password-requirements.show {
        opacity: 1;
        max-height: 200px;
    }

    .requirement {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0;
        color: var(--text-secondary);
    }

    .requirement.met {
        color: var(--success-color);
    }

    .requirement-icon {
        font-size: 0.875rem;
    }

    .terms-agreement {
        display: flex;
        align-items: start;
        gap: 0.75rem;
        margin: 1.5rem 0;
        padding: 1rem;
        background: var(--bg-light);
        border-radius: 0.75rem;
    }

    .terms-agreement input[type="checkbox"] {
        width: 1.125rem;
        height: 1.125rem;
        cursor: pointer;
        accent-color: var(--success-color);
        margin-top: 0.125rem;
        flex-shrink: 0;
    }

    .terms-agreement label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        cursor: pointer;
        margin: 0;
        line-height: 1.5;
    }

    .terms-agreement a {
        color: var(--success-color);
        text-decoration: none;
        font-weight: 600;
    }

    .terms-agreement a:hover {
        text-decoration: underline;
    }

    .btn-register {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--success-color), #34d399);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-register:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-register:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .btn-register::before {
        content: "✨";
        font-size: 1.1rem;
    }

    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1.75rem 0;
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid var(--border-color);
    }

    .divider span {
        padding: 0 1rem;
        font-weight: 500;
    }

    .login-link {
        text-align: center;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
    }

    .login-link p {
        color: var(--text-secondary);
        margin: 0 0 0.75rem 0;
        font-size: 0.95rem;
    }

    .btn-login {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: var(--success-color);
        border: 2px solid var(--success-color);
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background: var(--success-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    .btn-login::before {
        content: "🔐";
        font-size: 1.1rem;
    }

    @media (max-width: 640px) {
        .register-container {
            padding: 1rem;
        }

        .register-card {
            padding: 2rem 1.5rem;
        }

        .register-header h2 {
            font-size: 1.5rem;
        }
    }

    /* Loading state */
    .btn-register.loading {
        pointer-events: none;
        opacity: 0.7;
    }

    .btn-register.loading::after {
        content: "";
        width: 1rem;
        height: 1rem;
        border: 2px solid white;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        margin-left: 0.5rem;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <div class="register-logo">🎉</div>
            <h2>Create Account</h2>
            <p>Join us today and get started in seconds</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <div class="alert-icon">❌</div>
                <div class="alert-content">
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif; ?>

        <form method="post" action="/registerSubmit" id="registerForm">
            <div class="form-group">
                <label>Full Name</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="form-control" 
                        placeholder="John Doe"
                        required
                        autocomplete="name"
                        autofocus
                        minlength="2"
                    >
                    <span class="validation-icon" id="nameCheck"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="form-control" 
                        placeholder="you@example.com"
                        required
                        autocomplete="email"
                    >
                    <span class="validation-icon" id="emailCheck"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔑</span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-control" 
                        placeholder="Create a strong password"
                        required
                        autocomplete="new-password"
                        minlength="8"
                    >
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <span id="toggleIcon">👁️</span>
                    </button>
                </div>
                
                <div class="password-strength" id="passwordStrength">
                    <div class="password-strength-bar" id="strengthBar"></div>
                </div>

                <div class="password-requirements" id="passwordRequirements">
                    <div class="requirement" id="req-length">
                        <span class="requirement-icon">○</span>
                        <span>At least 8 characters</span>
                    </div>
                    <div class="requirement" id="req-uppercase">
                        <span class="requirement-icon">○</span>
                        <span>One uppercase letter</span>
                    </div>
                    <div class="requirement" id="req-number">
                        <span class="requirement-icon">○</span>
                        <span>One number</span>
                    </div>
                    <div class="requirement" id="req-special">
                        <span class="requirement-icon">○</span>
                        <span>One special character</span>
                    </div>
                </div>
            </div>

            <div class="terms-agreement">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    I agree to the <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="btn-register" id="registerBtn" disabled>
                Create Account
            </button>
        </form>

        <div class="divider">
            <span>Already have an account?</span>
        </div>

        <div class="login-link">
            <p>Welcome back! Sign in to continue</p>
            <a href="/login" class="btn-login">Login</a>
        </div>
    </div>
</div>

<script>
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const termsCheckbox = document.getElementById('terms');
    const registerBtn = document.getElementById('registerBtn');
    const passwordStrength = document.getElementById('passwordStrength');
    const strengthBar = document.getElementById('strengthBar');
    const passwordRequirements = document.getElementById('passwordRequirements');

    // Validate form and enable/disable submit button
    function validateForm() {
        const nameValid = nameInput.value.length >= 2;
        const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        const passwordValid = passwordInput.value.length >= 8;
        const termsAccepted = termsCheckbox.checked;

        registerBtn.disabled = !(nameValid && emailValid && passwordValid && termsAccepted);
    }

    // Name validation
    nameInput.addEventListener('input', function() {
        const check = document.getElementById('nameCheck');
        if (this.value.length >= 2) {
            this.classList.add('valid');
            this.classList.remove('invalid');
            check.textContent = '✅';
            check.classList.add('show');
        } else if (this.value.length > 0) {
            this.classList.add('invalid');
            this.classList.remove('valid');
            check.textContent = '❌';
            check.classList.add('show');
        } else {
            this.classList.remove('valid', 'invalid');
            check.classList.remove('show');
        }
        validateForm();
    });

    // Email validation
    emailInput.addEventListener('input', function() {
        const check = document.getElementById('emailCheck');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(this.value)) {
            this.classList.add('valid');
            this.classList.remove('invalid');
            check.textContent = '✅';
            check.classList.add('show');
        } else if (this.value.length > 0) {
            this.classList.add('invalid');
            this.classList.remove('valid');
            check.textContent = '❌';
            check.classList.add('show');
        } else {
            this.classList.remove('valid', 'invalid');
            check.classList.remove('show');
        }
        validateForm();
    });

    // Password strength checker
    passwordInput.addEventListener('focus', function() {
        passwordRequirements.classList.add('show');
        passwordStrength.classList.add('show');
    });

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;

        // Check requirements
        const hasLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        // Update requirement indicators
        updateRequirement('req-length', hasLength);
        updateRequirement('req-uppercase', hasUppercase);
        updateRequirement('req-number', hasNumber);
        updateRequirement('req-special', hasSpecial);

        // Calculate strength
        if (hasLength) strength++;
        if (hasUppercase) strength++;
        if (hasNumber) strength++;
        if (hasSpecial) strength++;

        // Update strength bar
        strengthBar.className = 'password-strength-bar';
        if (strength <= 1) {
            strengthBar.classList.add('weak');
        } else if (strength <= 3) {
            strengthBar.classList.add('medium');
        } else {
            strengthBar.classList.add('strong');
        }

        validateForm();
    });

    function updateRequirement(id, met) {
        const req = document.getElementById(id);
        const icon = req.querySelector('.requirement-icon');
        if (met) {
            req.classList.add('met');
            icon.textContent = '✓';
        } else {
            req.classList.remove('met');
            icon.textContent = '○';
        }
    }

    function togglePassword() {
        const toggleIcon = document.getElementById('toggleIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = '👁️';
        }
    }

    // Terms checkbox validation
    termsCheckbox.addEventListener('change', validateForm);

    // Add loading state on form submit
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const btn = document.getElementById('registerBtn');
        btn.classList.add('loading');
        btn.textContent = 'Creating Account...';
    });
</script>

<?= $this->endSection() ?>