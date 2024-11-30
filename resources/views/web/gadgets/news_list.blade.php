<div class="text-center" style="6px double #c44d2d;">
    <span class="font-bold text-4xl">News</span>
</div>
<div class="row flex justify-center" style="margin:15px -15px 0px 0px; box-shadow:#c44d2d">
    @foreach ($newses as $news)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="vu-news-event">
                <a href="{{route('web.news.show',[$news->id,$news->slug])}}">
                    <div class="vu-news-event-image">
                        <div class="img"><img
                                src="{{ asset('storage/images/news/mobile/' . $news->thumbnail) }}"
                                style="height:unset; aspect-ratio:16/10;">
                        </div>
                        <div style="height:2px; background-color: red;"></div>
                    </div>
                    <div class="vu-news-event-title" style="font-size:13px;">
                        {{$news->title}}
                    </div>
                    <div class="vu-news-footer"
                        style="text-align: left !important; padding-bottom: 10px; padding-top: 10px;">
                        <i class='far fa-calendar-alt' style='font-size:15px;color:#c44d2d'></i>
                        <time style="font-size: 12px;">
                            {{$news->news_date->format('F d, Y')}}
                        </time>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
</div>
