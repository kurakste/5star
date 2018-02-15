<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="/css/main.css">
      <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>

<!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">HOTLine</span>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">HOTLine</span>
              <div id="my-menu">
                <ul> 
                  <li> <a href="/home">ГЛАВНАЯ</a> </li>
                  <li> <a href="/object/add">ДОБАВИТЬ ОБЪЕКТ </a> </li>
                  <li> <a href="/bill/charge">ПОПОЛНИТЬ счет</a> </li>
                  <li> <a href="/bill/details">ДЕТАЛИ СЧЕТА</a> </li>
                  <li> <a href="/showtariffs">ТАРИФЫ </a> </li>
                </ul>
              </div> <!-- my-menu -->
        </div> <!-- drawer -->


        @yield('content')
      </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    @yield('script')
    </body>
</html>
