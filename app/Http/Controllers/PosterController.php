<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;

class PosterController extends Controller
{
    // Этот контролер отвечает за обслуживание каталога печатных материалов.

    private const PATH_FOR_POSTER_DIR = 'posters/';


     private function getPngFileList ($dirList) {
         //  задача функции просканировать дирректорию для шаблонов постеров и
         // вернуть список правильных файлов.

        $out = [];
        foreach ($dirList as $file) {
            if ( ($file !== '.') and ($file !== '..')) {

            $exts = explode('.',$file);
                $i = count($exts);
                $ext = $exts[$i-1];
                if ($ext== 'png') {
                    $out[]=self::PATH_FOR_POSTER_DIR.$file;
                    }
            };
        };
        return $out;
    }

    public function showPostersList (Request $request) {
        // Считаем кол-во файлов png в каталоге постерз (потом нужно будет разложить по папкам
        // в зависимости от размера печати и ориентации). Кол-во файлов, это кол-во объектов для
        // вывода в форму.
        $object_id = $request->input('id');
        $dirList = scandir(self::PATH_FOR_POSTER_DIR);
    //    dd($out);
        $posterList = self::getPngFileList ($dirList);

        return view('posterList',['postersList'=>$posterList, 'object_id'=>$object_id]);
    }


    public function getPoster (Request $request) {
         //  получает в запросе путь к файлу и id объекта.
         //  должен отдать в представление постер со встроенным QR кодом.
        $pathToPoster = $request->input('poster');
        $object_id = $request->input('id');
        $object = Object::find($object_id);
        $pathToQRCode = $object->QRfilename;
        $poster = imagecreatefrompng($pathToPoster);
        $qrCode = imagecreatefrompng($pathToQRCode);

        $width = imagesx($qrCode);
        $hight = imagesy($qrCode);
        imagecopy($poster,$qrCode,50,150,0,0,$width, $hight);
        //dd($poster);
        $pathToReadyPoster = 'tmp/'.$object_id.'_poster.png';

        imagepng($poster,$pathToReadyPoster);

        return response()->file($pathToReadyPoster);
    }
    // Добавляем QR код в заданное место. и выводим картинку на скачивание.
}


