<?php
    if(isset($_GET['create'])){
        $fname=$_GET['fname'];
        $lname=$_GET['lname'];
        $email=$_GET['email'];
        $password=$_GET['password'];
        $about=$_GET['about'];
        $checked=0;
        $emailchecked=0;
        $a=0;
        for($i=0;$i<strlen($email);$i++){
          if($email[$i]=='.') break;
          if($email[$i]=='@'&&$i==0) break;
          if($email[$i]=='@'){
            for($j=$i+2;$j<strlen($email);$j++){
              if($email[$j]=='.'&&($j==$i+1||$j==strlen($email)-1)) {
                $a=0;
                break;
              }
              if($email[$j]=='@'){
                $a=0;
                break;
              }
              if($email[$j]=='.'){
                $a++;
              }
            }
            if($a==1) $emailchecked=1;
            break;
          }
        }
        if(strlen($fname)<2){
          echo '<script>alert("Fist name is too short!")</script>';
        } elseif(strlen($fname)>30){
          echo '<script>alert("Fist name is too long!")</script>';
        } elseif(strlen($lname)<2){
          echo '<script>alert("Last name is too short!")</script>';
        } elseif(strlen($lname)>30){
          echo '<script>alert("Last name is too long!")</script>';
        } elseif(empty($_GET['radio1'])){
          echo '<script>alert("Please choose your gender!")</script>';
        } elseif($emailchecked!=1){
          echo '<script>alert("Synctax error in email!")</script>';
        } elseif(strlen($password)<2){
          echo '<script>alert("Password is too short!")</script>';
        } elseif(strlen($password)>30){
          echo '<script>alert("Password is too long!")</script>';
        } elseif(strlen($about)>10000){
          echo '<script>alert("About is too long!")</script>';
        } else{
          echo '<script>alert("Complete!\n Press OK to continue!")</script>';
        }
    }
    else{
      include 'index.html';
    }
?>