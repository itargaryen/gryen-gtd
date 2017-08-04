<ul class="col-md-10 col-md-offset-1">
    @foreach($articles as $article)
        <li class="list-group-item row tar-article-list">
            <div class="col-md-6 t-rtcl-lf">
                <div class="t-rtc-img">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        <img class="lazy"
                             data-original="{{ imageView2($article->cover, ['w' => 600,'h' => 300]) }}"
                             src="" alt="...">
                    </a>
                </div>
            </div>
            <div class="col-md-6 t-rtcl-rt">
                <div class="t-artl-title">
                    <a href="{{ action('ArticlesController@show',[$article->id]) }}">
                        {{ $article->title }}
                    </a>
                    <span class="t-artl-date pull-right">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</span>
                </div>
                <div class="tar-article-extra">
                    <div class="t-rtcl-tag">
                        @foreach($article->tags as $tag)
                            <a class="label label-tag" href="{{ action('ArticlesController@index', ['tag' => $tag]) }}">{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="tar-article-list-decs">{{ $article->description }}</div>
            </div>
        </li>
    @endforeach
</ul>
@if(count($articles) > 1)
<div class="col-md-10 col-md-offset-1 t-rtcl-links">
    {{ $articles->links() }}
</div>
@endif
