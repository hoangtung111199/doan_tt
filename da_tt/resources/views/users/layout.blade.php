<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>New Vision HTML CSS Template</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" /> <!-- https://fonts.google.com/specimen/Open+Sans?selection.family=Open+Sans -->
    <link href="{{url('public/css_user/css/all.min.css')}}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{url('public/css_user/slick/slick.css')}}" rel="stylesheet" /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{url('public/css_user/slick/slick-theme.css')}}" rel="stylesheet" />
	<link href="{{url('public/css_user/css/bootstrap.min.css')}}" rel="stylesheet" /> <!-- https://getbootstrap.com -->
	<link href="{{url('public/css_user/css/templatemo-new-vision.css')}}" rel="stylesheet" />
<!--

New Vision Template

https://templatemo.com/tm-542-new-vision

-->
</head>
<body>
    <!-- Page Header -->
    <div class="container-fluid">
        <div class="tm-site-header">
            <div class="row">
                <div class="col-12 tm-site-header-col">
                    <div class="tm-site-header-left">
                        <i class="far fa-2x fa-eye tm-site-icon"></i>
                        <h1 class="tm-site-name">New Vision</h1>
                    </div>
                    <div class="tm-site-header-right tm-menu-container-outer">
                        
                        <!--Navbar-->
                        <nav class="navbar navbar-expand-lg">
                        
                          <!-- Collapse button -->
                          <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                                class="fas fa-bars fa-1x"></i></span></button>
                        
                          <!-- Collapsible content -->
                          <div class="collapse navbar-collapse tm-nav" id="navbarSupportedContent1">
                        
                            <!-- Links -->
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                  @if(Session::has('userEmail')!=null)
                                
                                 <a class="nav-link tm-nav-link">Xin chào {{Session::get('userEmail')}} <span class="sr-only">(current)</span></a>
                                @endif
                                <a class="nav-link tm-nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                                @if(Session::has('userEmail')!=null)
                                <a class="nav-link tm-nav-link" href="{{url('/logoutkh')}}">Logout <span class="sr-only">(current)</span></a>
                                @else
                                 <a class="nav-link tm-nav-link" href="{{url('/loginkh')}}">Login <span class="sr-only">(current)</span></a>
                                @endif
                              </li>
                             
                            </ul>
                            <!-- Links -->
                        
                          </div>
                          <!-- Collapsible content -->
                        
                        </nav>
                        <!--/.Navbar-->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="tm-main-bg"></div>        
            </div>
        </div>
        
        @yield('content')

          <footer>
                Copyright &copy; 2020 New Vision - Design: <a href="https://templatemo.com">TemplateMo</a>
            </footer>
            
        </main>
    </div>
    <script src="{{url('public/css_user/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('public/css_user/slick/slick.min.js')}}"></script>
    <script src="{{url('public/css_user/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/css_user/js/templatemo-script.js')}}"></script>
</body>
</html>