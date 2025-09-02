{{-- resources/views/pages/berita-detail.blade.php --}}
@extends('layouts.app')
@section('title', 'Berita Detail - Itci Hutani Manunggal')
@section('body_class', 'berita-detail-page')

@section('content')
    <main class="main">
        {{-- Page Title --}}
        <div class="page-title dark-background" style="background-image:url('{{ asset('assets/img/bg/bg-14.JPG') }}');">
            <div class="container position-relative">
                <h1>Berita</h1>
                <p>Kumpulan informasi dan kabar terbaru dari PT Itci Hutani Manunggal.</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li class="current">{{ $post->title_id ?? ($post->title ?? '-') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="blog section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-9">
                        {{-- Content --}}
                        <article>
                            <div class="mb-3">
                                <img class="img-fluid rounded"
                                    src="{{ asset($post->cover ?? 'assets/img/placeholders/cover-16x9.jpg') }}"
                                    alt="cover" style="width:900px; height:400px; object-fit:cover;">
                            </div>
                            <h2 class="h3">{{ $post->title_id ?? ($post->title ?? '-') }}</h2>
                            <div class="post-meta mb-3 text-muted">
                                <span class="me-2"><i class="bi bi-person"></i> Admin</span>
                                <span class="me-2"><i class="bi bi-calendar-event"></i>
                                    {{ $post->created_at ? $post->created_at->format('d M Y') : '-' }}</span>
                                <span>
                                    @if (!empty($post->kategori))
                                        <a href="#" class="badge bg-light text-dark border">{{ $post->kategori }}</a>
                                    @endif
                                </span>
                            </div>
                            <div class="content prose-email">
                                {!! $post->content_id ?? ($post->content ?? '-') !!}
                            </div>
                        </article>

                        {{-- Share --}}
                        <div class="mt-4 d-flex align-items-center">
                            <div class="me-3">Bagikan:</div>
                            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"><i
                                    class="bi bi-facebook"></i></a>
                            <a class="btn btn-sm btn-outline-secondary me-2" target="_blank"
                                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Judul Berita') }}"><i
                                    class="bi bi-twitter-x"></i></a>
                            <a class="btn btn-sm btn-outline-secondary" target="_blank"
                                href="https://api.whatsapp.com/send?text={{ urlencode('Judul Berita - ' . request()->fullUrl()) }}"><i
                                    class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div class="col-lg-3">
                        <div class="sidebar sidebar-sticky">
                            <div class="widget mb-4">
                                <h4 class="widget-title">Terbaru</h4>
                                <ul class="list-unstyled mb-0">
                                    @foreach ($terbaru as $item)
                                        <li class="mb-2">
                                            <a class="text-decoration-none"
                                                href="{{ route('pages.berita-detail', ['id' => $item->id]) }}">
                                                {{ $item->title_id ?? $item->title }}
                                            </a>
                                            <div class="small text-muted">{{ $item->created_at->format('d M Y') }}</div>
                                        </li>
                                    @endforeach
                                </ul>
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

@push('styles')
<style>
/* Tipografi ala email: rapi dan mudah dibaca */
.prose-email { color:#243143; line-height:1.7; font-size:1rem; }
.prose-email p { margin: 0 0 .9rem; }
.prose-email h1,.prose-email h2,.prose-email h3,.prose-email h4,.prose-email h5,.prose-email h6{ margin:1.2rem 0 .6rem; font-weight:700; }
.prose-email ul,.prose-email ol{ margin:.4rem 0 1rem; padding-left:1.25rem; }
.prose-email li+li{ margin-top:.35rem; }
.prose-email blockquote{ margin:1rem 0; padding:.6rem 1rem; border-left:4px solid #d0d7de; background:#f8fafc; color:#475569; border-radius:6px; }
.prose-email img{ max-width:100%; height:auto; border-radius:8px; }
.prose-email a{ color:#0d6efd; text-decoration:underline; }
.prose-email table{ width:100%; border-collapse:collapse; margin:1rem 0; }
.prose-email th,.prose-email td{ border:1px solid #e5e7eb; padding:.5rem .75rem; }
</style>
@endpush
