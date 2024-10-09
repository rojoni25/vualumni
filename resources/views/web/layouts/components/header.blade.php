<header class="l-header" style="background-color: #fff;">
    <div class="header-inner">
        <div class="l-header__logo-en" style="display: flex; {{ Agent::isMobile() ? 'width:unset;' : 'width:500px;' }}"
            title="AAVU">
            <a href="{{ url('/') }}" style="display:flex; align-items:center;">
                <img style="object-fit: contain; {{ Agent::isMobile() ? 'width:50px;' : 'width: 100px;' }} height: 95%; margin-right:13px;"
                    src="{{ asset('aavu_logo_02.png') }}" alt="Alumni Association of Varendra University"
                    class="u-img-responsive">
                @if (!Agent::isMobile())
                    <div>
                        <h1 style="color:#c44d2d;">{{ 'Alumni Association of Varendra University (AAVU)' }}</h1>
                    </div>
                @else
                    <h1 hidden>{{ 'Alumni Association of Varendra University (AAVU)' }}</h1>
                @endif
            </a>
        </div>
        <!-- ul class="l-header__link">
                <li class="l-header__link-item l-header__link-item-01"><a href="#content">Skip to content</a></li>
                <li class="l-header__link-item l-header__link-item-03"><a href="general/contact.html">Contact</a></li>
            </ul>  -->
        <!--<div class="l-header__payment-instruction">
                <span class=""><a href="https://vu.edu.bd/notice/details/1983" target="_blank"><img style="border: 1px solid; padding: 7px; border-radius: 5px;" src="https://vu.edu.bd/uploads/media/images/payment-inspng2.png" alt="Open a new window"></a></span>
            </div> -->

        <div class="l-header__language">
            <div class="l-header__student-login" style="position: unset;">
                <span class=""><a class="btn btn-success"
                        style="border-radius: 25px; color: white; text-decoration: none;"
                        href="{{ route('aavu.register') }}">Become a Proud
                        VUian</a></span>
            </div>
            <!-- <a href="#" class="is-open">Language</a>
                <ul class="l-header__language-list" style="color: black;">
                    <li><a href="/ja/index.html"><span lang="ja">日本語</span></a></li>
                    <li><a href="/zh/index.html"><span lang="zh">中文</span></a></li>
                    <li><a href="/ko/index.html"><span lang="ko">한국어</span></a></li>
                </ul> -->

            <ul class="l-footer__body-link" style="margin-right:10px; display:flex;">
                <!-- <li class="l-footer__body-link-item">Social Links: </li> -->
                {{-- <li class="l-footer__body-link-item mobile-hide">
                    <a href="https://vu.edu.bd/portfolio">
                        <img src="https://vu.edu.bd/img/emplogin.png" alt="">
                    </a>
                </li> --}}
                {{-- <li class="l-footer__body-link-item desktop-hide">
                    <a href="#" data-toggle="modal" data-target="#studentLogin">
                        <img style="width:135px;" src="https://vu.edu.bd/img/elements/student_login_bar.jpg"
                            alt="Student Corner">
                    </a>
                </li> --}}
                {{-- <li class="l-footer__body-link-item">
                    <a href="https://outlook.office.com">
                        <i class="fas fa-envelope" style="padding: 10px;"></i>
                    </a>
                </li>
                <li class="l-footer__body-link-item mobile-hide">
                    <a href="https://www.facebook.com/vu.edu">
                        <i class="fab fa-facebook-f" style="padding: 10px;"></i>
                    </a>
                </li>
                <li class="l-footer__body-link-item mobile-hide">
                    <a href="https://www.youtube.com/c/VarendraUniversityBD">
                        <i class="fab fa-youtube" style="padding: 10px;"></i>
                    </a>
                </li>
                <li class="l-footer__body-link-item mobile-hide">
                    <a href="https://twitter.com/varendrau">
                        <i class="fab fa-twitter" style="padding: 10px;"></i>
                    </a>
                </li>
                <li class="l-footer__body-link-item mobile-hide">
                    <a href="https://www.linkedin.com/company/varendra-university/">
                        <i class="fab fa-linkedin-in" style="padding: 10px;"></i>
                    </a>
                </li> --}}
            </ul>
        </div>

        {{-- <div class="l-header__form-box">
            <form method="get" action="#" name="searchHead" id="myForm">
                <div class="l-header__form-box-inner">
                    <input type="text" class="l-header__form" name="query" id="query" value="" title="Search" style="border: 0px;">
                    <button type="submit" class="l-header__form-button" name="Submit" value="" onclick="document.searchHead.action='https://vu.edu.bd/search/all'">Search</button>
                </div>
                <!-- <button type="submit" class="l-header__form-teacher" name="Submit" value="" onClick="document.searchHead.action='https://vu.edu.bd/search/employee'">People</button> -->
            </form>
        </div> --}}
    </div>
</header>
