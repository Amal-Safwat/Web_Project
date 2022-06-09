function passCheck(val) {
  var password = val;

  if (password.length >= 8) {
    document.getElementById("passwordError").innerHTML = " كلمة المرور متوافقة ";
    document.getElementById("passwordError").style.color = "green"
    document.getElementById("create").disabled = false;
    document.getElementById("create").style.backgroundColor = "#ef413d";
    document.getElementById("create").style.border = "1px solid #ef413d"
    document.getElementById("create").style.color = "white"
    valid();
  } else {
    document.getElementById("passwordError").innerHTML = " *  كلمة المرور اقل من 8 حروف ";
    document.getElementById("passwordError").style.color = "red"
    document.getElementById("create").disabled = true;
    document.getElementById("create").style.backgroundColor = "grey";
    document.getElementById("create").style.border = "1px solid grey"
    document.getElementById("create").style.color = "white"
  }
}

function passVer(val) {
  var rePassword = val;
  var password = document.getElementById('password').value;
  if (rePassword == password) {
    document.getElementById("repasswordError").innerHTML = "";
    document.getElementById("create").disabled = false;
    document.getElementById("create").style.backgroundColor = "white";
    document.getElementById("create").style.border = "1px solid #ef413d"
    document.getElementById("create").style.color = "#ef413d"
    valid();
  } else {
    document.getElementById("repasswordError").innerHTML = "كلمة المرور غير مطابقة !";
    document.getElementById("repasswordError").style.color = "red"
    document.getElementById("create").disabled = true;
    document.getElementById("create").style.backgroundColor = "grey";
    document.getElementById("create").style.border = "1px solid grey"
    document.getElementById("create").style.color = "white"
  }
}


if (button) {
  var inputs = document.querySelectorAll('.input');
  var check = true;
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', function() {
      check = true;
      for (let j = 0; j < inputs.length; j++) {
        var minlength = parseInt(inputs[j].getAttribute('data-length'));
        if (minlength > inputs[j].value.length) {
          check = false;
        }
      }
      if (check) {
        button.classList.remove('off');
      } else {
        button.classList.add('off');
      }
    });
  }
}