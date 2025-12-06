<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --danger-color: #ef4444;
        --success-color: #10b981;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --bg-light: #f9fafb;
        --input-focus: rgba(79, 70, 229, 0.1);
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .login-container {
        width: 100%;
        max-width: 480px;
        padding: 2rem;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .login-card {
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

    .login-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .login-logo {
        font-size: 4rem;
        margin-bottom: 1rem;
        animation: bounce 1s ease-in-out;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .login-header h2 {
        font-size: 1.875rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 0.5rem 0;
    }

    .login-header p {
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

    .alert-content {
        flex: 1;
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
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group label .icon {
        font-size: 1.1rem;
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
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 4px var(--input-focus);
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
        color: var(--primary-color);
        transform: translateY(-50%) scale(1.1);
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
        width: 1.125rem;
        height: 1.125rem;
        cursor: pointer;
        accent-color: var(--primary-color);
    }

    .remember-me label {
        color: var(--text-secondary);
        cursor: pointer;
        margin: 0;
        font-weight: 500;
    }

    .forgot-password {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .forgot-password:hover {
        color: var(--primary-hover);
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary-color), #6366f1);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .btn-login::before {
        content: "🔐";
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

    .signup-link {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
    }

    .signup-link p {
        color: var(--text-secondary);
        margin: 0 0 0.75rem 0;
        font-size: 0.95rem;
    }

    .btn-signup {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-signup:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }

    .btn-signup::before {
        content: "✨";
        font-size: 1.1rem;
    }

    .security-notice {
        text-align: center;
        margin-top: 1.5rem;
        padding: 0.75rem;
        background: var(--bg-light);
        border-radius: 0.5rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .security-notice::before {
        content: "🔒";
        font-size: 1rem;
    }

    @media (max-width: 640px) {
        .login-container {
            padding: 1rem;
        }

        .login-card {
            padding: 2rem 1.5rem;
        }

        .login-header h2 {
            font-size: 1.5rem;
        }

        .form-options {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
    }

    /* Loading state */
    .btn-login.loading {
        pointer-events: none;
        opacity: 0.7;
    }

    .btn-login.loading::after {
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

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">👋</div>
            <h2>Welcome Back!</h2>
            <p>Please login to your account</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <div class="alert-icon">❌</div>
                <div class="alert-content">
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert" style="background: #d1fae5; border-left-color: var(--success-color); color: #065f46;">
                <div class="alert-icon">✅</div>
                <div class="alert-content">
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <form method="post" action="/loginSubmit" id="loginForm">
            <div class="form-group">
                <label>
                    Email Address
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="you@example.com"
                        required
                        autocomplete="email"
                        autofocus
                    >
                </div>
            </div>

            <div class="form-group">
                <label>
                    Password
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">🔑</span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-control" 
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <span id="toggleIcon">👁️</span>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="/forgot-password" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login" id="loginBtn">
                Login
            </button>
        </form>

        <div class="divider">
            <span>Don't have an account?</span>
        </div>

        <div class="signup-link">
            <p>Join us today and get started!</p>
            <a href="/register" class="btn-signup">Create Account</a>
        </div>

        <div class="security-notice">
            Your data is secured with end-to-end encryption
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = '👁️';
        }
    }

    // Add loading state on form submit
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const btn = document.getElementById('loginBtn');
        btn.classList.add('loading');
        btn.textContent = 'Logging in...';
    });

    // Add enter key support for password toggle
    document.getElementById('password').addEventListener('keydown', function(e) {
        if (e.altKey && e.key === 'v') {
            togglePassword();
        }
    });
</script>

<?= $this->endSection() ?>