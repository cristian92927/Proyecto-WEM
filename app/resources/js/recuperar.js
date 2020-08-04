function validatePassword() {
  var pass1 = document.getElementById("newpw").value;
  var pass2 = document.getElementById("confirmpw").value;
  pass1 != pass2 
  ? document.getElementById("confirmpw").setCustomValidity("Las contraseñas no coinciden") 
  : document.getElementById("confirmpw").setCustomValidity('');
}
document.getElementById("resetPw").onclick = validatePassword;