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
        }

        #postTitle h2 {
            font-size: 16px;
            line-height: 20px;
            font-weight: 700;
        }

        #postContent p {
            font-size: 16px;
        }

        #postContent ol li:before {
            counter-increment: list;
            content: counter(list, lower-alpha) " ) ";
            width: 30px;
            text-align: right;
            margin-right: 10px;
        }

        #postContent ol li {
            font-size: 16px;
            line-height: 25px;
            list-style-type: lower-alpha;
            list-style: none;
            counter-increment: withBrackets;
            display: flex;
        }
    </style>
    @if (Agent::isMobile())
    <style>
        #postContent ol {
            font-size: 12px;
            margin-left: 10px;
            list-style: none;
            list-style-type: lower-alpha;
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
            list-style-type: lower-alpha;
            counter-reset: list;

        }
        </style>
    @endif
@endpush
@section('main')
    <div class="container">
        <div id="postTitle">
            <h2>{{ $post->title }}</h2>
        </div>
        <div id="postContent">
            <?php echo $post->content; ?>
        </div>
    </div>
@endsection
