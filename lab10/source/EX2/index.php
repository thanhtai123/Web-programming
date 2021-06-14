<!doctype html>
<html lang="en">

<head>
    <title>Lab10-Ex2</title>
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
        var data = '<form>'+
                  '<input type="text" id="idadd" placeholder="id">'+
                  '<input type="text" id="nameadd" placeholder="name" >'+
                  '<input type="text" id="yearadd" placeholder="year" >'+
                  '<input type="button" name="submit" id="submit5" value="submitAdd" class="btn btn-primary" onclick="submit_addform()">'+
                  '</form>';
        document.getElementById("content").innerHTML = data;
      }
      function delform(){
        $.ajax({
          // The link we are accessing.
          url: "form/func.php/delform",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "json",

          success: function( strData ){
            var json_object=strData;
            var data =  '<label for="cars">Choose a car:</label>'+
                        '<select id="cars" name="carlist" form="carform">'+
                        '<option value="0">NULL</option>';
            var i;
            for(i=0;i<json_object.length;i=i+1){
              data=data+'<option value="'+json_object[i].id+'">';
              data=data+ 'id: '+json_object[i].id+'__'+'name: '+json_object[i].name+'__'+'year: '+json_object[i].year;
              data=data+'</option>';
            }
            data+='</select>';
            data+='<form id="carform">'+
            '<input type="button" name="submit" id="submit6" value="submitDel" class="btn btn-primary" onclick="submit_delform()">'+
            '</form>';
            document.getElementById("content").innerHTML = data;
		      }
      	});
      }
      function updform(){
        $.ajax({
          // The link we are accessing.
          url: "form/func.php/updform",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "json",

          success: function( strData ){
            var json_object=strData;
            var data =  '<label for="cars">Choose a car:</label>'+
                        '<select id="cars" name="carlist" form="carform">'+
                        '<option value="0">NULL</option>';
            var i;
            for(i=0;i<json_object.length;i=i+1){
              data=data+'<option value="'+json_object[i].id+'">';
              data=data+ 'id: '+json_object[i].id+'__'+'name: '+json_object[i].name+'__'+'year: '+json_object[i].year;
              data=data+'</option>';
            }
            data+='</select>';
            data+='<form id="carform">'+
                  '<input type="text" name="name" placeholder="name" id="nameUpd">'+
                  '<input type="text" name="year" placeholder="year" id="yearUpd">'+
                  '<input type="button" name="submit" id="submit5" value="submitAdd" class="btn btn-primary" onclick="submit_updform()">'+
                  '</form>';
            document.getElementById("content").innerHTML = data;
		      }
      	});
      }
      function showform(){
        $.ajax({
          // The link we are accessing.
          url: "form/func.php/showform",
            
          // The type of request.
          type: "get",
            
          // The type of data that is getting returned.
          dataType: "json",

          success: function( strData ){
            var json_object = strData;
            var data = '<div class="table-wrapper-scroll-y my-custom-scrollbar"><table class="table">'+
                            '<thead>'+
                                '<tr>'+
                                '<th scope="col">ID</th>'+
                                '<th scope="col">Name</th>'+
                                '<th scope="col">Year</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody id="body_stable">';
                            
            for (var i = 0; i < json_object.length; i++) {
                data=data+'<tr>';
                data=data+'<th scope="row">';
                data=data+json_object[i].id;
                data=data+'</th>';
                data=data+'<td class="sname">';
                data=data+json_object[i].name;
                data=data+'</td>';
                data=data+'<td class="sdes">';
                data=data+json_object[i].year;
                data=data+'</td>';
                data=data+'</tr>';
            }
            data=data+'</tbody>';
            data=data+'</table></div>';
            document.getElementById("content").innerHTML = data;
		    
		      }
      	});
      }
      function submit_addform(){
        var id_sub = $("#idadd").val();
        var name_sub = $("#nameadd").val();
        var year_sub = $("#yearadd").val();
        var datacontent ='id='+id_sub+'&name='+name_sub+'&year='+year_sub;
        if(!id_sub){
          alert("please fill the id field!");
        } else if(!name_sub){
          alert("please fill the name field!")
        } else if(!year_sub){
          alert("please fill the year field!")
        } else{
          $.ajax({
          // The link we are accessing.
          url: "form/func.php/submitAdd",
            
          // The type of request.
          type: "post",

          data: datacontent,

          success: function( strData ){
            alert(strData)
            //document.getElementById("content1").innerHTML = strData;
		      }
      	});
        }
      }
      function submit_delform(){
       var idsub = $('#cars').val();
       var datacontent ='id='+idsub;
       if(idsub==''){
         alert("please choose the data to delete");
       }
       else{
        $.ajax({
          // The link we are accessing.
          url: "form/func.php/submitDel",
            
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
        if(idsub==''){
          alert('choose data to Update');
        } else if(namesub==0){
          alert('please fill the name');
        } else if(yearsub==0){
          alert('please fill the year');
        }
        else{
          $.ajax({
          // The link we are accessing.
          url: "form/func.php/submitUpd",
            
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