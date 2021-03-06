<?php
/**
 * @Author: Prabhakar Gupta
 * @Date:   2016-01-31 13:02:57
 * @Last Modified by:   Prabhakar Gupta
 * @Last Modified time: 2016-02-05 03:48:23
 */

require_once '../inc/connection.inc.php';
require_once '../inc/login_functions.inc.php';
require_once '../inc/function.inc.php';

if(!isLoggedin()){
	header("Location: index.php");
}

?>
<select class="form-control" name="team_on_attack">
<?php
	
	$logged_in_user_id = $_SESSION['user_id'];
	$query = "SELECT `user_id`,`name` FROM `users` WHERE `user_id` != '$logged_in_user_id'";
	$query_run = mysqli_query($connection, $query);

	while($query_row = mysqli_fetch_assoc($query_run)){
		echo '<option value="' . (int)$query_row['user_id'] . '">' . clean_string($query_row['name'], false) . '</option>';
	}
	
?>
</select>
<br>
<input type="number" class="form-control" max="100" min="0" step="1" placeholder="Enter the percentage of army you want to put on defence" name="army_on_defence" required>