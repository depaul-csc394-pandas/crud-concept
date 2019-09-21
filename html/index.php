<!doctype html>
<html>
 <head>
  <title>Test page</title>
 </head>
 <body>
  <h1>Hello, world!</h1>
  <form action="#" method="post">
   Team name: <input type="text" name="team_name"><input type="submit" value="Submit">
  </form>
  <?php
  require("/var/www/php/database.php");
  $conn = Pandas\db_connect("volleyball");
  if (isset($_POST["team_name"])) {
      Pandas\db_insert_team($conn, $_POST);
  }

  $teams = Pandas\db_get_all_teams($conn);
  if ( mysqli_num_rows($teams) > 0 ) {
    while ( $row = $teams->fetch_assoc()) {
    ?>
      <p><?=$row["team_name"]?></p>
    <?php
    }
  }
  mysqli_close($conn);
  ?>
 </body>
</html>
