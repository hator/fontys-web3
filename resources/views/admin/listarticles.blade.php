@foreach ($articles as $article)
  <div class="article">
    <h3 class="title">{{ $article->title }}</h3> {{ substr($article->content, 0, 100) }}&hellip;
    <p class="article-link">{{ link_to_route('articles.show', 'Read more &raquo;', array($article->id)) }}</p>
    <a href="/articles/{{$article->id}}/edit" class="btn btn-info" role="button">Edit</a>
  </div>
@endforeach