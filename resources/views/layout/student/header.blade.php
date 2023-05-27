 <!-- Topbar Start -->
 <div class="container-fluid bg-dark">
    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small><i class="fa fa-phone-alt mr-2"></i>055 4351292</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>
                    support@hti.edu.eg</small>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-2" href="https://www.facebook.com/HTI.EGY?locale=gl_ES">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-2" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-white px-2" href="#">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-white px-2" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-white pl-2" href="#">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="{{ route('/') }}" class="navbar-brand ml-lg-3">
            <img alt="Logo" src="{{ asset('img/logo.png') }}" class="max-h-50px logo-default "
            style="height: 80px" />
            {{-- <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edukate</h1> --}}
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('/') }}" class="nav-item nav-link active">Home</a>
                {{-- <a href="about.html" class="nav-item nav-link">About</a> --}}
                <a href="{{ url('user/all/subjects') }}" class="nav-item nav-link">Subjects</a>
                <a href="{{ url('user/all/posts') }}" class="nav-item nav-link">Posts</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="detail.html" class="dropdown-item">Subject Detail</a>
                        <a href="feature.html" class="dropdown-item">Our Features</a>
                        <a href="team.html" class="dropdown-item">Instructors</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    </div>
                </div> --}}
                <a href="{{ url('user/contact') }}" class="nav-item nav-link">Contact</a>
                <a href="#" class="nav-item nav-link active">{{Auth::user()->name}}</a>


            </div>
            <a  href="{{ route('logout') }}"class="btn btn-primary py-2 px-4 d-none d-lg-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                Sign Out
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
        </div>
    </nav>
</div>
<!-- Navbar End -->


<!-- Header Start -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">

        @yield('breadcrumb')

        {{-- <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            <form action="#" method="get" >
            <div class="input-group">

                <input type="text" name="search" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary px-4 px-lg-5">Search</button>
                </div>

            </div>
        </form>
        </div> --}}
    </div>
</div>
<!-- Header End -->
