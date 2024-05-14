@extends('layouts.app')

@section('container')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('/images/{{ $news->image }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $news->name }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <span class="d-inline-block mt-1">By Rinaldo Bimantara</span>
                            <span>&nbsp;-&nbsp; {{ $news->created_at->format('M. dS, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="post-content-body">
                        {{-- TAGS --}}
                        <div class="sidebar-box">
                            <h3 class="heading">Tags</h3>
                            @foreach ($news->categories as $category)
                                <p class="badge bg-primary p-2">{{ $category->name }}</p>
                            @endforeach
                        </div>
                        <p>{{ $news->tagline }}. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate a
                            explicabo
                            reprehenderit tempora qui minus. Earum culpa sit asperiores id rerum vel nemo necessitatibus
                            enim! A nulla voluptas asperiores.</p>
                        {{-- IMAGES --}}
                        <div class="row my-4">
                            <div class="col-md-12 mb-4">
                                <img src="/images/{{ $news->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="/images/{{ $news->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6 mb-4">
                                <img src="/images/{{ $news->image }}" alt="Image placeholder" class="img-fluid rounded">
                            </div>
                        </div>
                        <p>{{ $news->description }}. Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
                            cupiditate a explicabo
                            reprehenderit tempora qui minus. Earum culpa sit asperiores id rerum vel nemo necessitatibus
                            enim! A nulla voluptas asperiores. . Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Optio cupiditate a explicabo
                            reprehenderit tempora qui minus. Earum culpa sit asperiores id rerum vel nemo necessitatibus
                            enim! A nulla voluptas asperiores. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Optio cupiditate a explicabo
                            reprehenderit tempora qui minus. Earum culpa sit asperiores id rerum vel nemo necessitatibus
                            enim! A nulla voluptas asperiores.</p>
                    </div>
                    <!-- END main-content -->
                </div>
            </div>
    </section>
@endsection
