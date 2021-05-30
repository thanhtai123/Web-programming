<!doctype html>
<html lang="en">

<head>
    <title>Ex6</title>
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
      function addform(){
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
      function delform(){
        $.ajax({
          // The link we are accessing.
          url: "form/delform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
		      }
      	});
      }
      function updform(){
        $.ajax({
          // The link we are accessing.
          url: "form/updform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
		      }
      	});
      }
      function showform(){
        $.ajax({
          // The link we are accessing.
          url: "form/showform.php",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            document.getElementById("content").innerHTML = strData;
		      }
      	});
      }
      function submit_addform(){
        var id_sub = $("#idadd").val();
        var name_sub = $("#nameadd").val();
        var year_sub = $("#yearadd").val();
        var datacontent ='action=submitAdd'+'&id='+id_sub+'&name='+name_sub+'&year='+year_sub;
        if(!id_sub){
          alert("please fill the id field!");
        } else if(!name_sub){
          alert("please fill the name field!")
        } else if(!year_sub){
          alert("please fill the year field!")
        } else{
          $.ajax({
          // The link we are accessing.
          url: "form/submit.php",
            
          // The type of request.
          type: "post",

          data: datacontent,
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            alert(strData)
            //document.getElementById("content1").innerHTML = strData;
		      }
      	});
        }
      }
      function submit_delform(){
       var idsub = $('#cars').val();
       var datacontent = 'action=submitDel'+'&id='+idsub;
       if(idsub==0){
         alert("please choose the data to delete");
       }
       else{
        $.ajax({
          // The link we are accessing.
          url: "form/submit.php",
            
          // The type of request.
          type: "post",

          data: datacontent,
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            alert(strData)
            //document.getElementById("content1").innerHTML = strData;
		      }
      	});
         
       }
      }
      function submit_updform(){
        var idsub = $('#cars').val();
        var namesub = $('#nameUpd').val();
        var yearsub = $('#yearUpd').val();
        var datacontent = 'action=submitUpd'+'&id='+idsub+'&name='+namesub+'&year='+yearsub;
        if(idsub==0){
          alert('choose data to Update');
        } else if(namesub==0){
          alert('please fill the name');
        } else if(yearsub==0){
          alert('please fill the year');
        }
        else{
          $.ajax({
          // The link we are accessing.
          url: "form/submit.php",
            
          // The type of request.
          type: "post",

          data: datacontent,
            
          // The type of data that is getting returned.
          dataType: "html",

          success: function( strData ){
            alert(strData)
            //document.getElementById("content1").innerHTML = strData;
		      }
      	});
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
            <input type="button" name="submit" id="submit1" value="Get" class="btn btn-primary" onclick="showform()">
            <input type="button" name="submit" id="submit2" value="Add" class="btn btn-primary" onclick="addform()">
            <input type="button" name="submit" id="submit3" value="Upd" class="btn btn-primary" onclick="updform()">
            <input type="button" name="submit" id="submit4" value="Del" class="btn btn-primary" onclick="delform()">
        </form>
    </div>
    <div class="container" id="content"></div>
    <div class="container" id="content1"></div>
</body>

</html>