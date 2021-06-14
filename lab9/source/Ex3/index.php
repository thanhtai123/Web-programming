<!doctype html>
<html lang="en">

<head>
    <title>Ex3</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="script/jquery-1.9.1.min.js"></script>
    <script>
    
      function login_page(){
        var iusername=getCookie("username");
        var ipassword=getCookie("password");
        if(iusername==0){
          getpage("form/login.php");
        } else{
          alert("auto login with:\n Username: "+iusername+"\n Password: "+ipassword);
          getpagepost("form/info.php",iusername,ipassword);
        }
      }
      function getpage(pageurl){
        $.ajax({
          // The link we are accessing.
          url: pageurl,
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
		      }
      	});
      }

      function getpagepost(strinurl,iusername,ipassword){
        var datap = 'username='+iusername+'&password='+ipassword;
        $.ajax({
          type: "POST",
          url: strinurl,
          dataType: "html",
          data: {username: iusername, password: ipassword},
          success: function (strData) {
            document.getElementById("content").innerHTML = strData;
          }
        });
      }

      function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }
      function submit_login(){
        var eusername = $("#username").val();
        var epassword = $("#password").val();
        if(eusername==0||epassword==0){
          alert("please type username or password");
        } else{
          setCookie("username",eusername,5);
          setCookie("password",epassword,5);
          getpagepost("form/info.php",eusername,epassword);
        }
      }

      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function logout_page(){
        setCookie("password","12",-1);
        setCookie("username","12",-1);
        getpage('form/logout.php');        
      }

      function infor_page(){
        var iusername=getCookie("username");
        var ipassword=getCookie("password");
        getpagepost('form/info.php',iusername,ipassword);
      }
    </script>
    
    <style>
      #content{
        margin-top: 10px;
      }
      table{
        width: 100%;
      }
    </style>
</head>

<body>
    <div class="container">
      <form>
        <input type="button" value="Login page" class="btn btn-primary" onclick="login_page()">
        <input type="button" value="info page" class="btn btn-primary" onclick="infor_page()">
      </form>
    </div>
    <div class="container" id="content"></div>
</body>

</html>