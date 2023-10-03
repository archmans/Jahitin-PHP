<?php
require '../controller/functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM tailor 
                WHERE 
                    nama LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%' OR
                    jenis LIKE '%$keyword%'
                    ";
$tailor = query($query);

?>

<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>No</th>
		<th>Action</th>
		<th>Name</th>
		<th>Address</th>
		<th>Category</th>
		<th>Picture</th>
		<th>Video</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $tailor as $row ) { ?>
	<tr>
		<td><?= $i; ?></td>
		<td><a href="controller/updateTailor.php?id=<?php echo $row["tailorID"]; ?>">Update</a> | <a href="controller/deleteTailor.php?id=<?php echo $row["tailorID"]; ?>" onclick="return confirm('yakin?')">Delete</a> | <a href="reviewPage.php?id=<?php echo $row["tailorID"]; ?>">Review</a></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["jenis"]; ?></td>
        <td>
			<img src="img/<?= $row["foto_tailor"]; ?>" height="240">
		</td>
        <td>
			<video src="vid/<?= $row["video_tailor"]; ?>" width="427" height="240" controls>
		</td>
	</tr>
	<?php $i++; ?>
	<?php } ?>
</table>
