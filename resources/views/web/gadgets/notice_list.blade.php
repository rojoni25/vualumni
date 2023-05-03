<div class="vu-gradient">
	<a href="#notice">
		<div class="show-all-btn">
			<h4 style="color: white; font-weight: 700; text-align: left; "> <i class="fas fa-exclamation-circle"></i> NOTICE</h4>
		</div>
	</a>
</div>

<div>
	<div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
		<div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
			<ul class="notice-slider" id="nt-cr">
                @forelse ($notices as $notice)
				<li>
					<div class="ticker-body">
                        <i class="fa fa-file"></i><a href="#">{{$notice->title}} - {{$notice->created_at->format('d/m/Y')}}</span></a>
					</div>
				</li>
                @empty
                @endforelse
			</ul>
		</div>
		<div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="#notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
	</div>
</div>
