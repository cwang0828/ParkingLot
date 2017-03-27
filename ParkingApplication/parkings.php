<?php
	if (isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = 'list';
	if (!isset($db)) {
		require('dbconnect.php');
		$db = get_connection();
	}

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Parking Application</title>
	<link rel="stylesheet" href="styles/main.css">
</head>

<body>
<?php include('header.php'); ?>

  <section>
  <?php
  	switch($action) {
			case 'list':
				include('lot_list.php');
				break;
			case 'spacelist':
				include('space_list.php');
				break;
			case 'stafflist':
				include('staff_list.php');
				break;
			case 'avail_spacelist':
				include('available_space_list.php');
				break;
			case 'reserve_stafflist':
				include('reservation_staff_list.php');
				break;
			case 'reserve_visitorlist':
				include('reservation_visitor_list.php');
				break;
			case 'add':
				include('lot_add.php');
				break;
			case 'addspace':
				include('space_add.php');
				break;
			case 'addstaff':
				include('staff_add.php');
				break;
			case 'editstaff':
				$staffNumber = $_POST['staffNumber'];
				$name = $_POST['name'];
				include('staff_edit.php');
				break;
			case 'updatestaff':
				include('update_staff_list.php');
				break;
			case 'reserve_addstaff':
				include('reservation_staff_add.php');
				break;

			case 'reserve_addvisitor':
				include('reservation_visitor_add.php');
				break;
			default:
	}
	?>
  </section>


</body>
</html>
