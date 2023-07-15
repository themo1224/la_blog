<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach($posts as $post)
        <h5>{{$post->title}}</h5>
        <h5>{{$post->slug}}</h5>
        <a href="{{route('post_detail')}}">
            <img src="{{ asset('storage/images/' . $post->default->title) }}" style="width: 250px" alt="">
        </a>

    @endforeach

</body>
</html>
