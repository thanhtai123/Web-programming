<?php
  $username1 = $_POST['username'];
  $password1 = $_POST['password'];
  $usernameck='';
  $passwordck='';
  if (isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
    $usernameck=$_COOKIE["username"];
    $passwordck=$_COOKIE["password"];
  }
  if($username1!='lab9'||$password1!='123'){
    if($usernameck=='lab9'&&$passwordck=='123'){
      echo '<h4>This is info page</h4>';
      echo '<form>
              <input type="button" value="Logout" class="btn btn-primary" onclick="logout_page()">
            </form>';
    }
    else{
      include('login.php');
    }
  } else {
    setcookie('username',$username1);
    setcookie('password',$password1);
    echo '<h4>This is info page</h4>';
    echo '<form>
            <input type="button" value="Logout" class="btn btn-primary" onclick="logout_page()">
          </form>';
  }
?>