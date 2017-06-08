<section class="container-fluid t-index-photo">
    <header class="text-center t-index-plttl">
        <div class="t-index-secttl t-index-secttl-red"><a href="{{ action('ArticlesController@index', ['tag' => '摄影']) }}">摄影</a></div>
    </header>
    <section class="row">
        @foreach($photos as $photo)
            <div class="col-md-4 col-xs-6 no-padding t-index-pht">
                <a href="{{ action('ArticlesController@show', ['id' => $photo->id]) }}">
                    <img class="lazy"
                         data-original="{{ imageView2($photo->cover, ['w' => 350, 'h' => 233]) }}"
                         src=""
                         alt="{{ $photo->title }}">
                </a>
            </div>
        @endforeach
    </section>
</section>