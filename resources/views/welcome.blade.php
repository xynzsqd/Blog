@extends('layouts.app')

{{-- page title --}}
@section('title', 'Home')

@section('main')
    <div class="container">
        <h2 class="text-center text-uppercase fw-bold mb-5">Recent posts</h2>
        <div class="row mb-3">
            @foreach ($posts as $post)
                <div class="col-12 col-md-6 mb-3">
                    <x-posts.post-card :post="$post"></x-posts.post-card>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="#" class="link-dark text-center fw-medium ">View all</a>
        </div>
    </div>

@endsection
