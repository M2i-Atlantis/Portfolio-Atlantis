const alertElement = document.getElementById('alertBox');

if (alertElement) {

  function hideElement() {
    alertElement.style.display = "none";
  }

  setTimeout(hideElement, 5000);
}
