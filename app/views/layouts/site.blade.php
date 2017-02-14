<!DOCTYPE html>
<html>
    <head>
        <title>Mikael Rouhiainen</title>
        <link rel="stylesheet" href="/css/main.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <meta charset="ISO-8859-1" />

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
    </body>
</html>
