<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
</head>
<body>
    <h2>Edit post</h2>

    <form method="POST" action="{{route('posts.update', $post->id)}}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" id="title" value="{{$post->title}}">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" type="text" id="content">{{$post->content}}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>
