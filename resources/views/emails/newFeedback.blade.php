<style type="text/css">
    tr>th {
        text-align: center;
    }
    .center {
        text-align: center;
    }
    
</style>

<h1>Здравствуйте, {{ $name }}.</h1>

<h3>Вам поступил новый отзыв на объект "{{ $obj->nick }}". </h3>

<h3>Отзыв написал: {{ $feedback->name }}. </h3>
<h3>Телефон: {{ $feedback->phone }}</h3>

<h3>Содержание отзыва:</h3>
<table>
    <tr>
        <th>Вопрос анкеты</th>
        <th>Ответ</th>
    </tr>
    
@foreach ($answers as $answer)
    <tr>
        <td> {{ $questions[$answer->question_id] }} </td>
        <td class = 'center' > {{ $answer->answer }} </td>
    </tr>
@endforeach
<table>

<p>Примечание: {{ $feedback->comment }}<p>

