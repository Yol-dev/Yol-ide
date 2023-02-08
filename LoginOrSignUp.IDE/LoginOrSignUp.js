$(document).ready(function () {
  $(".switch").on("click", function () {
    $(".toggle-btn").toggleClass("active");
    changeStyle();
   });
});

function changeStyle() {
  var link = document.getElementsByTagName("link")[0];
  if (link.getAttribute("href") == "LoginOrSignUp1.css") {
      document.body.classList.add("fade-out");
      setTimeout(() => {
          link.setAttribute("href", "LoginOrSignUp2.css");
          document.body.classList.remove("fade-out");
      }, 500);
  } else {
      document.body.classList.add("fade-out");
      setTimeout(() => {
          link.setAttribute("href", "LoginOrSignUp1.css");
          document.body.classList.remove("fade-out");
      }, 500);
  }
}

function BP_1() { // fonction appele par le boutton 
    if(document.getElementById('2').style.display == "flex"){ //lorsque que tu click, si on voit la div
    document.getElementById('2').style.display = "none";// tu la cache
    document.getElementById('1').style.display = "flex";
    }
      else{
      document.getElementById('2').style.display = "flex";// affiche la div
      document.getElementById('1').style.display = "none";
      }
  }
