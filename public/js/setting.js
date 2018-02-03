$(document).ready(function () {

    currentPageNumber = 1;
    currentCardName = '#card_' + currentPageNumber;
    maxCardNumber = 2;


    $('#bOk').each(function () {$(this).click(subbmitForm);});
    $(".bNext").each(function () {$(this).click(nextPage);});
    $('#bPrev').each(function () {$(this).click (prevPage);});

    function subbmitForm() {
        $('#settingForm').submit();
    }

    function nextPage () {
        if (currentPageNumber < maxCardNumber) {

            $(currentCardName).css('display','none');
            currentPageNumber++;
            currentCardName = '#card_' + currentPageNumber;
            $(currentCardName).css('display','block');
            console.log(currentCardName );
        }

    }

    function prevPage (){
        if (currentPageNumber > 1) {
            $(currentCardName).css('display','none');
            currentPageNumber--;
            currentCardName = '#card_' + currentPageNumber;
            $(currentCardName).css('display','block');
            console.log(currentCardName );
        }

    }

})