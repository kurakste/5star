$(document).ready(function () {
    countOfQuestion = $('#count_of_question').val();

    $('#bAddQuestion').click(addNewQuestion);
    $('.bbtn_del').click(removeQuestion);

    function removeQuestion() {
        console.log(this);
        var questionNumber = $(this).attr('data-question');
        var sel = `#fg-${questionNumber}`;
        $(sel).remove();
        console.log(sel);
        countOfQuestion--;
        renameQuestionsFields();
        $('#count_of_question').val(countOfQuestion);

    }

    function renameQuestionsFields () {
        var counter = 1;
        $('div.questionBlock').each(function (){
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
            <div  class='question-group' id='fg-${countOfQuestion}'  data-question="${countOfQuestion}">
                <div class='questionBlock'>
                    <label for="question_${countOfQuestion}" id="label-${countOfQuestion}"}
                           class="mdl_textfield__label"
                            >Вопрос #${countOfQuestion}</label>
                    <input type="text" name="question_${countOfQuestion}" 
                           value=""  
                           class="mdl-textfield__input" 
                           placeholder="Введите ваш вопрос.">
                </div>
                    
                <div class="x-icon btn_del" data-question="${countOfQuestion}">
                     <img class='bbtn_del'  data-question="${countOfQuestion} " id="bRemoveQuestion-${countOfQuestion}" src="/icon/del-30.png" alt="" width='20px'/>
                </div>
           </div>
                `;
        $('div.question-group:last').after(newElement);
        $(`#bRemoveQuestion-${countOfQuestion}`).click(removeQuestion);
        console.log(`#bRemoveQuestion-${countOfQuestion}`);
        $('#count_of_question').val(countOfQuestion);
    }
    

})
