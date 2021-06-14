<!doctype html>
<html lang="en">

<head>
    <title>Ex2</title>
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
      function showCookie(){
        var cookies1 = document.cookie;
        if(cookies1==''){
          strData='<h4>there is no cookie now!</h4>';
          document.getElementById("content").innerHTML = strData;
        } else{
          var theCookies = document.cookie.split(';');
          var aString = '';
          for (var i = 1 ; i <= theCookies.length; i++) {
            aString += i + ' ' + theCookies[i-1] + "\n";
          }
          alert(aString);
        }
      }
      function addCookie(){
        $.ajax({
          // The link we are accessing.
          url: "form/addform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
		      }
      	});
      }
      function submit_addck(){
        var key = $('#key').val();
        var value = $('#value').val();
        var exck = $('#exck').val();
        if(key==0){
          alert("please fill the key's field  of cookies");
        }
        else if(value==0){
          alert("please fill the value's field  of cookies");
        } else {
          var date = new Date();
          if(exck!=0){
            date.setTime(date.getTime()+(exck*24*60*60*1000));
          }
          else{
            date.setTime(date.getTime()+(24*60*60*1000));
          }
          var addcok =key+'='+value+'; expires='+date;
          document.cookie=addcok;
          alert('success!');
        }
      }
      function delCookie(){
        $.ajax({
          // The link we are accessing.
          url: "form/delform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
            var theCookies = document.cookie.split(';');
            var optiopVal;
            var optiopText;
            for (var i = 1 ; i <= theCookies.length; i++) {
              optiopVal=theCookies[i-1].split('=');
              optiopText = i + ': ' + theCookies[i-1];
              $('#cars').append('<option value="'+optiopVal[0]+'">'+optiopText+'</option>');
            }
		      }
      	});
      }
      function submit_delform(){
        var keydel = $('#cars').val();
        var date = new Date();
        date.setTime(date.getTime()+(-1*24*60*60*1000));
        var delck = keydel+'=; expires='+date;
        document.cookie=delck;
        alert("delete complete!");
        delCookie()
      }
      function submit_delformall(){
        var cookies = document.cookie.split(";");
        var date = new Date();
        date.setTime(date.getTime()+(-1*24*60*60*1000));
        for (var i = 0; i < cookies.length; i++) {
            var name = cookies[i];
            document.cookie = name + "=;expires="+date;
            document.cookie = name + ";expires="+date;
        }
        alert("ok");
      }
      function updCookie(){
        $.ajax({
          // The link we are accessing.
          url: "form/updform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
            var theCookies = document.cookie.split(';');
            var optiopVal;
            var optiopText;
            for (var i = 1 ; i <= theCookies.length; i++) {
              optiopVal=theCookies[i-1].split('=');
              optiopText = i + ': ' + theCookies[i-1];
              $('#cars').append('<option value="'+optiopVal[0]+'">'+optiopText+'</option>');
            }
		      }
      	});
      }
      function submit_updform(){
        var keyu = $('#cars').val();
        var date = new Date();
        var excku = $('#dateUpd').val();
        var valueu = $('#valueUpd').val();
        date.setTime(date.getTime()+(excku*24*60*60*1000));
        if(valueu==0){
          alert("please fill the value's field")
        } else if(excku==0){
          var upck = keyu+'='+valueu;
          document.cookie = upck;
          alert('only updated the value field');
        } else{
          var upck = keyu+'='+valueu+'; expires='+date;
          document.cookie = upck;
          alert('ok');
        }
        
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
            <input type="button" name="submit" id="submit1" value="Get" class="btn btn-primary" onclick="showCookie()">
            <input type="button" name="submit" id="submit2" value="Add" class="btn btn-primary" onclick="addCookie()">
            <input type="button" name="submit" id="submit3" value="Upd" class="btn btn-primary" onclick="updCookie()">
            <input type="button" name="submit" id="submit4" value="Del" class="btn btn-primary" onclick="delCookie()">
        </form>
    </div>
    <div class="container" id="content"></div>
</body>

</html>