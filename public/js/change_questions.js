$(document).ready(function () {

    countOfQuestion = $('#count_of_question').val();

    $('#bAddQuestion').click(addNewQuestion);
    $('.btn_del').click(removeQuestion);

    function removeQuestion() {
        var questionNumber = $(this).attr('data-question');
        var sel = `#fg-${questionNumber}`;
        $(sel).remove();
        countOfQuestion--;
        renameQuestionsFields();
        $('#count_of_question').val(countOfQuestion);

    }

    function renameQuestionsFields () {
        var counter = 1;
        $('.form-group').each(function (){
            $(this).prop('id',`fg-${counter}`);
            $(this).children('label').prop('for',`question-${counter}`);
            $(this).children('label').prop('id',`label-${counter}`);
            $(this).children('label').text(`Вопрос ${counter}`);
            $(this).children('input').prop('name',`question_${counter}`);
            $(this).children('a').prop('id',`bRemoveQuestion-${counter}`);
            $(this).children('a').attr('data-question',counter);
            counter++;
        })

    }

    function addNewQuestion() {
        countOfQuestion++;
        newElement = `
         <div class="form-group" id="fg-${countOfQuestion}">
            <label for="question_${countOfQuestion}" id="label-${countOfQuestion}">Вопрос ${countOfQuestion}</label>
            <input type="text" name="question_${countOfQuestion}" value=""  class="form-control"  placeholder="Введите ваш вопрос.">
            <a class="btn btn-primary btn-sm btn_del" id="bRemoveQuestion-${countOfQuestion}" data-question="${countOfQuestion}" href="#" role="button">X</a>
        </div>`;
        $('div.form-group:last').after(newElement);
        $(`#bRemoveQuestion-${countOfQuestion}`).click(removeQuestion);
        $('#count_of_question').val(countOfQuestion);
    }


})