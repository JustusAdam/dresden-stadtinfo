<?php
    $request = mysqli_query($db, "SELECT * FROM pois WHERE id = $id ");
	while($row = mysqli_fetch_object($request)){
		$text = $row->list;
		$heading = $row->name;
	}
?>
