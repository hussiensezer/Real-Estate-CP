        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{route("dashboard.index")}}"><img src={{URL::asset("assets/images/logo-dark.png")}} alt=""></a>
                <a class="navbar-brand brand-logo-mini" href={{route("dashboard.index")}}><img src={{URL::asset("assets/images/logo-icon-dark.png")}}
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>

            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src={{URL::asset("assets/images/profile-avatar.jpg")}} alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                   @if(!empty(auth()->user()))
                                        <h5 class="mt-0 mb-0">{{auth()->user()->name}}</h5>
                                        <span>{{auth()->user()->email}}</span>
                                       @else
                                            .......
                                       @endif
                                </div>
                            </div>
                        </div>

                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout').submit()"
                        >
                            <i class="text-danger ti-unlock"></i>
                            Logout
                            <form id="logout" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
