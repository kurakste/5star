<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oobject;
use App\Poster;
use App\Pformat;
use QrCode;


class PosterController extends Controller
{
    const _PATH = 'QRCode/';
    // Этот контролер отвечает за обслуживание каталога печатных материалов.

    private const PATH_FOR_POSTER_DIR = 'posters/';


    public function showPostersList(Request $request) 
    {
        $object_id = $request->input('id');
        $posters = $this->getPosters();

        return view(
            'posterList',
            ['posters'=>$posters, 'object_id'=>$object_id]
        );
    }


    public function getPoster(Request $request) 
    {
        //  в запросе: $poster - название постера.
        //             $format - формат постера.
        //             $obj_id - id объекта для того, что бы сформировать
        //             QR Code 
        $poster = $request->input('poster');
        $format = $request->input('format');
        $object_id = $request->input('obj_id');

        
        $obj = Oobject::find($object_id);
        $posters= $this->getPosters();
        $tmp= array_filter($posters, function ($arr) use ($poster) {
            return ($arr['name'] == $poster);
           }
        );
        $poster = array_pop($tmp);
        $format = $poster['formats'][$format];
    
        $publicNick = $obj->user_id.'-'.$obj->nick;
        $filename = self::_PATH.$publicNick.'.png';
        $url = $request->root().'/'.$publicNick;
        QrCode::format('png')->size($format['qsize'])->generate(
            $url, 
            $filename
        );
            
        $poster = imagecreatefromjpeg($format['path']);
        $qrCode = imagecreatefrompng($filename);

        imagecopy(
            $poster, 
            $qrCode, 
            $format['qxpos'], 
            $format['qypos'], 
            0, 
            0, 
            $format['qsize'], 
            $format['qsize']
        );

        $font = 'webfonts/ClearSans-Bold.ttf';
        $tx = $format['txpos'];
        $ty = $format['typos'];
        $rcolor = $format['rcolor'];
        $gcolor = $format['gcolor'];
        $bcolor = $format['bcolor'];
        $fontSize = $format['fsize'];

        $color = imagecolorallocate($poster, $rcolor, $gcolor, $bcolor);
        imagettftext($poster, $fontSize, 0, $tx, $ty, $color, $font, $url); 

        $pathToReadyPoster = 'tmp/'.$object_id.'_poster.jpg';
        if (file_exists($pathToReadyPoster)) unlink($pathToReadyPoster);

        imagejpeg($poster, $pathToReadyPoster, 75);
        $this->setJpegDPI($pathToReadyPoster, 300);

        return response()->file($pathToReadyPoster);
    }

    private function setJpegDPI($jpg, $dpi)
    {
        /* set_dpi('sample.jpg',72); */
        //GD создает по умолчанию jpg в котором DPI = 72, что не подходит для
        //печати. Эта функция исправляет в файле значение на необходимое. 
        $hi = $dpi >> 8;
        $low = $dpi & 0xFF;
        $fr = fopen($jpg, 'rb');
        $fw = fopen("$jpg.temp", 'wb');
        stream_set_write_buffer($fw, 0);
        fwrite(
            $fw, 
            fread($fr, 13).chr(1).chr($hi).chr($low).chr($hi).chr($low)
        );
        fseek($fr, 18);
        stream_copy_to_stream($fr, $fw);
        fclose($fr);
        fclose($fw);
        unlink($jpg);
        rename("$jpg.temp", $jpg);
    }

    private function getPosters() {
        // Функция возвращает массив со всеми настройками постеров.
        // читаем список доступных постеров
        
        $tmpPosters = parse_ini_file('posters/poster.ini', true);
        $count = 0;

        foreach ($tmpPosters as $poster) 
        {
            if (file_exists($poster['setting'])) {
                $posters[$count] = $poster;
                $formats = parse_ini_file($poster['setting'], true);
                $posters[$count]['formats'] = $formats;
                $count++;
            }
        }
        return $posters;
    }
}


