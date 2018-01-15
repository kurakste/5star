<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //
    public function change(Request $request) {

        return view('changequestions',['object_id'=>$request->input('id')]);
    }
    public function store(Request $request) {
        $count = $request->input('count');
        $object_id = $request->input('object_id');

        //находим активные для данного объекта вопросы и переводим их в пассивные.
        $tmpQ = Question::where('object_id',$object_id)->get();
            foreach ($tmpQ as $tmp) {
                $tmp->activ = false;
                $tmp->save();
            } 
        // Создаем новые вопросы. Они становятся активными по умолчанию. 
        for ($i=1;$i<$count+1;$i++) {
           $Q=new Question;
           $Q->object_id = $object_id;
           $name='question_'.$i;
           $Q->Question = $request->input($name); 
           $Q->save();
        }
        //Нелья удалять старые вопросы. Это удалит историю ответов. 
        return redirect('/home');
    }
}
