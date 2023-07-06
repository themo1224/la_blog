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
<form action="/api/add_post" method="POST">
    <!-- Include your input fields for title, content, meta_keywords, etc. -->
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>

    <input type="slug" name="slug" placeholder="slug">
    <input type="meta_title" name="meta_title" placeholder="meta_title">
    <input type="meta_slug" name="meta_slug" placeholder="meta_slug">
    <input type="meta_keyword" name="meta_keyword" placeholder="meta_keyword">


    <button type="submit">Submit</button>
</form>
</body>
</html>
