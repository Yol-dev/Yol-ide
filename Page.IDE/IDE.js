function changeStyle() {
    var link = document.getElementsByTagName("link")[0];
    if (link.getAttribute("href") == "IDE1.css") {
      link.setAttribute("href", "IDE2.css");
    } else {
      link.setAttribute("href", "IDE1.css");
    }
  }