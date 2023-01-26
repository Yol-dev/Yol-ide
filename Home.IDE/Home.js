function changeStyle() {
    var link = document.getElementsByTagName("link")[0];
    if (link.getAttribute("href") == "Home1.css") {
      link.setAttribute("href", "Home2.css");
    } else {
      link.setAttribute("href", "Home1.css");
    }
  }