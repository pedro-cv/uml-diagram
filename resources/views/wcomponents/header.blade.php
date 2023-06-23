
  <header id="header" class="fixed-top bg-dark">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li class="drop-down"><a href="">About</a>
            <ul>
              <li><a href="#about">About Us</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#testimonials">Testimonials</a></li>
            </ul>
          </li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#pricing">Pricing</a></li>

          <li><a href="#contact">Contact</a></li>
          @auth
          <li><a href="{{ route('dashboard') }}" class="btn btn-primary text-white ml-2">Inicio</a></li>
          @else
          <li><a href="{{ route('login') }}" class="btn btn-primary text-white ml-2">Login</a></li>
          <li><a href="{{ route('register') }}" class="btn btn-warning text-white ml-2">Registrar</a></li>
          @endauth

        </ul>
      </nav><!-- .nav-menu -->
      

    </div>
  </header>