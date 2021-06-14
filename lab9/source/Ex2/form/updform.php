<?php
  echo '<label for="cars">Choose a key:</label>
        <select id="cars" name="carlist" form="carform">';
  echo  ' </select>';
  
  echo '<form id="carform">
  <input type="text" name="name" placeholder="value" id="valueUpd">
  <input type="text" name="year" placeholder="days to store (option)" id="dateUpd">
  <input type="button" name="submit" id="submit55" value="submit update" class="btn btn-primary" onclick="submit_updform()">
  </form>';
?>