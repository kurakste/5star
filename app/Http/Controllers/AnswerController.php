<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Feedback;

class AnswerController extends Controller
{
    //
    public function show (Request $request) {

       $validateDate=$request->validate(['fb_id'=>'integer','obj_id'=>'integer']);

       $fb=Feedback::where('id',$request->input('fb_id'))->firstOrFail();
       $Qs=Question::where('oobject_id',$request->input('obj_id'))->get(); 
       $As=Answer::where('feedback_id',$request->input('fb_id'))->get();
       $out=[];
       $qestions=[];
       foreach ($Qs as $Q) {
            $questions[$Q->id] = $Q->question; 
        }
       for ($i=0; $i<count($As); $i++) {
           $out[$i]=['question'=>$questions[$As[$i]['question_id']],'answer'=>$As[$i]['answer']];
        }
       return view('answer',['data'=> $out, 'fb'=>$fb, 'obj_id' => $request->input('obj_id')]);
    }
}
