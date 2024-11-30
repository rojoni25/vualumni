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

            .news-title{

            }
            .title-text{
                font-size: 35px;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .date-time{
                color: #c44d2d;
            }
            .feature-image{
                margin-bottom:25px;
            }
            .feature-image img{
                width: 100%;

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
        <div class="row">
            <div class="col-md-9">
                <div class="news-title">
                    <span class="title-text">{{$news->title}}</span>
                    <p class="date-time">Published: {{$news->news_date->format('l, d F Y')}}</p>
                </div>
                <div class="news-content">
                    <div class="feature-image">
                        <img src="{{ asset('storage/images/news/large/' . $news->thumbnail) }}" alt="">
                    </div>

                    <div class="news-text">
                        @php
                            echo $news->content;
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
