<?php

include("connection.php");

if(!empty($_POST['id'])) {
	
  $q = "SELECT * FROM users WHERE id='$_POST[id]'";
  $r = mysqli_query($dbc, $q);
  
  if(mysqli_num_rows($r)>0) {
      //echo "<span class='status-not-available'> Username Not Available.</span>";
      
  }else{
      //echo "<span class='status-available'> Username Available.</span>";
      
  }

}
elseif(!empty($_POST['email'])){
	
  $q = "SELECT * FROM users WHERE email='$_POST[email]'";
  $r = mysqli_query($dbc, $q);
  
  if(mysqli_num_rows($r)>0) {
      //echo "<span class='status-not-available'> Email Not Available.</span>";
      
  }else{
      //echo "<span class='status-available'> Email Available.</span>";
      
  }
	
}

?>