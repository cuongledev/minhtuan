function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function showModal() {
    alert('Show modal dang ký email.');
}

var visited = readCookie('cuongle');

if (!visited) {
    $(document).ready(function(){
      showModal();
      createCookie('cuongle', 'AfterUniversity', 30); // 7 = expires in 7 days, amend as required.
    });
}



/*var myCookie = document.getCookie;
var t = new Date(new Date().getTime() + 10000);
var xxx = new Date(new Date().getTime() + 1000 * 60 * 60 * 24);
var x = xxx.toGMTString();
if (myCookie == null) {
    console.log(x);
}else {
    // do cookie doesn't exist stuff;
    var mi = getCookie("cuongle.dev");
    alert(mi);
}*/