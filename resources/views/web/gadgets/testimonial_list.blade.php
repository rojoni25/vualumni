<div>
	<div>
		<div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="text-center" style="6px double #c44d2d;">
                <span class="font-bold text-4xl">Testimonials</span>
            </div>
            <div uk-slideshow="autoplay: true; min-height:300; max-height:350; navigation:true; autoplay-interval:2000;">
                <ul class="uk-slideshow-items">
                    @forelse ($testimonials as $testimonial)
                    <li class="my-3">
                        <div class="card border rounded-md p-3 h-full">
                            <div class="flex flex-col items-center">
                                <div class="border rounded-full p-3 m-3">
                                    <img src="{{asset($testimonial->user_avatar)}}" alt="" style="aspect-ratio:1/1; width:100px; object-fit:cover; border-radius:50%;">
                                </div>
                                <div class="testimonial-content">
                                    <div class="testimonial-title text-center">
                                        <span class="text-2xl md:text-3xl"><b>{{$testimonial->user_name}}</b></span><br><span id="designation" class="text-xl md:text-2xl">{{$testimonial->designation}}</span>
                                    </div>
                                    {{-- <div class="testimonial-tagline">
                                        <span><blockquote>{{$testimonial->tagline??''}}</blockquote></span>
                                    </div> --}}
                                    <div class="testimonial-texts mt-5">
                                        {{$testimonial->content}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    @endforelse
                </ul>
                <ul class="uk-slideshow-nav uk-dotnav justify-center"></ul>

            </div>
		</div>
	</div>
</div>
