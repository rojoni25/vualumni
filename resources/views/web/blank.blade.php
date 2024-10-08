@extends('web.layouts.app')
@push('css')
    <style type="text/css">
        .btn-success {
            background-color: #c44d2d;
            border: none;
        }

        .btn-success:hover {
            background-color: #0f0f0f;
            border: none;
        }

        #postTitle {
            background-color: wheat;
            padding: 10px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        #postTitle h2 {
            font-size: 16px;
            line-height: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        #postContent p {
            font-size: 16px;
        }

        #postContent ol li:before {
            counter-increment: list;
            content: counter(list, upper-alpha) " ) ";
            width: 30px;
            text-align: right;
            margin-right: 10px;
        }

        #postContent ol li {
            font-size: 16px;
            line-height: 35px;
            list-style-type: upper-alpha;
            list-style: none;
            counter-increment: withBrackets;
            display: flex;
        }

        #postContent {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            height: 50vh;
            font-size: 50px;
            color: #c44d2d;
        }
    </style>
    @if (Agent::isMobile())
        <style>
            #postContent ol {
                font-size: 12px !important;
                margin-left: 10px;
                list-style: none;
                list-style-type: upper-alpha;
                counter-reset: list;

            }
        </style>
    @else
        <style>
            #postContent ol {
                font-size: 16px;
                margin-left: 15px;
                text-align: justify;
                list-style: none;
                list-style-type: upper-alpha;
                counter-reset: list;

            }
        </style>
    @endif
@endpush
@section('main')
    <div class="container">
        {{-- <div id="postTitle">
            <h2>{{ $post->title }}</h2>
        </div> --}}
        <div id="postContent">
            {{ 'Data Will Be Available Soon' }}
        </div>
    </div>
@endsection
