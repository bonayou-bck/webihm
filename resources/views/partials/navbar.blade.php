<div class="main-header">
    <div class="main-header-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/admin/img/kaiadmin/logo_light.png') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
        </div>
    </div>

    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1"><i
                                class="fa fa-search search-icon"></i></button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control" />
                </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ Auth::user() && Auth::user()->avatar
                                ? asset('images/' . Auth::user()->avatar)
                                : asset('assets/admin/img/profile.jpg') }}"
                                alt="..." class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username" style="cursor:pointer;">
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="{{ Auth::user() && Auth::user()->avatar
                                            ? asset('images/' . Auth::user()->avatar)
                                            : asset('assets/admin/img/profile.jpg') }}"
                                            alt="image profile" class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user() ? Auth::user()->name : 'Guest' }}</h4>
                                        <p class="text-muted">{{ Auth::user() ? Auth::user()->email : '' }}</p>
                                        <a href="#" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Account Setting</a></li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                            <!-- di dalam dropdown -->
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#logoutModal">Logout</a>


                            <form id="logout-form-admin" action="{{ route('logout') }}" method="POST"
                                style="display:none;">
                                @csrf
                            </form>
                            {{-- modal-triggered logout form (fallback for modal confirm) --}}
                            <form id="logout-form-modal" action="{{ route('logout') }}" method="POST"
                                style="display:none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg overflow-hidden">
            <style>
                .logout-avatar {
                    width: 72px;
                    height: 72px;
                    object-fit: cover;
                    border-radius: 50%;
                    border: 4px solid #fff;
                    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
                }

                .logout-header {
                    background: linear-gradient(90deg, #ff7a7a, #ff5252);
                    height: 110px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .logout-card {
                    margin-top: -36px;
                }
            </style>

            <div class="logout-header">
                <i class="fa fa-sign-out fa-2x text-white" aria-hidden="true"></i>
            </div>

            <div class="modal-body text-center bg-white logout-card">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ Auth::user() && Auth::user()->avatar ? asset('images/' . Auth::user()->avatar) : asset('assets/admin/img/profile.jpg') }}"
                        alt="avatar" class="logout-avatar mb-3">
                    <h5 class="mb-1">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</h5>
                    <p class="text-muted small">You're about to sign out. Any unsaved changes will be lost.</p>
                </div>

                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirm-logout" class="btn btn-danger px-4">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Jika kamu membuka modal via klik nama user:
            document.querySelectorAll('.profile-username').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Tutup dropdown jika masih terbuka
                    const dropdown = el.closest('.dropdown');
                    if (dropdown) {
                        const toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
                        if (toggle) {
                            const dd = bootstrap.Dropdown.getInstance(toggle) || new bootstrap
                                .Dropdown(toggle);
                            dd.hide();
                        }
                    }

                    // Tampilkan modal logout
                    const logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                    logoutModal.show();
                });
            });

            // Konfirmasi logout
            const confirmBtn = document.getElementById('confirm-logout');
            if (confirmBtn) {
                confirmBtn.addEventListener('click', function() {
                    document.getElementById('logout-form-modal').submit();
                });
            }

            // --- Cleanup penting untuk cegah "freeze" setelah Cancel ---
            const modalEl = document.getElementById('logoutModal');
            if (modalEl) {
                modalEl.addEventListener('hidden.bs.modal', function() {
                    // Kadang body masih terkunci scroll
                    document.body.classList.remove('modal-open');
                    document.body.style.removeProperty('padding-right');

                    // Hapus backdrop yang tersisa (kalau ada duplikat)
                    document.querySelectorAll('.modal-backdrop').forEach(function(bd) {
                        bd.remove();
                    });

                    // Optional: tutup dropdown kalau belum tertutup
                    const toggle = document.querySelector('.dropdown-toggle.profile-pic');
                    if (toggle) {
                        const dd = bootstrap.Dropdown.getInstance(toggle);
                        if (dd) dd.hide();
                    }
                });
            }
        });
    </script>
@endpush
