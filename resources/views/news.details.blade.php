@extends('layouts.main')

@section('container')
    {{-- <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('/images/{{ $post->image }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $post->title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <span class="d-inline-block mt-1">By Rinaldo Bimantara</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M. dS, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <section class="section">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="post-content-body">
                        {{-- TAGS --}}
                        {{-- <div class="sidebar-box">
                            <h3 class="heading">Tags</h3>
                            @foreach ($post->categories as $category)
                                <a href="{{ route('category.show', ['name' => $category->name]) }}"
                                    class="badge bg-dark text-light">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div> --}}
                        {{-- BODY --}}
    
                        {{-- IMAGES --}}
                        {{-- <div class="row my-4">
                            <div class="col-md-12 mb-4">
                                <img src="/images/{{ $post->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="/images/{{ $post->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="/images/{{ $post->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                        </div>
                        <p>{{ $post->body }}</p> --}}
                    </div>
                    {{-- CATEGORIES --}}
                    <div class="pt-5">
                        {{-- @foreach ($categories as $category)
                            <a href="{{ route('category.show', ['name' => $category->name]) }}"
                                class="text-decoration-none btn fw-bold text-light badge bg-secondary me-1 mb-2">
                                {{ $category->name }}
                            </a>
                        @endforeach --}}
                    </div>
                    <!-- END main-content -->
                </div>
            </div>
    </section>
@endsection
