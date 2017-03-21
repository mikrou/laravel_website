<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mikael Rouhiainen</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="/css/main.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"/>
        <style>
            html, body {
                height: 100%;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <div class="col-xs-12">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
                                <div id="mobileMenu">
                                    <div class="mobileLogo">Mikael R</div>
                                    <i class="burger fa fa-bars fa-2x"></i>
                                </div>
                            </button>
                            <div class="desktopLogo"><a href="/">Mikael Rouhiainen</a></div>
                        </div>
                        <div class="collapse navbar-collapse" id="mainNav">
			            <ul id="Menu" class="nav nav-pills nav-justified">
				            <a href="/blog"><li>Blog</li></a>
				            <a href="/portfolio"><li>Portfolio</li></a>
				            <a href="/techsites"><li>Tech Sites</li></a>
				            <a href="/contact"><li>Contact</li></a>
				            <?php if(Auth::check()){ ?>
				                <a href="/profile"><li>
				            <?php echo Auth::user()->name; ?>
				                </li></a>
				            <?php } else { ?>
				                <a href="/login"><li>Login</li></a>
				            <?php } ?>
                        </ul>
                        </div>
                    </div>
                </nav>
			</div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="/assets/jquery/jquery.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>
