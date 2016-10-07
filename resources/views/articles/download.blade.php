<html>
    <head>
        <title>Article</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>article</title>

        <style>
        body {background-color: powderblue;}
        .article-content
        {
            margin: 10px;
            word-wrap: break-word;
            white-space: pre-wrap;
            overflow: hidden;
        }
        </style>
    </head>
    <body>
    <div class="article-content">
		<h1>{{ $article->title }} <span class="article-id">#{{ $article->id }}</span></h1>
		<h3 class="article-author">{{ $article->author->name }}</h3>
		@if ($article->image_path != "")
			<img src="{{getcwd()}}/{{$article->image_path}}" />
		@endif
		<div class="article-content">{{ $article->content }}</div>
	</div>
    </body>
</html> 
	
