<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>

<body>
    <h2>Posts</h2>
    @if ($posts->isEmpty())
        <p>There's no posts yet.</p>
    @else
        <ol>
            @foreach ($posts as $post)
                <li>
                    <span>author: {{ $post->user->name }}</span>
                    <h3><a href={{ route('posts.show', $post->id) }}>{{ $post->title }}</a></h3>
                    <p>{{ $post->content }}</p>
                    <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </li>
            @endforeach
        </ol>
    @endif

</body>

</html>
