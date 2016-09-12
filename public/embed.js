
window.onload=function(){
getComments();
};
function getComments()
{
var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("comment_thread").innerHTML = this.responseText;
      document.getElementById('comment').innerHTML=this.responseText;
 
    }
  };
  xhttp.open("GET", "http://0c4165a8.ngrok.io/getComments/"+website_name+"/"+identifier, true);
  xhttp.send();
  }
 function addComment(id)
 {
 	alert('entered js function');
 	window.location= "http://0c4165a8.ngrok.io/addComment/"+id+"/"+document.getElementById('usercomment').value;
  }
 
 