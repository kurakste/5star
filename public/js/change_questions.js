$(document).ready(function () {
    console.log('hi1');
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
        console.log('hi2!');
        countOfQuestion++;
        newElement = `
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" 
                    id="fg-${countOfQuestion}">
                    <label for="question_${countOfQuestion}" id="label-${countOfQuestion}">Вопрос  ${countOfQuestion}</label>
                    <input type="text" name="question_{{$i}}" 
                           value=""  
                           class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" 
                           placeholder="Введите ваш вопрос.">
                    
                    <div id="bRemoveQuestion-${countOfQuestion}" data-question="${countOfQuestion}"
                         class="icon material-icons btn_del">add</div>
                </div>  `;
        $('.mdl-textfield:last').after(newElement);
        $(`#bRemoveQuestion-${countOfQuestion}`).click(removeQuestion);
        $('#count_of_question').val(countOfQuestion);
    }


})
