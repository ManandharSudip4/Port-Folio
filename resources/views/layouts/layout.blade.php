<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />  

        <title>Manandhar Sudip</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- Font Awesome -->
        <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- css -->
        <link href="/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
            <!-- bootstrap-progressbar -->
        <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.cs') }}s" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
        </div>
    
        
        <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">
            
            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="#home-section">MS<span class="text-primary">.</span> </a></h1>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li><a href="#home-section" class="nav-link">Home</a></li>
                    <li><a href="#about-section" class="nav-link">About Us</a></li>
                    <!-- <li class="has-children">
                    <a href="#about-section" class="nav-link">About Us</a>
                    <ul class="dropdown">
                        <li><a href="#team-section" class="nav-link">Team</a></li>
                        <li><a href="#pricing-section" class="nav-link">Pricing</a></li>
                        <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                        <li><a href="#gallery-section" class="nav-link">Gallery</a></li>
                        <li><a href="#services-section" class="nav-link">Services</a></li>
                        <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                        <li class="has-children">
                        <a href="#">More Links</a>
                        <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                        </ul>
                        </li>
                    </ul>
                    </li> -->
                    <li><a href="#skill-section" class="nav-link">Skills</a></li>
                    <li><a href="#experiences-section" class="nav-link">Experiences</a></li>
                    <li><a href="#portfolio-section" class="nav-link">Portfolio</a></li>
                    
                    <li><a href="#blog-section" class="nav-link">Blog</a></li>
                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>
        
        </header>
        
            @yield('content')
    </body>
    <footer class="footer">
        <span class="text">Copyright 2021 Manandhar Sudip</span>
        <span class="media-icon">
            <ul>
                <li><i class="fa fa-facebook"></i></li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-linkedin"></i></li>
                <li><i class="fa fa-youtube"></i></li>
                <li><i class="fa fa-instagram"></i></li>
                <li><i class="fa fa-snapchat"></i></li>
            </ul>
        </span>
    </footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/main.js"></script>
<script>
    // for dynamic skill bar
    $('.bar-container .bar').each(function(){
        var $this = $(this);
        var per = $this.attr('per');
        $this.css("width",per+"%")
    });
    // for dynamic circular skill bar
    $('.proval').each(function(){
        var $this = $(this);
        var per = $this.attr('per');
        console.log(per);
        $this.css("stroke-dashoffset", 310 - (310 * per)/100)
    });
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');
            console.log(value.length);

            // for(var i = 0; i < 3; i++){
            //     for(var j=0; j < 3;j++){
            //         if(j%2==0){ 
            //             $('.'+value).css({"grid-row-start":"1","grid-row-end":"3"});
            //         }else{
            //             $('.'+value).css({"grid-row-start":"1","grid-row-end":"2"});
            //         }
            //     }
            // }

            // $('.'+value).each(function(){
            //     var $this = $(this);
            //     $this.css({"grid-row-start":"auto","grid-row-end":"auto"});
            // });
            if(value == "all"){
                $('.filter').show('1000');
            }else{
                $(".filter").not('.'+value).hide('3000');
                $(".filter").filter('.'+value).show('3000')
            //     for(var i = 0; i < 3; i++){
            //     for(var j=0; j < 3;j++){ 
            //         $('.'+value).css({"grid-row-start":"1","grid-row-end":"3"});
            //     }
            // }
            }
        });
        if ($(".filter-button").removeClass("active")){
            $(this).removeClass("active");
        }
        
        $(this).addClass("active");
    });

    
</script>
</html>