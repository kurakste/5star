<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;
use App\Poster;
use App\Pformat;
use QrCode;


class PosterController extends Controller
{
    const _PATH = 'QRCode/';
    // Этот контролер отвечает за обслуживание каталога печатных материалов.

    private const PATH_FOR_POSTER_DIR = 'posters/';

    public function scanPosterFolder () {
        //  Каждый постер лежит в отдельном каталоге. В нем есть prev.jpg (превью постера)
        //  Если нет первью постера - каталог не обрабатывается. Название файла кодируется 
        //  следующим образом: А0_200_200_400.tiff
        //  [формат]_[координата x]_[координата Y]_[размер]
        //  нужно вернуть массив содержажий пути к постерам, превьюшкам, координаты вклеивания QR и размер кода

         $dir = opendir(self::PATH_FOR_POSTER_DIR);
         Poster::getQuery()->delete(); // очистить базу перед сканированием каталога

        while ($file = readdir($dir)) {
            $tmp = []; 
            if (is_dir(self::PATH_FOR_POSTER_DIR.$file) && $file != '.' && $file != '..') {

                $poster = new Poster;
                $poster->folder = $file; // сохранил название папки
                $poster->save();
                $pid = $poster->id;

                $subdir = opendir(self::PATH_FOR_POSTER_DIR.$file);
                    while ($ffile = readdir($subdir))  {
                        if (is_file(self::PATH_FOR_POSTER_DIR.$file.'/'.$ffile) && $ffile != '.DS_Store') {
                            array_push($tmp, self::PATH_FOR_POSTER_DIR.$file.'/'.$ffile);
                            $tmp = explode('_', explode('.',$ffile)[0]); //разбираем имя файла на формат, координаты qr кода и его рамер.
                            if (count($tmp) == 4) { //если имя файла разбилось менее чем на четыре части - файл не правильный, парсить его не нужно
                                $pformat = new Pformat;
                                $pformat->format = $tmp[0];
                                $pformat->xpos = $tmp[1];
                                $pformat->ypos = $tmp[2];
                                $pformat->QRsize = $tmp[3];
                                $pformat->poster_id = $pid;
                                $pformat->path = self::PATH_FOR_POSTER_DIR.$file.'/'.$ffile; 
                                $pformat->save();
                                }
                        }

                    }
                }
        }
    }
    
     

    public function showPostersList (Request $request) {
        $object_id = $request->input('id');
        $posters = Poster::all();

//        dd($posters[0]->formats->where('format','prev')->first()->path);
        return view('posterList',['posters'=>$posters, 'object_id'=>$object_id]);
    }


    public function getPoster (Request $request) {
         //  в запросе: $poster - id формата постера из таблицы  pformats
         //             $id - id объекта для того, что бы сформировать  QR Code 
        $poster_id = $request->input('poster');
        $object_id = $request->input('id');
        $obj = Object::find($object_id);
        $object = Object::find($object_id);
       // dd($poster_id);
        $posterInfo = \App\Pformat::findOrFail($poster_id); //$poster_id);
        $publicNick = $obj->user_id.'-'.$obj->nick;
        $filename = self::_PATH.$publicNick.'.png';
        $url = $request->root().'/'.$publicNick;
        // генерим нужный QR Cod
//        dd($posterInfo->QRsize);
        QrCode::format('png')->size($posterInfo->QRsize)->generate($url, $filename);
            
        /* $pathToQRCode = $object->QRfilename; */
        $poster = imagecreatefromjpeg($posterInfo->path);
        $qrCode = imagecreatefrompng($filename);
        imagecopy($poster,$qrCode,$posterInfo->xpos, $posterInfo->ypos,0,0, 
                        $posterInfo->QRsize, $posterInfo->QRsize);
        //dd($poster);
        $text = 'text for picture';
        $fontFile = 'webfonts/ClearSans-Bold.ttf';
        

        $pathToReadyPoster = 'tmp/'.$object_id.'_poster.png';
        unlink($pathToReadyPoster);
        imagepng($poster,$pathToReadyPoster);
//        dd($url);

        return response()->file($pathToReadyPoster);
    }
    // Добавляем QR код в заданное место. и выводим картинку на скачивание.
}


