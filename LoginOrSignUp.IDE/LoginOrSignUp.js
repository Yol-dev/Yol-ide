function changeStyle() {
    var link = document.getElementsByTagName("link")[0];
    if (link.getAttribute("href") == "LoginOrSignUp1.css") {
      link.setAttribute("href", "LoginOrSignUp2.css");
    } else {
      link.setAttribute("href", "LoginOrSignUp1.css");
    }
  }