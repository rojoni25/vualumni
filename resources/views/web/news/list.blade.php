@extends('web.layouts.app')
@push('css')
<style>
    .news-after-header{
        background-color: wheat;
        padding: 5px;
    }
</style>
@endpush

@section('main')
<div class="news-after-header">
    <div class="ml-5"><time>{{date('l, d M y')}}</time></div>
</div>
    <div class="container">

    </div>
@endsection
