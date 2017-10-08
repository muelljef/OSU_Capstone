<?php
    //Turn on error reporting
    ini_set('display_errors', 'On');

	//TEMP value (database from a previous class)
	//we'll change this to connect to Employee recognition db
    //Connects to the database
    $mysqli = new mysqli("oniddb.cws.oregonstate.edu","kuenstir-db","4jgIGJ2KQMnNGthS","kuenstir-db");

?>

<!DOCTYPE html>

<html>
<head>
 
	<title>Employee Recognition Application</title>

	<link rel="stylesheet" type="text/css" href="style.css" /> 
   
</head>

<body>

<div id="bodyDiv">
	
		<table id="spacingTable">
		<tr>
		<td width="10%"; id="logo">
		<a href="cindex.php">
		<img src = "resources/fakelogo.png" alt="Company Logo" style="width:100%;height:100%;"></a>
		</td>
		
		<td width="88%" id="navBar">
		
		<ul>
		  <li><a href="account.php">Account</a></li>
		  <li><a href="awards.php">My Awards</a></li>
		  <li><a href="nominate.php">Nominate</a></li>
		  <li style="float:right"><a class="active" href="login.php">Sign Out</a></li>
		</ul>
		
		</td>
		</tr>
		</table>

	
	
	<div id="pageDiv">
	
		<!-- Get username -->
				<table id="table">
					<tr>
					<b>Welcome, </b>
					
				<?php
				if(!($stmt = $mysqli->prepare("SELECT Recipes.name FROM Recipes WHERE Recipes.ID = 1"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}

				if(!$stmt->execute()){
					echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$stmt->bind_result($name)){
					echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while($stmt->fetch()){
				 echo $name;
				}
				$stmt->close();
				?>
				
				</tr>
				</table>

	</div>
	<p>
	
	<table id="spacingTableBody">
	<tr>
	<td width="30%"; id="EMPhoto">
			<!-- Get awardee name -->
			<table id="table">
			<tr>
			Congratulations to
			<b>
		<?php
		if(!($stmt = $mysqli->prepare("SELECT Recipes.name FROM Recipes WHERE Recipes.ID = 2"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}

		if(!$stmt->execute()){
			echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$stmt->bind_result($name)){
			echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while($stmt->fetch()){
		 echo $name;
		}
		$stmt->close();
		?>
		</tr>
		</table>
		<!-- /Get awardee name -->		
		<p>
		<img src="resources/profile-icon.png" style="max-height:50%;">
				</b><br>
		Employee of the Month
	</td>
	<td width="65%" id="EMDesc" valign="middle" style="padding-right:25px">
				
				
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</td>
	</tr>
	</table>
	
	<p>
	
	<div id="scrollBox">
			<table width="100%" id="table">
			<tr>
				<td width="30%">
				Employee of the Week<p>
					<img src="resources/profile-icon.png" style="height:75%;width:75%">
				</td>
				
				<td width="40%">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</td>
			</tr>
			
						<tr>
				<td width="30%">
				Previous Winners:<p>
					<img src="resources/profile-icon.png" style="height:75%;width:75%">
				</td>
				
				<td width="40%">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</td>
			</tr>
			
						<tr>
				<td width="30%">
					<img src="resources/profile-icon.png" style="height:75%;width:75%">
				</td>
				
				<td width="40%">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</td>
			</tr>
			</table>
	</div>
	
			<table width="40%" id="table" style="float:right";>
			<tr>
				<td>
				<img src="resources/Employee-Appreciation-Card.png" width="80%" height="80%">
				</td>
			</tr>
			</table>

	</div><!-- bodydiv -->
</body>
</html>