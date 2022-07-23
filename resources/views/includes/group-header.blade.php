
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right">
          <div class="main-header-left text-center">
            <div class="logo-wrapper"><a href="index.html"><img src="{{asset("assets/main/images/logo.png")}}" alt=""></a></div>
          </div>
          <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
              <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
            </div>
          </div>
          <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar">               </i></div>
          <div class="">
            <ul class="nav-menus">
                <li class="nav-item @if(Request::route()->getName()=="home") active @endif">
                    <a href="{{route("home")}}"
                        class="nav-link">Home</a>
                </li>
                <li class="nav-item @if(Request::route()->getName()=="courses.index") active @endif">
                    <a href="{{route("courses.index")}}" class="nav-link">Courses</a>
                </li>
                <li class="nav-item @if(Request::route()->getName()=="groups.index") active @endif">
                    <a href="{{route("groups.index")}}" class="nav-link">Groups</a>
                </li>
                <li class="nav-item @if(Request::route()->getName()=="webinars.index") active @endif">
                    <a href="{{route("webinars.index")}}" class="nav-link">Webinars</a>
                </li>
                <li class="nav-item @if(Request::route()->getName()=="mentorings.index") active @endif">
                    <a href="{{route("mentorings.index")}}" class="nav-link">Mentoring Programs</a>
                </li>
            </ul>
          </div>
          <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
                @guest
                <li class="nav-item">
                    <a href="{{route("getting-started")}}" class="btn btn-outline-dark">Get Started</a>
                </li>
                @endguest
                @auth
                <li class="nav-item @if(Request::route()->getName()==="user.*") active @endif dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role==="Admin")
                        <a class="dropdown-item" href="{{route("admin.dashboard")}}">
                            Admin Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role==="Instructor")
                        <a class="dropdown-item" href="{{route("instructor.dashboard")}}">
                            Instructor Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role==="Mentee")
                        <a class="dropdown-item" href="{{route("mentee.dashboard")}}">
                            Mentee Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role==="Manager")
                        <a class="dropdown-item" href="{{route("manager.dashboard")}}">
                            Manager Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role==="Organisation")
                        <a class="dropdown-item" href="{{route("organisation.dashboard")}}">
                            Organisation Dashboard
                        </a>
                        @endif
                        @if(Auth::user()->role==="Institution")
                        <a class="dropdown-item" href="{{route("institution.dashboard")}}">
                            Institution Dashboard
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{route("user.settings")}}">
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
          </div>
        </div>
      </div>