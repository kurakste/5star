@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

        <!-- контейнер находится в мастер шаблоне -->
<main class = "mdl-layout__content">    
    <div class = "mdl-grid">
       <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                    mdl-cell--stretch  mdl-cell--2-col-phone graybox">
    
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">ИНФО</h2>
              </div>
              <div class="mdl-card__supporting-text">
                Вся информация о ваших настройках.  
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/info" 
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                  ВПЕРЕД
                </a>
              </div>
            </div>
    </div>

        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                                mdl-cell--2-col-phone graybox">
            
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <h6 class="mdl-card__title-text">НАСТРОЙКИ</h6>
              </div>
              <div class="mdl-card__supporting-text">
                Вся информация о ваших настройках.  
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/info" 
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                  ВПЕРЕД
                </a>
              </div>
            </div>
        </div>
    </div>
            
    <div class = "mdl-grid">
        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet
                                             mdl-cell--2-col-phone graybox">

        </div>
       <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                                mdl-cell--2-col-phone graybox">
        </div>
    </div>
         
</main>




@endsection

