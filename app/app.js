function sidebarActive() {
  var sidebarEffects = [
    document.getElementsByClassName("sidebar")[0],
    document.getElementsByClassName("main-content")[0]
  ];

  for (let i=0; i<sidebarEffects.length; i++) {
    sidebarEffects[i].classList.toggle("sidebar-active");
  }
}

function darkModeActive() {
  var body = document.getElementsByTagName("body")[0];
  body.classList.toggle("dark");
}

function notAvailableAlert() {
  alert("Coming Soon!\nPage not available yet.");
}
