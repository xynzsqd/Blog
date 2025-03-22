<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>publish post</title>
</head>
<body>
    <h2>Publish new post</h2>

    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" id="title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" type="text" id="content"></textarea>
        </div>
        <button type="submit">Publish</button>
    </form>
</body>
</html>
