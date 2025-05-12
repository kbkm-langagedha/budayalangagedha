<!-- header begin -->
<header class="transparent">
    <!-- Keep topbar with zero height but preserving structure -->
    <div id="topbar" style="height: 0; overflow: hidden; padding: 0; margin: 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between xs-hide">
                        <div class="d-flex">
                            <!-- Empty but preserved structure -->
                        </div>
                        <div class="d-flex">
                            <!-- Empty but preserved structure -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="{{ route('welcome') }}">
                                <img class="logo-main" style="width: 30%;"
                                    src="{{ asset('assets/images/icon.png') }}" alt="">
                                <img class="logo-mobile" style="width: 30%;"
                                    src="{{ asset('assets/images/icon.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                            <li><a class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}" style="color: #F2E3BB;" href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li><a class="menu-item {{ request()->routeIs('modul*') ? 'active' : '' }}" style="color: #F2E3BB;" href="{{ route('modul') }}">Modul</a>
                            </li>
                            <li><a class="menu-item {{ request()->routeIs('objek-kebudayaan*') ? 'active' : '' }}" style="color: #F2E3BB;" href="{{ route('objek-budaya') }}">Objek Kebudayaan</a>
                            </li>
                            <li><a class="menu-item {{ request()->routeIs('peta*') ? 'active' : '' }}" style="color: #F2E3BB;" href="#">Peta</a>
                                <ul>
                                    <li><a href="#">Peta Budaya</a></li>
                                    <li><a href="#">Peta 3D</a></li>
                                </ul>
                            </li>
                            <li><a class="menu-item {{ request()->routeIs('blog*') ? 'active' : '' }}" style="color: #F2E3BB;" href="{{ route('artikel') }}">Blog</a>
                            <li><a class="menu-item {{ request()->routeIs('tentang*') ? 'active' : '' }}" style="color: #F2E3BB;" href="#">Tentang</a>
                                <ul>
                                    <li><a href="#">Tentang Desa</a></li>
                                    <li><a href="{{ route('kalender-ritual') }}">Kalender Budaya</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Kontak</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- mainmenu end -->
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <span id="menu-btn"></span>
                        </div>

                        <div id="btn-extra">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->