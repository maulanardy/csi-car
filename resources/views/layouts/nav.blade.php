
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link {{Request::is('home') ? 'active' : ''}}" href="{{ route('home') }}">{{ __('Dashboard v1') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('homecar') ? 'active' : ''}}" href="{{ route('homecar') }}">{{ __('Monitor Mobil') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('home2') ? 'active' : ''}}" href="{{ route('home2') }}">{{ __('Monitor Supir') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('summary') ? 'active' : ''}}" href="{{ route('summary') }}">{{ __('Kgt Supir Mobil') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{Request::is('task*') ? 'active' : ''}}" href="{{ url('task') }}">{{ __('Task') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('driver') ? 'active' : ''}}" href="{{ route('driver') }}">{{ __('Supir') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('car') ? 'active' : ''}}" href="{{ route('car') }}">{{ __('Mobil') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav>