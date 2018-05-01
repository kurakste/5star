window.onload = function () {
    var buttons = document.getElementsByClassName('btnGetLinkForFB');
    var countOfObjects = buttons.length-1;
    var i;

    for (i=0; i<=countOfObjects; i++) {
    
        console.log(buttons[i]);
        buttons[i].onclick = onButtonCopyLinkClick; 
    }; 
        
}
    function onButtonCopyLinkClick() {
        console.log(this);
        var currentObjectId = this.getAttribute('data-id');
        var linkFieldName = 'linkField-' + currentObjectId;
        var field = document.getElementById(linkFieldName);

        field.setSelectionRange(0,60);

        //пытаемся скопировать текст в буфер обмена
        try { 
        document.execCommand('copy'); 
        } catch(err) { 
        console.log('Can`t copy.'); 
    } 
        window.getSelection().removeAllRanges();

}
