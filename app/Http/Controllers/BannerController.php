<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //§2. Правила безопасности
    //
    //Безопасность загрузки изображений сводится к недопущению попадания на сервер чужеродного
    //кода и его выполнения. На практике загрузка картинок наиболее уязвимое место в PHP-приложениях:
    //попадание shell-скриптов, запись вредоносного кода в бинарные файлы, подмена EXIF-данных. Для того,
    //чтобы избежать большинства методов взлома нужно придерживаться следующих правил:
    //
    //а не доверять данным из $_FILES;
    //б не проверять MIME-тип картинки из функции getimagesize();
    //в загружаемому файлу генерировать новое имя и расширение;
    //г запретить выполнение PHP-скриптов в папке с картинками;
    //д не вставлять пользовательские данные через require и include;
    //е для $_FILES использовать is_uploaded_file() и move_uploaded_file().
    //Если есть чем дополнить «Правила безопасности», тогда оставляйте свои
    //замечания или ссылки на статьи по безопасности в комментариях к этому
    //руководству, а я опубликую их в этом параграфе.
    //

    /* public function showBanner (Request $request) { */
    /*     $user_id = $request->session()->get('user_id'); */
    /*     $object_id =$request->input('id'); */
    /*     $banerFilename = $user_id.'_'.$object_id.'_banner.jpg'; */

    /*     return view('showBanner', ['bannerFilename'=>$banerFilename, 'obj_id'=>$object_id]); */
    /* } */
    /* public function changeBanner (Request $request){ */
    /*     $object_id =$request->input('obj_id'); */

    /*     return view ('uploadBanner',['object_id'=>$object_id]); */
    /* } */

    /* public function storeBanner(Request $request){ */
    /*     $user_id = $request->session()->get('user_id'); */
    /*     $object_id = $request->input('object_id'); */
    /*     $uploaddir = 'banners/'; */
    /*     $file_name = $user_id.'_'.$object_id.'_banner.jpg'; */
    /*     $fullpath = $uploaddir.$file_name; */
    /*     move_uploaded_file($_FILES['bannerFile']['tmp_name'], $fullpath); */
    /*    // dd($_FILES['bannerFile']['tmp_name']); */


    /*     return redirect('/home'); */
    /* } */

}
