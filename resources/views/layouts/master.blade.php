<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/fontawesome-all.css">
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>

<!-- Simple header with fixed tabs. -->
    <div id="main-wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row" id='mainMenuRow'>
          <img src="/logo.png" id='mainLogo' alt="hlines.ru" />
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">HLines.ru</span>
              <div id="my-menu">
                <ul> 
                  <li> <a href="/home">ГЛАВНАЯ</a> </li>
                  <li> <a href="/info">ИНФОРМАЦИЯ</a> </li>
                  <li> <a href="/objects">ОБЪЕКТЫ</a> </li>
                  <li> <a href="/get-full-fb-list">ОТЗЫВЫ</a> </li>
                  <li> <a href="/bill/charge">ПОПОЛНИТЬ</a> </li>
                  <li> <a href="/logout">ВЫЙТИ</a></li>
                </ul>
              </div> <!-- my-menu -->
        </div> <!-- drawer -->


        @yield('content')
      </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script defer src="js/material.min.js"></script>
    @yield('script')
    </body>
</html>
