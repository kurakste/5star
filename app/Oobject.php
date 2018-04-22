<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;
use DB;

class Oobject extends Model
{
    protected $table = 'objects'; 
    // Изначально модель называлась Object и php нормально к этому относился.
   
    /**
    * Получить пользователя, владеющего данным  объектом.
    */
  public function user()
  {
    return $this->belongsTo('App\User');
  }   // При переходе на очередное обновление PHP скрипт перестал работать. Изменил имя модели на Oobject. Название таблицы оставил прежним. 

    public function countOfFeedbacks() {
    // Возвращает кол-во отзывов по объекту.

        return Feedback::where('oobject_id',$this->id)->count();
    }

    public function avrgOffAllAnswer () {
        // Возвращает средний бал по всем ответам на все вопосы.

        $out = DB::table('answers')
                ->join ('feedbacks','answers.feedback_id','=','feedbacks.id')
                ->select ('answers.*')
                ->where ('feedbacks.oobject_id','=',$this->id)
                ->avg('answer');

    return $out;
    }


    public function getFeedBackList () {
    
        $out = Feedback::where('oobject_id',$this->id)->get();
        return $out;
    }
    //
}
