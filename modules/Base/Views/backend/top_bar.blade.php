<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <!-- Dark Logo icon -->
                <img width="30%"
                     src="https://s3-ap-southeast-1.amazonaws.com/homepage-media/wp-content/uploads/2019/11/06160433/laravel-logo_s.png"
                     alt="homepage" class="dark-logo"/>
                <!-- Light Logo icon -->
                <img width="30%"
                     src="https://s3-ap-southeast-1.amazonaws.com/homepage-media/wp-content/uploads/2019/11/06160433/laravel-logo_s.png"
                     alt="homepage" class="light-logo"/>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                       href="javascript:void(0)">
                        <i class="icon-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                        <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span
                                                class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                            <span class="time">9:10 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                            <span class="time">9:08 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all
                                        notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" alt="user" class="">
                        <span class="hidden-md-down">
                            {{ auth('admin')->user()->name }} <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account
                            Setting</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route("admin.get.logout") }}" class="dropdown-item"><i class="fa fa-power-off"></i> {{ trans('Logout') }}</a>
                    </div>
                </li>
{{--                <li class="nav-item right-side-toggle"><a class="nav-link  waves-effect waves-light"--}}
{{--                                                          href="javascript:void(0)"><i class="ti-settings"></i></a></li>--}}
            </ul>
        </div>
    </nav>
</header>
