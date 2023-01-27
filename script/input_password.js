checkpassword();
setlevelpassword(strength);
showAndHidepsw(index);
_clear(index);

function showAndHidepsw(index) {
    let input_psw = document.getElementsByClassName('password');
    let icon = document.getElementsByClassName('iconlookpsw');
    if(input_psw[index].getAttribute("type")=="password") {
        input_psw[index].setAttribute("type", "text");
        icon[index].setAttribute("src", "../../pictures/Icon/hide.png");
        return 0;
    }else {
        input_psw[index].setAttribute("type", "password");
        icon[index].setAttribute("src", "../../pictures/Icon/show.png");
    }
}

function checkpassword() {
    let password = document.querySelector('.password').value;
    var strength = 0;
    if (password.match(/[a-z]+/)) {
      strength += 1;
    }
    if (password.match(/[A-Z]+/)) {
      strength += 1;
    }
    if (password.match(/[0-9]+/)) {
      strength += 1;
    }
    if (password.match(/[$@#&!]+/)) {
      strength += 1;
    }
    setlevelpassword(strength);
}

function setlevelpassword(strength) {
    let psw_level = document.getElementsByClassName("psw-level-tab");
    for(let i = 0; i <= psw_level.length; i++) {
        if(strength >= i + 1) {
            psw_level[i].style.backgroundColor = "#97E585";
        }else {
            psw_level[i].style.backgroundColor = "#EEDCDC";
        }
    }
}

function _clear(index) {
  let input = document.getElementById('username');
  input.value = "";
}