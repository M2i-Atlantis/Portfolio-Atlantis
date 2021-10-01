const alertElement = document.getElementById('alertBox');

if (alertElement) {

  function hideElement() {
    alertElement.style.visibility = "hidden";
  }

  setTimeout(hideElement, 5000);
}
