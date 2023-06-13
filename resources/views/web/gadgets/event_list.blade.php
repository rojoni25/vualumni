<div class="vu-gradient">
	<a href="#notice">
		<div class="show-all-btn">
			<h4 style="color: white; font-weight: 700; text-align: left; "> <i class="fas fa-exclamation-circle"></i>UPCOMING EVENTS</h4>
		</div>
	</a>
</div>

<div>
	<div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
		<div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
			<ul class="notice-slider" id="nt-cr">
                @forelse ($events as $event)
				<li>
					<div class="ticker-body">
                        <div class="flex">
                            <div class="event-image mr-2">
                                <img src="{{asset('storage/images/event/thumbnail/thumb/'.$event->thumbnail)}}" alt="" style="aspect-ratio:16/10; width:100px; object-fit:contain;">
                            </div>
                            <div class="event-content">
                                <div class="event-title">
                                    <span>{{$event->title}}</span>
                                </div>
                                <div class="event-date">
                                    <span>
                                        <i class="fa fa-clock"></i>
                                        <span>{{dateRangeGenerator($event->event_start,$event->event_end)}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
					</div>
				</li>
                @empty
                @endforelse

			</ul>
		</div>
		<div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="#events"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More Events..</a> </div>
	</div>
</div>
