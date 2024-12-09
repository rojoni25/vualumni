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
            content: counter(list, upper-alpha) ")";
            /* width: 30px; */
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

            #postContent ol li :before {
                font-size: 13px !important;
                line-height: 30px !important;
                list-style-type: upper-alpha;
                list-style: none;
                counter-increment: withBrackets;
                display: flex;
            }

            #postContent ol li span {
                font-size: 13px !important;
                line-height: 30px !important;
                list-style-type: upper-alpha;
                list-style: none;
                counter-increment: withBrackets;
                display: flex;
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
    <style>
        ol,
        ol li {
            list-style-type: unset;
        }

        .well {
            padding: 30px;
        }
    </style>
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
