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

    .slider-container{
    background-color: #FFFBFA;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.75);
    height: 56.25vw;
    max-height: 78vh;
    margin-bottom: unset !important;
    }
    .slider{
        height: 100%;
    }
    .slick-slider{
        height: 100%;
    }

    .slider-caption{
        z-index: 444;
    }
</style>
@endpush
@section('main')
<div class="row">
	<div style="margin-bottom: 10px;">
		@include('web.gadgets.main_slider')
		@include('web.gadgets.marquee')
	</div>
</div>
<div class="container mx-auto" style="max-width: 1280px;">
    <div class="grid md:grid-cols-2 gap-4">
        <div class="w-full" style="margin-bottom: 10px;">
            @include('web.gadgets.notice_list')
        </div>
        <div class="w-full" style="margin-bottom: 10px;">
            @include('web.gadgets.event_list')
        </div>
    </div>
</div>
<div class="container mx-auto" style="max-width: 1280px;">
    <div class="w-full">
        <div class="w-full" style="margin-bottom: 10px;">
            @include('web.gadgets.testimonial_list')
        </div>
    </div>
</div>
@endsection
