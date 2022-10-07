<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>È stato pubblicato un nuovo post!</p>

    <h2>{{ $post->title }}</h2>
    <p>Data di pubblicazione: {{ $post->created_at }}</p>
    <address>Autore: {{ $post->user->name }}</address>
</html>