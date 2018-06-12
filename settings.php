<?php
session_start();
if (isset($_SESSION['is_login']) && !empty($_SESSION['is_login'])) {
	$is_session_log = true;
	$ss_in = $_SESSION['is_login'];
}else{
	$is_session_log = false;
}
?>