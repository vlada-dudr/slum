<?php
class User extends DB {
	public function showUsers() {
		$query = $this->connect()->query("SELECT * FROM users");
		while ($row = $query->fetch()) {
			$uid = $row['username'];
			return $uid;
		}
	}
}
