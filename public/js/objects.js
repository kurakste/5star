window.onload = function () {
    console.log('We are in onload function.');
    var but = document.getElementById('btnGetLinkForFB');
    console.log(but);
    
    but.onclick = function () {

        var lf = document.getElementById('linkField');
        //производим его выделение
        // var range = document.createRange();
        // range.selectNode(lf); 
        // window.getSelection().addRange(range); 
        
        // lf.select();
        lf.setSelectionRange(0,9999);
        //пытаемся скопировать текст в буфер обмена
        try { 
        document.execCommand('copy'); 
        } catch(err) { 
        console.log('Can`t copy, boss'); 
        } 

        //очистим выделение текста, чтобы пользователь "не парился"
    }


}
