@php
    $blogInfo = getBlogInfo();
    $role = Auth::user()->role;
@endphp
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-darks">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/favicon.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <div style="display: flex; justify-content: center; align-items: center">
                    <img src="{{ URL::asset('build/images/favicon.png') }}" alt="" height="32">
                    <p class="m-0 text-body"
                        style="font-size: 14px; color: #333333s; font-weight: 600; padding-left: 6px;">
                        Itci Hutani Manunggal
                    </p>
                </div>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                {{-- dashboard --}}
                <li class="menu-title"><span>Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Overviews</a>
                            </li>
                            @if ($role == USER_ROLE_SUPER)
                                <li class="nav-item">
                                    <a href="/dashboard/analytics" class="nav-link">Analytics</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @if ($role == USER_ROLE_SUPER)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/account">
                            <i class="ri-group-line"></i> <span>Accounts</span>
                        </a>
                    </li>
                @endif
                {{-- end dashboard --}}

                {{-- blog --}}
                <li class="menu-title"><span>Blog</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets">
                        <i class="ri-newspaper-line"></i> <span>Overviews</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBlogPosts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBlogPosts">
                        <i class="ri-article-line"></i> <span>Posts</span>
                        @if ($blogInfo['inReview'] > 0)
                            <span class="badge badge-pill bg-danger">{{ $blogInfo['inReview'] }}</span>
                        @endif
												@if ($role == USER_ROLE_WRITER)
													@if ($blogInfo['rejected'] > 0)
															<span class="badge badge-pill bg-danger">
																{{ $blogInfo['rejected'] }}
															</span>
													@endif
												@endif
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBlogPosts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/blog" class="nav-link">
																		All
                                    @if ($role == USER_ROLE_WRITER)
																			@if ($blogInfo['rejected'] > 0)
																					<span class="badge badge-pill bg-danger">
																						Rejected {{ $blogInfo['rejected'] }}
																					</span>
																			@endif
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/blog/create" class="nav-link">
                                    Create
                                </a>
                            </li>
                            @if ($role == USER_ROLE_SUPER)
                                <li class="nav-item">
                                    <a href="/blog/categories" class="nav-link">
                                        Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/blog/approval" class="nav-link">
                                        Need Approval
                                        @if ($blogInfo['inReview'] > 0)
                                            <span class="badge badge-pill bg-danger">{{ $blogInfo['inReview'] }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/blog/history" class="nav-link">
                                        History
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                {{-- end of blog --}}

                {{-- contents --}}
                @if ($role == USER_ROLE_SUPER)
                    <li class="menu-title"><span>Contents</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/language-content">
                            <i class="ri-translate-2"></i> <span>Language Content</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarContentsImages" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarContentsImages">
                            <i class="ri-landscape-line"></i> <span>Images & Videos</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarContentsImages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/image-video/cover" class="nav-link">Cover</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/image-video/slide" class="nav-link">Slides</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/image-video/certification-logo" class="nav-link">Certification logo</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/image-video/video" class="nav-link">Video</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/contact">
                            <i class="ri-contacts-book-line"></i> <span>Contact</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/certificate">
                            <i class="ri-award-fill"></i> <span>Certificate</span>
                        </a>
                    </li>
                @endif
                {{-- end of contents --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
