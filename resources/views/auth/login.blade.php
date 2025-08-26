<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login • IHM System</title>
    <link rel="icon" href="{{ URL::asset('assets/img/logoIHM.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 + Icons (CDN) --}}
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('assets/img/bg/bg-14.JPG') }}");
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
                <img src="{{ URL::asset('assets/img/logoIHM.png') }}" alt="IHM">
                <h1>Itci Hutani Manunggal</h1>
            </div>
            {{-- <ul class="mt-3 ps-0 list-unstyled d-flex gap-3 small mb-0 text-light">
        <li class="leaf-bullet">Sustainable</li>
        <li class="leaf-bullet">Efficient</li>
        <li class="leaf-bullet">Secure</li>
      </ul> --}}
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card auth-card">
                    {{-- <div class="wood-strip"></div> --}}
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <h4 class="mb-1" style="color: #fff;">Admin Web</h4>
                            <p class="mb-0" style="color: #eee;">Masuk untuk melanjutkan ke sistem Web IHM.</p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email / Username</label>
                                <input type="text" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    {{-- value="{{ old('email', 'admin@mail.com') }}" placeholder="you@company.com" --}}
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="password-input" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" id="password-input" name="password"
                                        class="form-control pe-5 @error('password') is-invalid @enderror">
                                    <button type="button"
                                        class="btn position-absolute top-0 end-0 h-100 px-3 text-muted"
                                        id="togglePassword" aria-label="Toggle password visibility">
                                        <i class="ri-eye-fill" id="eyeIcon"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>
                                {{-- <a href="{{ route('password.request') }}" class="link-forest">Lupa password?</a> --}}
                            </div>

                            <button class="btn btn-forest w-100 py-2" type="submit">
                                <i class="ri-login-circle-line me-1"></i> Sign In
                            </button>
                        </form>

                        <p class="text-center mt-4 mb-0" style="color: #eee;">Don't have an account? <a href="{{ route('register') }}" class="link-forest">Register</a></p>
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

    {{-- Optional: partikel daun halus (kalau punya file JS sendiri, boleh lepas ini) --}}
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

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>