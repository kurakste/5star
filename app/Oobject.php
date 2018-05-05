<?php

/**
 * This is Oobject class file.  
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;
use DB;

/**
 * This is Oobject class file.  
 */
class Oobject extends Model
{
     /* Изначально модель называлась Object и php нормально к этому относился.
     *  При переходе на очередное обновление PHP скрипт перестал работать. 
     *  Изменил имя модели на Oobject. Название таблицы оставил прежним. 
     */

    protected $table = 'objects'; 
    /**
     * Получить пользователя, владеющего данным  объектом.
     *
     * @return App\User
     */
    public function user() 
    {
        return $this->belongsTo('App\User');
    }   

    /**
     * The function returns count of feedbacks that it has. 
     *
     * @return Integer
     */
    public function countOfFeedbacks()
    {
        return Feedback::where('oobject_id', $this->id)->count();
    }

    /**
     * The function returns the average value thrugh all answers. 
     *
     * @return float
     */
    public function avrgOffAllAnswer() 
    {
        // Возвращает средний бал по всем ответам на все вопосы.

        $out = DB::table('answers')
                ->join ('feedbacks', 'answers.feedback_id', '=', 'feedbacks.id')
                ->select ('answers.*')
                ->where ('feedbacks.oobject_id', '=', $this->id)
                ->avg('answer');

        return $out;
    }


    /**
     * The function returns all feedbacks that the object has.  
     *
     * @return App\FeedBacks
     */
    public function getFeedBackList() 
    {
        $out = Feedback::where('oobject_id', $this->id)->get();
        return $out;
    }
    //
}
