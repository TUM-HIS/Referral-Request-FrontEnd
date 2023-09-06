
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="" alt="">
            <span class="d-none d-lg-block">Referral System </span>
        </a>

    </div><!-- End Logo -->

    <h6 class="card-title" style="font-size: 90% !important;">{{ auth()->user()->userFacility->Code }} | {{ auth()->user()->userFacility->Officialname }} ({{ auth()->user()->userFacility->County }} County)</h6>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">{{auth()->user()->userFacility->unreadNotifications->count()}}</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have {{auth()->user()->userFacility->unreadNotifications->count()}} new referral requests
                        <a href="{{route('referrals.incoming') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @foreach(Auth::user()->userFacility->unreadNotifications as $notification)

                        <a href={{ url('/referral/view-incoming/'.$notification->data['referral_id']) }} class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>

                                <h4>{{$notification->data['data']}}</h4>
                                <p>{{$notification->data['from']}}</p>
                                <p>{{$notification->created_at->diffForHumans() }} ago</p>
                            </div>
                        </a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                    @endforeach





{{--                    <li class="notification-item">--}}
{{--                        <i class="bi bi-x-circle text-danger"></i>--}}
{{--                        <div>--}}
{{--                            <h4>Atque rerum nesciunt</h4>--}}
{{--                            <p>Quae dolorem earum veritatis oditseno</p>--}}
{{--                            <p>1 hr. ago</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="notification-item">--}}
{{--                        <i class="bi bi-check-circle text-success"></i>--}}
{{--                        <div>--}}
{{--                            <h4>Sit rerum fuga</h4>--}}
{{--                            <p>Quae dolorem earum veritatis oditseno</p>--}}
{{--                            <p>2 hrs. ago</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="notification-item">--}}
{{--                        <i class="bi bi-info-circle text-primary"></i>--}}
{{--                        <div>--}}
{{--                            <h4>Dicta reprehenderit</h4>--}}
{{--                            <p>Quae dolorem earum veritatis oditseno</p>--}}
{{--                            <p>4 hrs. ago</p>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}
                    <li class="dropdown-footer">
                        <a href="{{route('referrals.incoming') }}">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

{{--            <li class="nav-item dropdown">--}}

{{--                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">--}}
{{--                    <i class="bi bi-chat-left-text"></i>--}}
{{--                    <span class="badge bg-success badge-number">3</span>--}}
{{--                </a><!-- End Messages Icon -->--}}

{{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">--}}
{{--                    <li class="dropdown-header">--}}
{{--                        You have 3 new messages--}}
{{--                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="message-item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">--}}
{{--                            <div>--}}
{{--                                <h4>Maria Hudson</h4>--}}
{{--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                <p>4 hrs. ago</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="message-item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">--}}
{{--                            <div>--}}
{{--                                <h4>Anna Nelson</h4>--}}
{{--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                <p>6 hrs. ago</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="message-item">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">--}}
{{--                            <div>--}}
{{--                                <h4>David Muldon</h4>--}}
{{--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>--}}
{{--                                <p>8 hrs. ago</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <hr class="dropdown-divider">--}}
{{--                    </li>--}}

{{--                    <li class="dropdown-footer">--}}
{{--                        <a href="#">Show all messages</a>--}}
{{--                    </li>--}}

{{--                </ul><!-- End Messages Dropdown Items -->--}}

{{--            </li><!-- End Messages Nav -->--}}

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>
{{--                            {{ Auth::user()->userRole->name }}--}}
                            @if(auth()->user()->roles())
                                'Doctor'
                            @endif
                        </span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('user.logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
