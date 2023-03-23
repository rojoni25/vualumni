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
</style>
@endpush
@section('main')
    <!-- Top Row -->
<div class="row" style="margin:15px 0px 0px;">
	<div class="col-md-9 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
		{{--@include('web.gadgets.main_slider')
		@include('web.gadgets.marquee')--}}
	</div>

	<div class="col-md-3 col-sm-12 col-xs-12">
		{{-- @include('web.gadgets.hot_links') --}}

	</div>
	<!-- /Top Row-->
</div>
@endsection
