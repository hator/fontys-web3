<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                font-family: "Times New Roman", serif;
                height: 100%;
            }
            .header {
                float: left;
                width: 50%;
            }
            .image {
                margin-left: 50%;
                width: 50%;
                text-align: right;
            }
            .article-author {
                font-size: normal;
                color: #555;
            }
            .clearfix {
                clear: both;
                width: 100%
            }
            .article-content {
                padding-top: 2em;
                text-align: justify;
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>{{ $article->title }} <span class="article-id">#{{ $article->id }}</span></h1>
            <h3 class="article-author">{{ $article->author->name }}</h3>
        </div>
        @if ($article->image_path != "")
            <div class="article-image">
                <img src="{{getcwd()}}/{{$article->image_path}}" />
            </div>
        @endif
        <div class="clearfix"></div>
        <p class="article-content">{!! nl2br(e($article->content)) !!}</p>
    </body>
</html>

