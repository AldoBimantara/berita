@extends('layouts.app')

@section('container')
    {{-- POST ENTRY START --}}
    <div class="row mb-4">
        <div class="col-sm-6">
            <h2 class="posts-entry-title">Hot Topics</h2>
        </div>
    </div>

    {{-- MAIN ITEMS --}}
    <div class="row g-3">
        <div class="col-md-9">
            @foreach ($news as $data)
                <div class="row g-3 mb-5">
                    <div class="col-md-10">
                        <div class="blog-entry">
                            <div class="w-100 h-100 mb-5">
                                <a href="{{ route('news.details', ['newsId' => $data->id]) }}" class="image-link">
                                    <img src="/images/{{ $data->image }}" alt="{{ $data->name }}" width="100%"
                                        height="250" class="rounded" style="object-fit: cover;">
                                </a>
                            </div>
                            <span class="date">{{ $data->created_at->format('l, j F Y') }}</span>
                            <div class="button-group">
                                @foreach ($data->categories as $category)
                                    <button class="badge bg-primary">{{ $category->name }}</button>
                                @endforeach
                            </div>
                            <h2>
                                <a href="{{ route('news.details', ['newsId' => $data->id]) }}">
                                    {{ $data->name }}
                                </a>
                            </h2>
                            <p>{{ $data->tagline }}</p>
                            <p>
                                <a href="{{ route('news.details', ['newsId' => $data->id]) }}"
                                    class="btn btn-sm btn-outline-primary">Read More
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $news->links('vendor.pagination.bootstrap-4') }}
        </div>

        {{-- SIDE BLOG ITEMS --}}
        <div class="col-md-3">
            <p class="text-dark text-decoration-underline">Continue Reading</p>
            @foreach ($newNews as $data)
                <ul class="list-unstyled blog-entry-sm">
                    <li class="mb-5">
                        <div class="w-100 h-100 mb-5">
                            <a href="{{ route('news.details', ['newsId' => $data->id]) }}" class="image-link">
                                <img src="/images/{{ $data->image }}" alt="{{ $data->name }}" width="100%"
                                    height="150" class="rounded" style="object-fit: cover;">
                            </a>
                        </div>
                        <span class="date">{{ $data->created_at->format('l, j F Y') }}</span>
                        <h3 class="fw-bold text-dark">{{ $data->name }}</h3>
                        <p>{{ $data->tagline }}</p>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
