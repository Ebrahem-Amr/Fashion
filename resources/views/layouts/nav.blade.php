<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        

        <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">

         <link rel="stylesheet" href="{{asset('css/slick.css')}}">



        <link href="{{ asset('css/tooplate-little-fashion.css') }}" rel="stylesheet">

<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                        <strong><span>Little</span> Fashion</strong>
                    </a>


                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/about">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/products">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/faq">FAQs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                            @if (Auth::check() && Auth::user()->is_admin())
                                <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            @endif
                            
                        </ul>

                        <div class="d-none d-lg-block">
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        
                            @if(Auth::check())
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('show_my_cart') }}">
                                                my cart
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="/sign-in" class="bi-person custom-icon me-3"></a>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </nav>
            @yield('cont')
            
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="/">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="/about" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="/products" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="/faq" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="/contact" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
        @yield('cont-product-detail')

        <!-- JAVASCRIPT FILES -->

        {{-- <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script> --}}
        
        <script src="{{asset('js/jquery.min.js')}}"></script>
        
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        
        <script src="{{asset('js/Headroom.js')}}"></script>
        
        <script src="{{asset('js/jQuery.headroom.js')}}"></script>
        
        <script src="{{asset('js/slick.min.js')}}"></script>
        
        <script src="{{asset('js/custom.js')}}"></script>

    </body>
</html>
