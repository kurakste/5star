$(document).ready(function () {
    // кл-во вопросов определяет сколько будет страниц в анкете.
    // одна дые странички на приветствие одна на прощание. Остальное - вопросы.
    // т.е. кол-во страниц = кол-во вопросов + 2

    //countOfQuestion = $('#count_of_question').val();
    //countOfPages = countOfQuestion + 3;
    currentCounter =1;
    oldbackgroundColor =0xFFFFFF; //  Сохраняем старый цвет поля что бы при исправлении ошбки востановить.
    currentCard = '#card_'+ currentCounter.toString();
    colorWasChanged =0;
    allIsOk = 1;
    mayWeGoForward = 1;
    allDataInFileldsAreCorrect = 1; // метод doValidate будет сбрасывать этот флаг в ноль
    // если валидация не пройдена и возварщать 1 когда валидация будет корректна
    allDataInFileldsAreFull =  1; // Метод doValidate будет сбрасывыть это флаг в ноль в
    //если  задано поле data-max-lenght="12" и текущие данные не отвечаю этому
    allRequiredDataIsSet = 1; // Метод doValidate будет сбрасывыть это флаг в ноль в
    // если быд задан флаг того, что поле обязательное (data-must='1') но это в поле момент проверки пустое.

    $('#qForm').submit(doSubmit);
    $('.forward').click(goForward);
    $('.backward').click(goBackward);
    setValidation();


      //  $(this).dispatchEvent(event);


    function goForward() {
        // запускаем принудительную проверку полей на этой странице.
        // дело в том, что пользователь может не заполняя ничего нажать
        // кнопку дальше. Т.е. нсучится события keyup.

   //     console.log($(currentCard).find('.validated'));

        $(currentCard).find('.validated').each(function (item, i, arr) {
            var event = new Event('keyup');
            (this).dispatchEvent(event);
        });

        mayWeGoForward = 1;
        $(currentCard).find('.validated').each(function (item, i, arr) {
            console.log ($(this).attr('data-ok'));
            mayWeGoForward = $(this).attr('data-ok')*mayWeGoForward;

        });

        if (!mayWeGoForward) return;


       // checkRequired ();
        //сначало проверяем правильно ли пользователь заполнил поля.
        //используем флаг allDataInFileldsAreCorrect

        //if (!allDataInFileldsAreCorrect) {

            //console.log('error');
          //  return;
       // }

        //if (!allRequiredDataIsSet) {
         //   allRequiredDataIsSet = 1;
          //  return
        //}
        $(currentCard).removeClass('active');
        currentCounter++;
        currentCard = '#card_'+ currentCounter.toString();
        $(currentCard).addClass('active');

    }

    function doSubmit() {
        allIsOk =1;
        $('.validated').each(function () {

            allIsOk = $(this).attr('data-ok')*allIsOk;
        });
        if (allIsOk === 0) event.preventDefault();
        allIsOk = 1;

    }

    function goBackward() {
        if (!allDataInFileldsAreCorrect) {

           // console.log('error');
            return;
        }

        $(currentCard).removeClass('active');
        currentCounter--;
        currentCard = '#card_'+ currentCounter.toString();
        $(currentCard).addClass('active');
    }

    function setValidation () {

        $('.validated').each(function (item, i, arr) {
            $(this).keyup(doValidate);
//            console.log(item,':',i,":",arr);

        });

    }
    function checkRequired () {
        // проверяем все поля где задан класс required
        allRequiredDataIsSet = 1; //Сначало выставляем поле в 1. А если хоть одно поле не Ок - сбросим в ноль.
        var required = $(currentCard).find('.required'); // Получаем все обязательные поля

        required.each(function () {
            allRequiredDataIsSet = ($(this).val()==0) ? 0 : allRequiredDataIsSet*1;
        });
       // console.log(required);

    }

    function doValidate () {
        var sample = $(this).val();
        var pattern = $(this).attr('data-my-pattern');
        var re = new RegExp(pattern);
        var goodSample = sample.match(re);
        var maxlenght = $(this).attr('data-max-lenght'); // зесь на самом деле жесткая длинна проверяется
        var flag = 1;

        if (!goodSample) {
            flag = 0;
        }
        else {
            if (sample.length !== goodSample[0].length) {
                flag = 0;
            }
        }

        if (maxlenght) {
            if (sample.length !== +maxlenght) flag = 0
            console.log('maxlength:', +maxlenght,':',sample.length,':',flag);
        }


       // if (maxlenght) allDataInFileldsAreFull = (sample.length==maxlenght) ? 1:0; // проверяем только в том
        // случае если параметр в this установлен.

        // Если введены не кректные данные, то делаем три вещи.
        // 1. подсвечиваем поле красным
        // 2. Выставляем флаг allDataInFileldsAreCorrect в ноль
        // 2. Водим сообщение под полем.


        if (!flag ) {
            //$(this).css('color','red');
            $(this).css('background','#F2DEDE');
            $(this).attr('data-ok',0);
            colorWasChanged = 1;
            allDataInFileldsAreCorrect = 0;
            //console.log('reset:',allDataInFileldsAreCorrect)
        }
        else {
            if (colorWasChanged) {
                $(this).css('background',oldbackgroundColor);
                $(this).attr('data-ok',1);
                colorWasChanged = 0;
                allDataInFileldsAreCorrect = 1;

            }
        }

        ;

    }
});