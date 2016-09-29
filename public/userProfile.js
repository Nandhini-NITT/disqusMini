window.onload=function(){

getUserWebsites();
};

function getUserWebsites()
{
var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
      document.getElementById('userWebsites').innerHTML=this.responseText;
 
    }
  };
  xhttp.open("GET", "/getUserWebsites/", true);
  xhttp.send();
}
function findthreads(website_id)
{
	var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     	document.getElementById('thread'+website_id).innerHTML="Thread ";
      document.getElementById('thread'+website_id).innerHTML+=this.responseText;
 
    }
  };
  xhttp.open("GET", "/fetchthreads/"+website_id, true);
  xhttp.send();
}
function showComments(thread_id)
{
	alert('showComments');
	alert(document.getElementById('comment'+thread_id));
	var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
      document.getElementById('comment'+thread_id).innerHTML=this.responseText;
 
    }
  };
  xhttp.open("GET", "/fetchComments/"+thread_id, true);
  xhttp.send();
	}