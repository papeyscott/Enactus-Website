<?php
class Utils{

public static function getCampusByID($dbconn, $sf_id){
			$stmt = $dbconn->prepare("SELECT * FROM alumni WHERE id=:sid");
			$stmt->bindParam(":sid", $sf_id);

			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_BOTH);

			return $row;

	}


}
	?>