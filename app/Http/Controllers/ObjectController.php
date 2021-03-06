<?php

namespace App\Http\Controllers;

use Auth;
use App\Question;
use App\Oobject;
use Illuminate\Http\Request;
use QrCode;

class ObjectController extends Controller
{
    const _PATH = 'QRCode/';

    public function del(Request $request) 
    {

        $obj = Oobject::where('id', $request->input('id'))->firstorFail();
        return view('delobject', ['object' => $obj]);
    }

    public function finishdel(Request $request) 
    {
        // Получив доступ к этой ссылке злодей может удалить все объекты
        // перебирая числа. Нужно подумать над защитой.

        $obj = Oobject::where('id', $request->input('id'))->firstorFail();

        //сначала удаляем QR код из папки  _PATH
        $name = $obj->QRfilename;
        if (file_exists($name)) unlink($name);
        $obj->delete();
        
        return redirect("/objects");
    }

    public function updateQRCode($request, $obj_id) 
    {

        $object = Oobject::where('id', $obj_id)->firstorFail();
        $publicNick = $object->user_id.'-'.$object->nick;
        $filename = self::_PATH.$publicNick.'.png';
        $url = $request->root();
        QrCode::format('png')->size(400)->generate($url.'/fb/'.$publicNick, $filename);
        $object->QRfilename = $filename;
        $object->save();
    }

    public function store(Request $request) 
    {
        
        $user = Auth::user();
        
        if ($request->input('id')==null) {
            $object = new Oobject;
        } else {
            $object = Oobject::where('id', $request->input('id'))->firstorFail();
        }

        $object->user_id = $user->id;
        
        // Нужно проверить изменил ли пользователь никнейм объекта. Если да,
        // то мы должны удалить файл со QR кодом.
        if ($object->nick != $request->input('fnicknаme')) {
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
        // id юзера используется для уникальности кодов среди всех клиентов;
        $object->QRfilename = '';
        $object->save();
        $this->updateQRCode($request, $object->id);

        
        //Для нового объекта нужно создать вопросы. Потом можно добавить новые.
        //При первой проверки не могли создать - не знали id объекта.
        if ($request->input('id')==null) {
            $Q =[
                "Оцените пожалуйста по пятибальной шкале качество услуги нашего заведения.",
                "Оцените пожалуйста по пятибальной шкале качество обслуживания в нашем заведении."];

            foreach ($Q as $question) {
                $questions=new Question;
                $questions->oobject_id=$object->id;
                $questions->question = $question;
                $questions->save();
            }
        }
        
        return redirect("/objects");
    }

    public function downloadQR(Request $request) 
    {
        // Находит QRCode объекта и отдает его на скачивание.
        $object = Oobject::where('id', $request->input('id'))->firstorFail();

        return response()->file($object->QRfilename);
    }

    public function add(Request $request) 
    {
        $user_id=$request->session()->get('user_id');

        return view ('addobject', ['user_id'=>$user_id]);
    }

    public function edit(Request $request) 
    {
        $obj = Oobject::where('id', $request->input('id'))->firstorFail();
        
        return view ('editobjects', ['object' => $obj]);
    }

    public function getListOfObject() 
    {
        $user = Auth::user();
        return view('listOfObject', ['user'=>$user]);
    }
}
