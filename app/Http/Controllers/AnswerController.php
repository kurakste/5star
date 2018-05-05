<?php
/** 
 * Answer Contloller Class 
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Feedback;

/** 
 * Answer Contloller Class 
 *
 */
class AnswerController extends Controller
{
    /** 
     * This method show view with answers. 
     *
     * @return view
     */
    public function show(Request $request) 
    {
        $validateDate=$request->validate(['fb_id'=>'integer','obj_id'=>'integer']);

        $fb=Feedback::where('id', $request->input('fb_id'))->firstOrFail();
        $Qs=Question::where('oobject_id', $request->input('obj_id'))->get(); 
        $Answers=Answer::where('feedback_id', $request->input('fb_id'))->get();
        $out=[];
        $qestions=[];
        foreach ($Qs as $Q) {
            $questions[$Q->id] = $Q->question; 
        }
        $maxCount = count($Answers);
        for ($i=0; $i< $maxCount; $i++) {
            $out[$i]=['question'=>$questions[$Answers[$i]['question_id']],'answer'=>$Answers[$i]['answer']];
        }
               return view('answer', ['data'=> $out, 'fb'=>$fb, 'obj_id' => $request->input('obj_id')]);
    }
}
