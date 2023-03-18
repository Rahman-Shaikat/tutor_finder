// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("reg_btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the options buttons
var studentBtn = document.getElementById("studentBtn");
var tutorBtn = document.getElementById("tutorBtn");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on an option button, redirect to corresponding page and close the modal
studentBtn.onclick = function() {
  window.location.href = "registration";
  modal.style.display = "none";
}

tutorBtn.onclick = function() {
  window.location.href = "t_reg";
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
