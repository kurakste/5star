<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Question;
use DB;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function avrgAnswer() {
        $query = "
    select avg(`Answer`) as av_ans from `answers` 
    where feedback_id like '$this->id'
    ";
        $out = DB::select($query);
        return ($out[0]->av_ans); 
    }
}
