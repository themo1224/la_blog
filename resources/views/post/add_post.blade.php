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
<form action="/api/add_post" method="POST" enctype="multipart/form-data">
    <!-- Include your input fields for title, content, meta_keywords, etc. -->
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>

    <input type="text" name="slug" placeholder="slug">
    <input type="text" name="meta_title" placeholder="meta_title">
    <input type="number" name="view" placeholder="view">
    <input type="text" name="meta_desc" placeholder="meta_desc">
    <input type="file" name="image[]" id="image" multiple>

    <input type="number" name="user_id" placeholder="user_id">
    <select name=" []" id="" multiple>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->id . '. ' . $category->title}}</option>
        @endforeach
    </select>
    <input type="text" name="meta_keyword" placeholder="meta_keyword">


    <button type="submit">Submit</button>
</form>
</body>
</html>
