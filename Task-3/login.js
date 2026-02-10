function validate() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let error = document.getElementById("error");

  error.innerHTML = "";

  if (email === "" || password === "") {
    error.innerHTML = "All fields are required";
    return false;
  }

  if (password.length < 4) {
    error.innerHTML = "Password must be at least 4 characters";
    return false;
  }

  return true;
}
