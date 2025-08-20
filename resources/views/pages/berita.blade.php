{{-- resources/views/pages/berita.blade.php --}}
@extends('layouts.app')
@section('title', 'Berita - Itci Hutani Manunggal')
@section('body_class', 'berita-page')

@push('styles')
    <style>
        .sidebar-sticky {
            position: sticky;
            top: 90px
        }

        .post-meta {
            font-size: .9rem;
            opacity: .8
        }

        .post-title {
            margin: .25rem 0 .5rem;
            line-height: 1.25
        }

        .post-image img {
            width: 100%;
            height: auto;
            border-radius: .5rem;
            object-fit: cover
        }

        @media (min-width:992px) {
            .post-image img {
                max-height: 420px
            }
        }
    </style>
@endpush

@section('content')
    <main class="main">
        {{-- Page Title --}}
        <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
            <div class="container position-relative">
                <h1>Berita</h1>
                <p>Update informasi dan kegiatan terbaru ITCI Hutani Manunggal.</p>
            </div>
        </div>

        <section id="blog" class="blog section">
            <div class="container">
                <div class="row gy-4">
                    {{-- List Posts (placeholder-friendly) --}}
                    <div class="col-lg-8">
                        @foreach ($b as $post)
                            <article class="mb-5 pb-4 border-bottom shadow-sm rounded-3 bg-white">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-5">
                                        <a href="{{ route('pages.berita-detail', ['id' => $post->id]) }}">
                                            <img src="{{ asset($post->cover) }}" alt="cover"
                                                class="img-fluid rounded-3 w-100"
                                                style="object-fit:cover; min-height:180px; max-height:260px;">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="p-3">
                                            <a href="{{ route('pages.berita-detail', ['id' => $post->id]) }}"
                                               class="mb-1 d-block text-dark fw-bold"
                                               style="font-size:1.2rem; line-height:1.2; text-decoration:none;">
                                                {{ $post->title_id }}
                                            </a>
                                            <div class="mb-3" style="font-size:1.1rem; font-weight:bold; color:#444;">
                                                {{ $post->slug_id }}</div>
                                            <p class="mb-0 text-muted"
                                                style="display: flex; flex-wrap: wrap; align-items: center;">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($post->content_id), 150) }}
                                                <a href="{{ route('pages.berita-detail', ['id' => $post->id]) }}" class="text-primary text-decoration-underline mt-2 d-inline-block">Baca Selengkapnya</a>
                                            </p>
                                            <div class="post-meta mb-2 small text-muted mt-3">
                                                <div class="post-meta mb-2 small text-muted">
                                                    <span class="me-3"><i class="bi bi-calendar-event"></i>
                                                        {{ $post->created_at->format('d M Y') }}</span>
                                                    <span class="me-3"><i class="bi bi-person"></i> Admin</span>
                                                    <span class="me-3"><i class="bi bi-person"></i> Kategori</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </article>
                        @endforeach
                        {{-- Pagination placeholder --}}
                        <div class="mt-4">
                            {{-- Integrate with real pagination when using controller --}}
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div class="col-lg-4">
                        <div class="sidebar sidebar-sticky">
                            <div class="widget mb-4">
                                <h4 class="widget-title">Pencarian</h4>
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q"
                                            value="{{ request('q') }}" placeholder="Cari berita...">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Kategori</h4>
                                <div>
                                    <a href="#" class="badge bg-light text-dark border me-1 mb-1">Perusahaan</a>
                                    <a href="#" class="badge bg-light text-dark border me-1 mb-1">Kegiatan</a>
                                    <a href="#" class="badge bg-light text-dark border me-1 mb-1">CSR</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
