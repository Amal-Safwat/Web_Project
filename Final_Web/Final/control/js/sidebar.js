var sidebar = document.getElementById("sidebar");
var mainBody = document.getElementById("main-body");
var menuButton = document.getElementById("menu-button");
var sidebarCheck = 0;

function openSidebar() {
  if (sidebarCheck == 0) { // sidebar closed then open
    sidebar.style.width = "220px";
    if (mainBody) {
      mainBody.style.right = "220px";
    }
    menuButton.classList.add("menu-close");
    sidebarCheck = 1;
  } else {
    sidebar.style.width = "0";
    if (mainBody) {
      mainBody.style.right = "0";
    }
    menuButton.classList.remove("menu-close");
    sidebarCheck = 0;
  }
}

function dropButton(e) {
  if (e.classList.contains("open")) {
    e.classList.remove("open");
  } else {
    e.classList.add("open");
  }
}

function animateBody() {
  var body = document.getElementsByClassName("main-body")[0];
  if (body) {
    body.style.opacity = 1;
  }
}

window.onload = animateBody;