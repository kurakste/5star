@extends('layouts.master')
@section('title', 'HotLine')
@section('content')

        <!-- контейнер находится в мастер шаблоне -->
<main class = "mdl-layout__content">    
    <div class = "mdl-grid">
       <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                    mdl-cell--stretch  mdl-cell--2-col-phone graybox">
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                    <img class='center' src="icon/info_icon.png" alt="" />
              </div>
              <div class="mdl-card__supporting-text">
                НАСТРОЙКА  
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/info" 
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                        <img src = "icon/ok_icon.png" class ="go-icon" alt="" />
                </a>
              </div>
            </div>
     <!-- =============== nest ========================================= --> 
    </div>

        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                                mdl-cell--2-col-phone graybox">
            
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                    <img class='center' src="icon/gear_icon.png" alt="" />
              </div>
              <div class="mdl-card__supporting-text">
                НАСТРОЙКИ
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/getsettings" 
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                        <img src = "icon/ok_icon.png" class ="go-icon" alt="" />
                </a>
              </div>
            </div>
        </div>
     <!-- =============== nest ========================================= --> 
    </div>
            
    <div class = "mdl-grid">
        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet
                                             mdl-cell--2-col-phone graybox">

     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <img class='center' src="icon/list_icon.png" alt="" />
              </div>
              <div class="mdl-card__supporting-text">ОБЪЕКТЫ</div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/objects"
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                        <img src = "icon/ok_icon.png" class ="go-icon" alt="" />
                </a>
              </div>
            </div>
     <!-- =============== nest ========================================= --> 
        </div>
       <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                                mdl-cell--2-col-phone graybox">
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
               <img class='center' src="icon/fb_icon.png" alt="" />
              </div>
              <div class="mdl-card__supporting-text">
                    ОТЗЫВЫ
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/info" 
                   class="mdl-button mdl-button--colored 
                          mdl-js-button mdl-js-ripple-effect">
                        <img src = "icon/ok_icon.png" class ="go-icon" alt="" />
                </a>
              </div>
            </div>
        </div>
     <!-- =============== nest ========================================= --> 
    </div>
         
</main>




@endsection

