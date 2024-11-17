@if (
    $page_name != 'coming_soon' &&
        $page_name != 'contact_us' &&
        $page_name != 'error404' &&
        $page_name != 'error500' &&
        $page_name != 'error503' &&
        $page_name != 'faq' &&
        $page_name != 'helpdesk' &&
        $page_name != 'maintenence' &&
        $page_name != 'privacy' &&
        $page_name != 'auth_boxed' &&
        $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">
                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb')
                    <li class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"
                            data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                            aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ $category_name === 'users' ? 'active' : '' }}">
                        <a href="#users" data-active="{{ $category_name === 'users' ? 'true' : 'false' }}"
                            data-toggle="collapse" aria-expanded="{{ $category_name === 'users' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>User</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ $category_name === 'users' ? 'show' : '' }}"
                            id="users" data-parent="#accordionExample">
                            <li class="{{ $page_name === 'profile' ? 'active' : '' }}">
                                <a href="{{ route('member.profile') }}"> Profile </a>
                            </li>
                            <li class="{{ $page_name === 'account_setting' ? 'active' : '' }}">
                                <a href="{{ route('profile.show') }}"> Account Settings </a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->

@endif
