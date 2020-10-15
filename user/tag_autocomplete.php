<?php  
	if (isset($_GET['term']))
	{
		require_once("../config/connection.php");

		$tab = "";
		
		$req = $db->query("SELECT DISTINCT tag1 FROM user WHERE tag1 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();
		foreach ($res as $key) {
			$tab[] = $key[0];
		}

		$req = $db->query("SELECT DISTINCT tag2 FROM user WHERE tag2 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();
		foreach ($res as $key) {
			$tab[] = $key[0];
		}

		$req = $db->query("SELECT DISTINCT tag3 FROM user WHERE tag3 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();
		foreach ($res as $key) {
			$tab[] = $key[0];
		}

		// Removes duplicate tags from the $tab 
		$tab = array_unique($tab);
		print json_encode($tab);
	}
?>