<div class="card">
    <div class="card-body">
        <h6 class="card-subtitle mb-2">
            <a href="#" class="text-muted text-decoration-none">Author: {{ $post->user->name }}</a>
        </h6>
        <div class="mb-2">
            <a href="#" class="text-decoration-none text-black">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
            </a>
        </div>
        <div>
            <span class="fw-medium text-muted">Categories:</span>
            @forelse ($post->categories as $category)
            <a href="#" class="card-link"><span>{{ $category->name }}</span></a>
            @empty
            <span>none</span>
            @endforelse
        </div>
    </div>
</div>
