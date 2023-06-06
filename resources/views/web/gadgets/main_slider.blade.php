<div class="slider-container" style="background-color: #FFFBFA; box-shadow : 0px 2px 5px rgba(0, 0, 0, 0.75);">
    <div class="slider" style="height:100%;">
        @forelse ($sliders as $slider)
        <div style="height: 56.25vw; max-height: 78vh;">
            <div class="slider-image-container" style="height: 56.25vw; max-height: 78vh;">
                <img class="slider-image" style="height:100%; object-fit:cover;"
                    src="{{asset('storage/images/slider/large/'.$slider->photo)}}">
            </div>
            <div class="slider-caption">
                <span><a href="{{$slider->url}}">{{$slider->title}}</a></span>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
