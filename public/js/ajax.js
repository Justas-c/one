                                    /* AJAX */
//console.log('hello from ajax.js file');

function xhrObj(method = 'GET', url) {
    xhrObj = new XMLHttpRequest();
    // The XMLHttpRequest method open() initializes a newly-created request, or re-initializes an existing one.
    xhrObj.open(method, url);
    xhrObj.setRequestHeader("Content-type", "application/x-www-form-urlencode");
    return xhrObj;
}

function ajaxReturn(xhrObj) {
    if(xhrObj.readyState == 4 && xhrObj.status == 200){
        return true;
    }
}

function aHello() {
    alert('testing aHello func');
}

//__________________________________test______________________________________//

function changeText(id, newtext) {
    let x = document.getElementById(id);
    //alert('changing the text');
    x.innerHTML = newtext;
    return true;
}
