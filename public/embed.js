
window.onload=function(){
var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


getComments();
};
function getComments()
{
var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
      document.getElementById('comment').innerHTML=this.responseText;
 
    }
  };
  xhttp.open("GET", url+"/getComments/"+website_name+"/"+identifier, true);
  xhttp.send();
  }
 function addComment(id)
 {
 	
 	var xhttp=new XMLHttpRequest();
 	
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
 
    }
  };
  xhttp.open("GET", url+"/addComment/"+id+"/"+document.getElementById('usercomment').value, true);
  xhttp.send();
 }
  
 function login()
 {
 	alert('login function called');
 	if($('#login').is(':empty'))
 		$('#login').append('Username<input type="text" id="username"><br>Password<input type="password" id="password"><br><button type="submit" onClick="dologin();return false;">Submit</button>');
	else 
		$('#login').toggle();
 }
 function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
 function dologin()
 { 
 
 $.ajax({
            type: "POST",
            url: "http://003a5714.ngrok.io/loginOutside",
            data: { username:document.getElementById('username').value,password:document.getElementById('password').value},
            success:function(result){
            	if(isJson(result))
            	{
            		var errors=JSON.parse(result);
            if(typeof(errors.username=="undefined"))
            alert(errors.password);
            else if(typeof(errors.password)=="undefined")
            alert(errors.username);
           }
           else 
           	alert(result);
           	
           	if(result==="Logged in")
           		location.reload();
            }
            
        })

 }
 