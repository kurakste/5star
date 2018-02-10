<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
<!--        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span  class="navbar-toggler-icon"></span> 
              <span class="n-icon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
          </button>
          <a id="brend" class="navbar-brand" href="/home"><span id = 'logo-head'>HOT</span><span id="logo-tail">Line</span></a>

        </nav>


-->

<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">HOTLine</span>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">HOTLine</span>
          <div id="my-menu">
            <ul> 
              <li>
                  <a href="/home">Главная</a>
              </li>
              <li>
                  <a href="/object/add">Добавить объект </a>
              </li>
              <li>
                  <a href="/bill/charge">Пополнить счет</a>
              </li>
              <li>
                  <a href="/bill/details">Детали счета</a>
              </li>
              <li>
                  <a href="/showtariffs">Тарифы </a>
              </li>
            </ul>
          </div>
    <div>
    </div>
  </div>

@yield('content')

<!--        <footer  class="footer text-center">
            WE DO CARE
        </footer>

        </div>  container -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
@yield('script')
  </body>
</html>
