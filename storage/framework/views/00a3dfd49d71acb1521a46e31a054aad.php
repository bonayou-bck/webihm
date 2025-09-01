<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login • IHM System</title>
    <link rel="icon" href="<?php echo e(URL::asset('assets/img/logoIHM.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root {
            --forest-700: #2e7d32;
            --forest-600: #388e3c;
            --forest-500: #43a047;
            --forest-400: #66bb6a;
            --forest-200: #c8e6c9;
            --bark-700: #4e342e;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("<?php echo e(asset('assets/img/bg/bg-14.JPG')); ?>");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            color: #1b1b1b;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        /* Forest header wave with trees silhouette */
        .forest-hero {
            position: relative;
            min-height: 220px;
            background: transparent;
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
            box-shadow: none;
        }

        .forest-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(700px 180px at 50% 0, rgba(255, 255, 255, .15), transparent 60%);
            pointer-events: none;
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
        }

        /* Card */
        .auth-card {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
            overflow: hidden;
        }

        .brand-mini {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            color: #fff;
            text-shadow: 0 2px 6px rgba(0, 0, 0, .25);
        }

        .brand-mini img {
            height: 56px;
        }

        .brand-mini .title {
            font-weight: 700;
            letter-spacing: .3px;
            font-size: 1.05rem;
        }

        .btn-forest {
            --bs-btn-bg: var(--forest-600);
            --bs-btn-border-color: var(--forest-600);
            --bs-btn-hover-bg: var(--forest-700);
            --bs-btn-hover-border-color: var(--forest-700);
            --bs-btn-active-bg: var(--forest-700);
            --bs-btn-active-border-color: var(--forest-700);
            --bs-btn-disabled-bg: var(--forest-400);
            --bs-btn-disabled-border-color: var(--forest-400);
            color: #fff;
            transition: all 0.3s ease;
        }

        .link-forest {
            color: var(--forest-600);
            text-decoration: none;
        }

        .link-forest:hover {
            color: var(--forest-700);
            text-decoration: underline;
        }

        .form-label {
            font-weight: 600;
            color: #fff;
        }

        .form-check-label {
            color: #fff;
        }

        .is-invalid+.invalid-feedback {
            display: block;
        }

        /* Subtle wood grain for card header strip */
        .wood-.strip {
            height: 6px;
            background: linear-gradient(90deg, #5d4037, #6d4c41, #4e342e);
        }

        /* Footer */
        .site-footer {
            color: #fff;
        }

        .site-footer a {
            color: #9fe6b6;
            text-decoration: none;
        }

        .site-footer a:hover {
            text-decoration: underline;
        }

        /* Small leaf bullets */
        .leaf-bullet::before {
            content: "\f1bb";
            /* ri-leaf-fill */
            font-family: 'remixicon';
            margin-right: .5rem;
            color: #a5d6a7;
        }

        /* Responsive tweaks */
        @media (max-width: 576px) {
            .forest-hero {
                min-height: 180px;
            }
        }
    </style>
</head>

<body>
    <header class="forest-hero d-flex align-items-end">
        <div class="container pb-4">
            <div class="brand-mini">
                <img src="<?php echo e(URL::asset('assets/img/logoIHM.png')); ?>" alt="IHM">
                <h1>Itci Hutani Manunggal</h1>
            </div>
            
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card auth-card">
                    
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <h4 class="mb-1" style="color: #fff;">Admin Web</h4>
                            <p class="mb-0" style="color: #eee;">Masuk untuk melanjutkan ke sistem Web IHM.</p>
                        </div>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('login')); ?>" method="POST" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email / Username</label>
                                <input type="text" id="email" name="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    
                                    autofocus>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><strong><?php echo e($message); ?></strong></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-2">
                                <label for="password-input" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" id="password-input" name="password"
                                        class="form-control pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <button type="button"
                                        class="btn position-absolute top-0 end-0 h-100 px-3 text-muted"
                                        id="togglePassword" aria-label="Toggle password visibility">
                                        <i class="ri-eye-fill" id="eyeIcon"></i>
                                    </button>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><strong><?php echo e($message); ?></strong></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>
                                
                            </div>

                            <button class="btn btn-forest w-100 py-2" type="submit">
                                <i class="ri-login-circle-line me-1"></i> Sign In
                            </button>
                        </form>

                        <p class="text-center mt-4 mb-0" style="color: #eee;">Don't have an account? <a href="<?php echo e(route('register')); ?>" class="link-forest">Register</a></p>
                    </div>
                </div>

                <p class="text-center mt-4 site-footer small">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> System Development KF
                </p>
            </div>
        </div>
    </main>

    
    <script>
        // Toggle password
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('password-input');
            const btn = document.getElementById('togglePassword');
            const icon = document.getElementById('eyeIcon');
            if (btn && input) {
                btn.addEventListener('click', function() {
                    const isPwd = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPwd ? 'text' : 'password');
                    icon.className = isPwd ? 'ri-eye-off-fill' : 'ri-eye-fill';
                });
            }
        });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH /Users/bona/Downloads/webihm1/resources/views/auth/login.blade.php ENDPATH**/ ?>