<p class="l-gnav__trigger"></p>
<div class="l-gnav-sub-wrapper">
    <div class="l-gnav-sub-inner">
        {{-- <div class="l-gnav-sub__form-box">
					<div class="l-gnav-sub__form-box-inner">
						<form method="get" action="<?= base_url() ?>search/all" name="searchHeadSpMenu"
							id="myFormSpMenu">
							<input type="text" class="l-gnav-sub__form" name="q" id="wordSpMenu" value=""
								title="Search">
							<button type="submit" class="l-gnav-sub__form-button" name="Submit" value=""
								onClick="document.searchHeadSpMenu.action='<?= base_url() ?>search/all'">Search</button>
						</form>
					</div>
				</div> --}}
        <div class="text-center" style="margin:auto; background-color:white; width: 100%; padding: 5px 0px;">
            {{-- <span class=""><a href="<?= base_url() ?>notice/details/1983" target="_blank"><img
								style="border: 1px solid; padding: 7px; border-radius: 5px;"
								src="https://vu.edu.bd/uploads/media/images/payment-inspng2.png"
								alt="Open a new window"></a></span> --}}
        </div>
        <nav class="l-gnav-sub">
            <ul class="l-gnav-sub__list">
                <li class="l-gnav-sub__item dropdown"><a href="#" class="dropdown-toggle"
                        data-toggle="dropdown">About <i class="ml-2 fa fa-caret-right"></i></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-items"><a
                                href="{{ route('web.post.show-post', ['aims-and-objectives']) }}"><i
                                    class="fa fa-caret-right"></i> Aims & Objectives</a></li>
                    </ul>
                </li>
                <li class="l-gnav-sub__item dropdown"><a href="#" class="dropdown-toggle"
                        data-toggle="dropdown">Alumni Association <i class="ml-2 fa fa-caret-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('committee.index') }}"><i class="fa fa-caret-right"></i>
                                Executive Committee</a></li>
                        <li class="dropdown-items"><a href="{{ route('association-members.index') }}"><i
                                    class="fa fa-caret-right"></i> Members</a></li>
                        <li class="dropdown-items"><a href="{{ route('membership-information') }}"><i
                                    class="fa fa-caret-right"></i> Membership Information</a></li>
                        <li class="dropdown-items"><a href="{{ route('aavu.register') }}"><i
                                    class="fa fa-caret-right"></i>
                                Become a Proud VUian</a></li>
                    </ul>
                </li>
                <li class="l-gnav-sub__item dropdown"><a href="#" class="dropdown-toggle"
                        data-toggle="dropdown">Achievements <i class="ml-2 fa fa-caret-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="$"><i class="fa fa-caret-right"></i> National</a></li>
                        <li><a href="https://vu.edu.bd/academics/departments"><i class="fa fa-caret-right"></i>
                                International <i class="ml-2 fa fa-caret-right"></i></a></li>
                    </ul>
                </li>
                <li class="l-gnav-sub__item dropdown"><a href="#" class="dropdown-toggle"
                        data-toggle="dropdown">News & Events <i class="ml-2 fa fa-caret-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-caret-right"></i> Upcoming Events</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i> Recent Events</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i> News</a></li>
                    </ul>
                </li>
                <li class="l-gnav-sub__item dropdown">
                    <a href="https://convocation.vu.edu.bd">Convocation</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
