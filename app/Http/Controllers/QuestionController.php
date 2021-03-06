<?php

namespace App\Http\Controllers;

use App\Oobject;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //
    public function change(Request $request) 
    {
        $questions = Question::where(
            'oobject_id',
            ($request->input('id'))
        )->where('activ', true)->get();
        return view('changequestions', ['questions'=> $questions]);
    }

    public function store(Request $request) 
    {
        $count = $request->input('count');
        $object_id = $request->input('oobject_id');
        $rules=[];
        //Валидация данных.
        for ($i=0; $i<$count; $i++) {
            $name_q="question_".$i;
            $rules[$name_q]=array(
                'required','regex:/[0-9a-zA-Zа-яА-Я\s.,:;!?-№]+/u'
            );
        };

        //находим активные для данного объекта вопросы и переводим 
        //их в пассивные.
        $tmpQ = Question::where('oobject_id', $object_id)->get();
        foreach ($tmpQ as $tmp) {
                $tmp->activ = false;
                $tmp->save();
        } 
        // Создаем новые вопросы. Они становятся активными по умолчанию. 
        for ($i=1;$i<$count+1;$i++) {
            $Q=new Question;
            $Q->oobject_id = $object_id;
            $name='question_'.$i;
            $Q->Question = $request->input($name); 
            $Q->save();
        }
        //Нелья удалять старые вопросы. Это удалит историю ответов. 
        return redirect('/objects');
    }
}
