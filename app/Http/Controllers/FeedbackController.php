<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Oobject;
use App\Question;
use App\Answer;
use Auth;
use App\Events\NewFeedback;

class FeedbackController extends Controller
{
    //
    public function create($nickname) {
        //Никнейм придет в формате: user_id-nickname;
        $splitedNick = explode('-', $nickname);
        $obj = Oobject::where([['nick', $splitedNick[1]], ['user_id', $splitedNick[0]]])->firstOrFail();
        $Q = Question::where([['oobject_id',$obj->id],['activ',true]])->get();

        //!! Нужно продумать как поступать с клиентами у кого не активный статус.
        //!! Проверку нужно исправить. 
        //
        return view ('feedback',['oobject_id'=>$obj->id, 'questions'=>$Q]);
        } 

    public function getFullFbList() {
        $user = Auth::user();
        $fb = $user->allFB()->get()->sortByDesc('created_at');
//        dd ($fb);
        return view ('showfb',['object'=>null, 'fbarray'=>$fb]);
    }

    public function show (Request $request) {
        $object = Oobject::where('id', $request->input('id')) -> first();
        $fbarray = $object->getFeedBackList()->sortByDesc('created_at');
        return view ('showfb',['object'=>$object,'fbarray'=>$fbarray]);
    }

    public function store(Request $request) {
        // Проверка данных, пришедших из формы.
        $rules = [
            'fname'=>array('required', 'regex:/[a-zA-ZА-Яа-яЁё\s]/u'),
            'fphone'=>array('required','regex:/^\+7[0-9]{10}$/u'),
            'fnotes'=>array('regex:/[0-9a-zA-Zа-яА-Я\s.,:;!?№]*/u')];

        //Подготовка правила для валидации ответов на вопросы.
        for ($i= 0; $i<$request->input('countOfQuestions'); $i++) 
        {
            $nanswer="fanswer_".$i;
            $rules[$nanswer]=array('required', 'integer', 'min:0', 'max:5');
        };

        $validateDate = $request->validate($rules); 

        $obj = Oobject::find($request->input('id'));
        $user = $obj->user;

        $fb = new Feedback;
        $fb->oobject_id = $request->input('id');
        $fb->name = $request->input('fname');
        $fb->phone = $request->input('fphone');
        $fb->comment = $request->input('fnotes');
        $fb->save();

        for ($i=0; $i<$request->input('countOfQuestions'); $i++) 
        {
            $nanswer="fanswer_".$i;
            $question_id="question_id_".$i;
            $answers= new Answer;
            $answers->feedback_id = $fb->id;
            $answers->question_id = $request->input($question_id);
            $answers->Answer = $request->input($nanswer);
            $answers->save();
       }
        $ans = Answer::where('feedback_id', $fb->id)->get();
        event(new NewFeedback($user, $fb, $ans, $obj));


       return view ('thanks');
    }
}
