<?php
function connect() {
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_rumahkos-lama";

  $konek = mysqli_connect($hostname, $username, $password, $dbname);	
  return $konek;
}

  function getRatingByidkos($konek, $idkos) {
  $query = "SELECT SUM(vote) as vote, COUNT(vote) as count from rating WHERE idkos = $idkos";

      $result = mysqli_query($konek, $query);
      $resultSet = mysqli_fetch_assoc($result);
      if($resultSet['count']>0) {
        return ($resultSet['vote']/$resultSet['count']);
      } else {
        return 0;
      }
}

if(isset($_REQUEST['type'])) {
	if($_REQUEST['type'] == 'save') {
		$vote = $_REQUEST['vote'];
		$idkos = $_REQUEST['idkos'];
	      $query = "INSERT INTO rating (idkos, vote) VALUES ('$idkos', '$vote')";
	      $konek = connect();
	      $result = mysqli_query($konek, $query);
	      echo 1; exit;
	} 
}
?>