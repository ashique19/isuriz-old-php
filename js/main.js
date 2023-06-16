function menuFunction() {
  var x = document.getElementById("myLinks");
   var y = document.getElementById("icon");
  if (x.style.display === "block") {
    x.style.display = "none";
     y.style.backgroundColor = "white";
     y.style.color = "#019ff0";
  } else {
    x.style.display = "block";
      y.style.backgroundColor = "#019ff0";
      y.style.color = "#fff";
  }
}

function openCollage(evt, cityName) {
var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");

  if (cityName === 'showall') {

    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "block";
    }

  } else {

    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    document.getElementById(cityName).style.display = "block";

  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  evt.currentTarget.className += " active";

}
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
