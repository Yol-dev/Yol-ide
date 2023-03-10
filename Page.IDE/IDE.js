
  function BP_color() { // fonction appele par le boutton 
    if(document.getElementById('color').style.display == "flex"){ //lorsque que tu click, si on voit la div
    document.getElementById('color').style.display = "none";// tu la cache
    }
      else{
      document.getElementById('color').style.display = "flex";//sinon affiche la div
      }       
    }
