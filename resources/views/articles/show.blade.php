<!DOCTYPE html>
<html>
  <head>
    <title>Article {{ $article->id }}</title>
  </head>
  <body>
    <h1>Article {{ $article->id }}</h1>
    <ul>
      <li>Title: {{ $article->title }}</li>
      <li>Text: {{ $article->content }}</li>
      <li>Author: {{ $article->author }}</li>
    </ul>
  </body>
</html>
