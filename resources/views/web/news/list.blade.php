@extends('web.layouts.app')
@push('css')
    <style>
        .news-after-header {
            display: flex;
        }

        .day-date {
            background-color: #c44d2d;
            color: white;
            width: 215px;
            padding: 0px 10px;
            font-weight: 600;
            line-height: 40px;
        }

        .update-scroller {
            background-color: wheat;
            padding: 5px;
            width: -webkit-fill-available;
        }

        .image-cantainer:hover {
            box-shadow: 1px 1px 10px 1px #c44d2d;
            transition: 0.5s;
        }
    </style>

    @if (!Agent::isMobile())
        <style>
            .first-news {
                /* background-color: wheat; */
                margin-bottom: 10px;
            }

            .image-cantainer {
                width: 100%;
                transition: 0.5s;
            }

            .full-width-image {
                width: 100%;
                aspect-ratio: 4/3;
                object-fit: cover;
            }

            .caption-title {
                position: absolute;
                bottom: 0%;
                background: linear-gradient(0deg, #000000d9, #00000091);
                color: white;
                width: 100%;
                line-height: 40px;
                padding-left: 20px;
                font-weight: 600;
            }

            .caption-text{
                font-size: 20px;
            }
            .caption-date{
                font-size: 14px;
            }

            .inner-image {
                position: relative;
            }
        </style>
    @endif
@endpush

@section('main')
    <div class="news-after-header">
        <div class="day-date pl-10 highlight"><time>{{ date('l, d M y') }}</time></div>
        <div class="update-scroller">

        </div>
    </div>
    <div class="container">
        <div class="row mt-10">
            <div class="col-md-8 p-5">
                <div class="widget-card">
                    {{-- <div class="card-header">
                        News
                    </div> --}}
                    <div class="row">
                        @foreach ($newses as $news)
                            @if ($loop->iteration == 1)
                                <div class="col-md-8 first-news">
                                    <a href="{{ route('web.news.show', [$news, $news->slug]) }}">
                                        <div class="image-cantainer">
                                            <div class="inner-image">
                                                <img class="full-width-image"
                                                    src="{{ asset('storage/images/news/large/' . $news->thumbnail) }}"
                                                    alt="">
                                                <div class="caption-title">
                                                    <span class="caption-text">{{ $news->title }}</span>
                                                    <p class="caption-date">{{ $news->news_date->format('l, d F Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-4 common-news">

                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div class="widget-card"></div>
            </div>
        </div>
    </div>
@endsection
