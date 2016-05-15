<?php
function genreName($genreid) {
	global $conn;
	$genrename = "SELECT name FROM genre WHERE id = '$genreid'";
	$result = $conn->query($genrename);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row['name'];
		}
	}
}

function subcatName($subcatid) {
	global $conn;
	$subcatname = "SELECT name FROM subcategory WHERE ID = '$subcatid'";
	$result = $conn->query($subcatname);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row['name'];
		}
	}
}

function getSubcats($subcatid) {
	global $conn;
	$getparent = "SELECT parentid FROM subcategory WHERE ID = '$subcatid'";
	$result = $conn->query($getparent);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$parent = $row['parentid'];
			
		}
	}
	
	$getsubcats = "SELECT ID, name FROM subcategory WHERE parentid = '$parent'";
	$result2 = $conn->query($getsubcats);
	
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			echo "<option value=\"" . $row['ID'] . "\">" . $row['name'] . "</option>";
		}
	}
}

function songAmount() {
	global $conn;
	$songcount="SELECT ID FROM songs ORDER BY ID";
	if ($result=mysqli_query($conn,$songcount)){
		$rowcount=mysqli_num_rows($result);
		printf($rowcount);
		mysqli_free_result($result);
	}
}

?>