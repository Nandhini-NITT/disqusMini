
window.onload=function(){
getComments();
};
function getComments()
{
var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("comment_thread").innerHTML = this.responseText;
      alert(this.responseText);
    }
  };
  xhttp.open("GET", "/getComments", true);
  xhttp.send();
  }
 