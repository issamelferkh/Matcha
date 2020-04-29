<?php  
	if (isset($_GET['term']))
	{
		require_once("../config/connection.php");
		$req = $pdo->query("SELECT i1 FROM users WHERE i1 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();

		foreach ($res as $key) {
			$tab[] = $key->i1;
		}
		$req = $pdo->query("SELECT i2 FROM users WHERE i2 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();

		foreach ($res as $key) {
			$tab[] = $key->i2;
		}
		$req = $pdo->query("SELECT i3 FROM users WHERE i3 LIKE '%" .addslashes($_GET['term']) ."%' LIMIT 2");
		$res = $req->fetchall();

		foreach ($res as $key) {
			$tab[] = $key->i3;
		}
		print json_encode($tab);
	}
?>