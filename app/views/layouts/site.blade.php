<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mikael Rouhiainen</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="/css/main.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        

        <style>
            html, body {
                height: 100%;
            }


            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <div class="logo"><a href="/">Mikael Rouhiainen</a></div>
            <ul id="Menu">
            <a href="/blog"><li>Blog</li></a>
            <a href="/portfolio"><li>Portfolio</li></a>
            <a href="/techsites"><li>Tech Sites</li></a>
            <a href="/contact"><li>Contact</li></a>
            <?php if(!isset($_SESSION['user'])){ ?>
                <a href="/login"><li>Login</li></a>
            <?php } ?>
            </ul>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/jquery/jquery.min.js"></script>
    </body>
</html>
