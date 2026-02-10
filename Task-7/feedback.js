function highlight(el) {
  el.classList.add("highlight");
}

function unhighlight(el) {
  el.classList.remove("highlight");
}

function validateName() {
  let name = document.getElementById("name").value;
  showError(name.length < 3 ? "Name must be at least 3 characters" : "");
}

function validateEmail() {
  let email = document.getElementById("email").value;
  let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  showError(!pattern.test(email) ? "Invalid email format" : "");
}

function validateMessage() {
  let msg = document.getElementById("message").value;
  showError(msg.length < 5 ? "Message too short" : "");
}

function showError(msg) {
  document.getElementById("error").innerHTML = msg;
}

function submitForm() {
  let error = document.getElementById("error").innerHTML;
  if (error === "") {
    alert("Feedback submitted successfully");
  } else {
    alert("Fix errors before submitting");
  }
}
