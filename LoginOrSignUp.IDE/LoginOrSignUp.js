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



document.addEventListener("DOMContentLoaded", function() {
    const icon = document.getElementById("icon");
    icon.addEventListener("click", function() {
        if(icon.getAttribute("name") === "moon-outline") {
            setTimeout(() => {
                icon.setAttribute("name", "sunny-outline");
            }, 500);
        } else {
            setTimeout(() => {
                icon.setAttribute("name", "moon-outline");
            }, 500);
        }
    });
});

function BP_1() { // fonction appele par le boutton 
    if(document.getElementById('2').style.display == "block"){ //lorsque que tu click, si on voit la div
    document.getElementById('2').style.display = "none";// tu la cache
    document.getElementById('1').style.display = "block";
    }
      else{
      document.getElementById('2').style.display = "block";// affiche la div
      document.getElementById('1').style.display = "none";
      }       
  }