@extends('layouts.master')
@section('title', '5StarService')
@section('content')
    <div>
        <h3>Загрузка банера для опроса.</h3>
        <p>
                Банер будет загружаться в верхней части страницы опроса.
            Он придаст уверенности вашему клиенту в том, что он заполняет отзыв на вашу
            оганизацию. Вы можите не ставить банер. Тогда вместо него клиент увидет название
            объекта как вы его внесли в карточку и его адрес.
                Требуется размер 1000px/200px. Изображения большего размера будут приведены к этому размеру.
        </p>

    </div>

    <form enctype="multipart/form-data" action="/banner/doUpload" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="object_id"  value="{{$object_id}}">
        <div class="form-group">
            <input name="bannerFile" type="file" />
        </div>

        <input class="btn btn-primary btn-sm btn_cl" type="submit" value="Отправить" />
    </form>

@endsection
