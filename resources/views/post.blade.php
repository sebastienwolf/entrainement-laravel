<!DOCTYPE html>

<title>my blog</title>
<link rel="stylesheet" href="/css/app.css">

<body>
    <article>
    <h1><?= $post->title; ?></h1>
    <div>
    <?= $post->body; ?>
    </div>
    <a href="/"> go back</a>

</body>