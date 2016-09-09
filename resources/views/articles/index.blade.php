<!DOCTYPE html>
<html>
  <head>
    <title>Articles</title>
  </head>
  <body>
    <h1>All Articles</h1>
    @foreach ($articles as $article)
    <ul>
      <li>{{ $article->id }}</li>
      <li>Title: {{ $article->title }}</li>
      <li>Text: {{ substr($article->content, 0, 100)}} ...</li>
      <li>Author: {{ $article->author }}</li>
    </ul>
    @endforeach
  </body>
</html>
