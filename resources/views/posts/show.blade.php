<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>

<body>
    <span>author: {{ $post->user->name }}</span>
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
</body>

</html>
