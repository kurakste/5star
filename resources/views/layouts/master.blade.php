<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/fontawesome-all.css">
 
      <link rel="stylesheet" href="/css/app.css">
      <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!--<span  class="navbar-toggler-icon"></span> -->
              <span class="n-icon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
          </button>
          <a id="brend" class="navbar-brand" href="/home"><span id = 'logo-head'>HOT</span><span id="logo-tail">Line</span></a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="/home">Главная<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/object/add">Добавить объект </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/bill/charge">Пополнить счет <span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/bill/details">Детали счета <span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/showtariffs">Тарифы <span class="sr-only"></span></a>
              </li>
            </ul>
          </div>
        </nav>



@yield('content')

        <footer  class="footer text-center">
            WE DO CARE
        </footer>

        </div> <!-- container -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>   <script src="{{ asset('js/bootstrap.min.js') }}"> </script>

@yield('script')
  </body>
</html>
