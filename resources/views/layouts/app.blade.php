<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title','Home Page')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/custom-styles.css') }}" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar mt-0 navbar-expand-lg bg-dark text-uppercase justify-content-start" id="mainNav">
      <div class="col-8 container">
        <div class="row">
          <a class="navbar-brand col-2 js-scroll-trigger" href="{{ route('home.index') }}">{{ __("home.home") }}</a>
          <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="nav-item dropdown mt-2">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span>
              {{ Config::get("languages")[App::getLocale()]["display"] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @foreach (Config::get('languages') as $lang => $language) @if ($lang != App::getLocale())
              <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"
                ><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{ $language["display"] }}</a
              >
              @endif @endforeach
            </div>
          </div>
          <div class="container col-7">
            <form action="{{ route('search') }}" class="ml-5" method="get">
              <div class="row">
                <div class="col-xs-8 col-xl-offset-2">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <select
                        class="btn btn-primary dropdown-toggle"
                        type="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        name="category">
                        <option value="All" class="dropdown-item">{{ __("home.all") }}</option>
                        <div role="separator" class="dropdown-divider"></div>
                        <option value="Male" class="dropdown-item">{{ __("home.male") }}</option>
                        <option value="Female" class="dropdown-item">
                          {{ __("home.female") }}
                        </option>
                        <option value="Sweet" class="dropdown-item">
                          {{ __("home.sweet") }}
                        </option>
                        <option value="Citric" class="dropdown-item">
                          {{ __("home.citrict") }}
                        </option>
                        <option value="Refreshing" class="dropdown-item">
                          {{ __("home.refreshing") }}
                        </option>
                      </select>
                    </div>
                    <input type="text" class="form-control rounded-0" name="title" placeholder="{{ __('home.search') }}" />
                    <div class="input-group-append">
                      <button class="btn btn-primary rounded-rigth" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-4 pl-0">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @guest

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}">{{ __("Login") }}</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">{{ __("Register") }}</a>
            </li>
            @else
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('solds') }}">{{ __("home.solds") }}</a>
            </li>

            @if (auth()->user()->getAdmin() == 'Yes')
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('admin.home') }}">{{ __("home.admin") }}</a>
            </li>
            @endif
            <li class="nav-item mx-0 mx-lg-1">
              <a href="{{ route('car.buy') }}" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"><i class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a href="{{ route('home.wish') }}" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"><i class="fas fa-heart"></i></a>
            </li>

            <li class="nav-item mx-0 mx-lg-1">
              <a
                class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();"
                >{{ __("Logout") }}</a
              >
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <!-- Jumbotron-->
    <header class="jumbotron jumbotron-fluid text-dark text-center">
      <div class="container d-flex align-items-center flex-column">
        <!-- Jumbotron Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">@yield('user','Guest')</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-dark">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star text-dark"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Jumbotron Subheading-->
        <p class="masthead-subheading font-weight-bolder mb-0">{{ __("home.welcome") }}</p>
      </div>
    </header>

    <!-- Main content -->
    <div class="container">@yield('content')</div>

    <!-- Footer-->
    <footer class="bg-dark footer text-center">
      <div class="container">
        <div class="row">
          <!-- Footer Social Icons-->
          <div class="col-6 mt-3">
            <h4 class="text-uppercase mb-4">{{ __("home.follow-us") }}</h4>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-github"></i></a>
          </div>
          <!-- About Section Content-->
          <div class="row col-6">
            <h4 class="col-12 mt-3">Lorem ipsum dolor sit amet.</h4>
            <div class="col mt-4 ml-auto">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, eum?</p>
            </div>
            <div class="col mt-4 mr-auto">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, consequatur!</p>
            </div>
          </div>
          <!-- Copyright Section-->
          <div class="bg-dark col-12 mt-3 border-top copyright py-4 text-center text-white">
            <div class="mt-4">
              <small> Copyright &copy; Conception Fragance {{ now()->year }}</small>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/scripts.js') }}"></script>
  </body>
</html>
