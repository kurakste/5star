<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Object;
use App\Question;
use App\Answer;

class FeedbackController extends Controller
{
    //
    public function create($nickname) {
        //Никнейм придет в формате: user_id-nickname;
        $splitedNick = explode('-', $nickname);

        //dd($splitedNick[0]);
        $obj = Object::where([['nick',$splitedNick[1]],['user_id', $splitedNick[0]]])->first();
        $Q = Question::where([['object_id',$obj->id],['activ',true]])->get();
//!! Нужно продумть как поступать с клиентами у кого не активный статус.
//!! Проверку нужно исправить. 
//
        return view ('feedback',['object_id'=>$obj->id, 'questions'=>$Q]);
        } 

    public function show (Request $request) {

        $object = Object::where('id', $request->input('id')) -> first();
        $fbarray = $object->getFeedBackList();
        return view ('showfb',['object'=>$object,'fbarray'=>$fbarray]);
    }


    public function store(Request $request) {
        // Проверка данных, пришедших из формы.
        $rules = [
            'fname'=>array('required', 'regex:/[А-Яа-яЁё]/u'),
            'fphone'=>array('required','regex:/^[0-9]{11}$/u'),
            'fnotes'=>array('required','regex:/[0-9a-zA-Zа-яА-Я\s.,:;!?-№]+/u') ];

        for ($i=0; $i<$request->input('countofquestions'); $i++) {
            $name_q="fquestion_".$i;
            $rules[$name_q]=array('required', 'integer', 'min:0', 'max:5');
        };

        $validateDate = $request->validate($rules);

        $fb = new Feedback;
       $fb->object_id = $request->input('id');
       $fb->name = $request->input('fname');
       $fb->phone = $request->input('fphone');
       $fb->comment = $request->input('fnotes');
       $fb->save();
       for ($i=0; $i<$request->input('countofquestions'); $i++) {
           $name_q="fquestion_".$i;
           $name_i="question_id_".$i;
           $answers= new Answer;
           $answers->feedback_id = $fb->id;
           $answers->question_id = $request->input($name_i);
           $answers->Answer = $request->input($name_q);
           $answers->save();
       }
       return view ('thanks');
    }
}
