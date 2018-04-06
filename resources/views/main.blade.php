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
              <div class="mdl-card__actions mdl-card--border">
              <div class="mdl-card__supporting-text menu-card">
                ИНФОРМАЦИЯ  
              </div>
              </div>
              <a href="/info" class="main-links"></a>
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
              <div class="mdl-card__actions mdl-card--border">
                  <div class="mdl-card__supporting-text  menu-card" >
                    НАСТРОЙКИ
                  </div>
              </div>
            <a href="/getsettings" class="main-links"></a>
            </div>
     <!-- =============== nest ========================================= --> 
        </div> <!-- cell -->
    </div> <!-- greed -->
            
    <div class = "mdl-grid">
        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet
                                             mdl-cell--2-col-phone graybox">
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <img class='center' src="icon/list_icon.png" alt="" />
              </div>
              <div class="mdl-card__actions mdl-card--border">
              <div class="mdl-card__supporting-text  menu-card">ОБЪЕКТЫ</div>
              </div>
                <a href="/objects" class="main-links"></a>
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
              <div class="mdl-card__actions mdl-card--border">
                <div class="mdl-card__supporting-text  menu-card">ОТЗЫВЫ</div>
              </div>  
                <a href="/get-full-fb-list" class="main-links"></a>
            </div>
     <!-- =============== nest ========================================= --> 
        </div>
    </div> 
    <div class = "mdl-grid">
        <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet
                                             mdl-cell--2-col-phone graybox">
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                <img class='center' src="icon/rur_big_icon.png" alt="" />
              </div>
              <div class="mdl-card__actions mdl-card--border">
              <div class="mdl-card__supporting-text  menu-card">ПОПОЛНИТЬ</div>
              </div>
                <a href="/bill/charge" class="main-links"></a>
            </div>
     <!-- =============== nest ========================================= --> 
        </div>
       <div class = "mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet 
                                                mdl-cell--2-col-phone graybox">
     <!-- =============== nest ========================================= --> 
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
              <div class="mdl-card__title mdl-card--expand">
                 <img class='center' src="icon/help_big.png" alt="" />
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <div class="mdl-card__supporting-text  menu-card">ПОМОЩЬ</div>
              </div>  
                <a href="/help" class="main-links"></a>
            </div>
     <!-- =============== nest ========================================= --> 
        </div>
    </div> 
</main>




@endsection

