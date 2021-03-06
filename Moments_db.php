<?php
class Moments_db {
	var $database;
	function __construct($db) {
		$this->database = $db;
	}

	function get_item($sql, $item_name) {
        $result = $this->database->do_query($sql);
        $item = "";
        while ($row = mysqli_fetch_array($result)) {
            $item = $row[$item_name];
        }
        return $item;
	}

	function insert_new_mom($string_id, $session_id, $ip_address, $name, $mom, $user) {
		$sql = "INSERT INTO moments VALUES (DEFAULT, '".$string_id."', '".$session_id."', '".$ip_address."', CURRENT_TIMESTAMP, '".$name."', ".$user.", '".$mom."');";
        $result = $this->database->do_query($sql);
	}

	function get_all_moms() {
		$sql = "SELECT name, date_added, mom FROM moments ORDER BY date_added DESC;";
        $result = $this->database->do_query($sql);
        return $result;
	}

	function add_name($string_id, $name) {
		$name = str_replace("'", "", $name);
		$sql = "UPDATE visitors SET name = '".$name."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function add_question($string_id, $question) {
		$question = str_replace("'", "", $question);
		$sql = "UPDATE visitors SET question = '".$question."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function add_whyhere($string_id, $whyhere) {
		$whyhere = str_replace("'", "", $whyhere);
		$sql = "UPDATE visitors SET whyhere = '".$whyhere."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function add_inspiration($string_id, $inspiration) {
		$inspiration = str_replace("'", "", $inspiration);
		$sql = "UPDATE visitors SET inspiration = '".$inspiration."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function add_qcf($string_id, $qcf) {
		$qcf = str_replace("'", "", $qcf);
		$sql = "UPDATE visitors SET qcf = '".$qcf."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function add_email($string_id, $email) {
		$email = str_replace("'", "", $email);
		$sql = "UPDATE visitors SET email = '".$email."' WHERE string_id = '".$string_id."';";
        $result = $this->database->do_query($sql);
	}

	function get_name($string_id) {
		$sql = "SELECT name FROM visitors WHERE string_id = '".$string_id."';";
		return $this->get_item($sql, 'name');
	}

	function get_inspiration($string_id) {
		$sql = "SELECT inspiration FROM visitors WHERE string_id = '".$string_id."';";
		return $this->get_item($sql, 'inspiration');
	}
}
?>