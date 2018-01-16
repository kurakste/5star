<?php

namespace App\Http\Controllers;

use App\Object;
use App\Question;
use Illuminate\Http\Request;
use QrCode;

class ObjectController extends Controller
{
    const _PATH = 'QRCode/';

    public function del (Request $request) {


        $user_id = $request->session()->get('user_id');
        $obj = Object::where('id',$request->input('id'))->firstorFail();
        return view ('delobject',['object' => $obj]);
    }

    public function finishdel (Request $request) {
        $obj = Object::where('id',$request->input('id'))->firstorFail();
        //сначала удаляем QR код из папки  _PATH
        $name = $obj->QRfilename;

        if (file_exists($name)) unlink($name);
        $obj->delete();
        
        return redirect("/home");
    }

    public function updateQRCode ($obj_id) {

        $object = Object::where('id', $obj_id)->firstorFail();
        $publicNick = $object->user_id.'-'.$object->nick;
        $filename = self::_PATH.$publicNick.'.png';

        QrCode::format('png')->size(400)->generate('http://localhost/'.$publicNick,$filename);
        $object->QRfilename = $filename;
        $object->save();
    }

    public function store (Request $request) {
        if ($request->input('id')==null) {
            $object = new Object;}
            else {
                $object = Object::where('id', $request->input('id'))->firstorFail();
            }
        $object->user_id = $request->input('fuser_id');

        // Нужно проверить изменил ли пользователь никнейм объекта. Если да,
        // то мы должны удалить файл со QR кодом.
        if ($object->nick != $request->input('fnicknsme')) {
                $publicNick = $object->id.'-'.$object->nick;
                $filename = self::_PATH.$publicNick.'.png';
                if (file_exists($filename)) {
                    unlink($filename);
                    }
                }

        $object->nick = $request->input('fnickname');
        $object->managername = $request->input('fmanager');
        $object->managerphone = $request->input('fphone');
        $object->notes = $request->input('fnotes');
        $object->city = $request->input('fcity');
        $object->addr = $request->input('faddr');
        // Сейчас нельзя создавать QR код. Для нового объкте не известен id;
        // id объекта используется для уникальности кодов среди всех клиентов;
        $object->QRfilename = '';
        $object->save();
        $this->updateQRCode($object->id);

        
        //Для нового объекта нужно создать вопросы. Потом можно добавить новые.
        //При первой проверки не могли создать - не знали id объекта.
        if ($request->input('id')==null) {
            $Q =[
                "Оцените пожалуйста по пятибальной шкале качество услуги нашего заведения.",
                "Оцените пожалуйста по пятибальной шкале качество обслуживания в нашем заведении."];
            foreach ($Q as $question) {
                $questions=new Question;
                $questions->object_id=$object->id;
                $questions->question = $question;
                $questions->save();
                }
        }
        
        return redirect("/home");
    }

    public function downloadQR (Request $request) {
    
        $object = Object::where('id',$request->input('id'))->firstorFail();

        return response()->file($object->QRfilename);

    } 
    public function add (Request $request) {
        $user_id=$request->session()->get('user_id');

        return view ('addobject',['user_id'=>$user_id]);
    }

    public function edit (Request $request) {
        $obj = Object::where('id',$request->input('id'))->firstorFail();
        
        return view ('editobjects',['object' => $obj]);
    }
    //
}
