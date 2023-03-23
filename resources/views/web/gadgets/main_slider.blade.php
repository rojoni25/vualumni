<div class="slider-container" style="background-color: #FFFBFA; box-shadow : 0px 2px 5px rgba(0, 0, 0, 0.75);">
    <div class="slider">
        @foreach ($sliders as $slider)
            <div>
                <div class="slider-image-container">
                    <img class="slider-image" style="object-fit:cover;" src="{{ $slider->image_url }}">
                </div>
                <div class="slider-caption">
                    <span>
                        <a href="{{ $slider->content_url }}">{{ $slider->title }}</a>
                    </span>
                </div>
                <a style="color: white; font-size:18px;" href="https://vu.edu.bd/admission/online-application">
                    <div class="slider-caption apply_btn">
                        <span>Apply Now</span>
                    </div>
                </a>
            </div>
        @endforeach

        ?>
    </div>


</div>
