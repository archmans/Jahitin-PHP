<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "jahitin";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function deleteTailor($id) {
	global $conn;

	mysqli_query($conn, "delete from tailor where tailorID = $id");
	return mysqli_affected_rows($conn);
}

function uploadGambar($parameter) {
	$namaFile = $_FILES[$parameter]['name'];
	$ukuranFile = $_FILES[$parameter]['size'];
	$error = $_FILES[$parameter]['error'];
	$tmpName = $_FILES[$parameter]['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Upload gambar dengan format jpg, jpeg, atau png!');
			</script>";
		return false;
	}

	if( $ukuranFile > 5 * 1024 * 1024 ) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!, maksimal 5MB');
			</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	var_dump($namaFileBaru);

	if (move_uploaded_file($tmpName, '../img/' . $namaFileBaru)) {
		return $namaFileBaru;
	} else {
		echo "<script>
				alert('Gagal mengunggah gambar!');
			</script>";
		return false;
	}
}

function uploadVid($parameter) {
	$namaFile = $_FILES[$parameter]['name'];
	$ukuranFile = $_FILES[$parameter]['size'];
	$error = $_FILES[$parameter]['error'];
	$tmpName = $_FILES[$parameter]['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
				alert('Pilih video terlebih dahulu!');
			</script>";
		return false;
	}

	$ekstensiVideoValid = ['mp4', 'mkv', 'avi'];
	$ekstensiVideo = explode('.', $namaFile);
	$ekstensiVideo = strtolower(end($ekstensiVideo));
	if( !in_array($ekstensiVideo, $ekstensiVideoValid) ) {
		echo "<script>
				alert('Upload video dengan format mp4, mkv, atau avi!');
			</script>";
		return false;
	}

	if( $ukuranFile > 10 * 1024 * 1024 ) {
		echo "<script>
				alert('Ukuran video terlalu besar!, maksimal 10MB');
			</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiVideo;
	var_dump($namaFileBaru);

	if (move_uploaded_file($tmpName, '../vid/' . $namaFileBaru)) {
		return $namaFileBaru;
	} else {
		echo "<script>
				alert('Gagal mengunggah gambar!');
			</script>";
		return false;
	}
}


function addTailor($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
    $jenis = htmlspecialchars($data["jenis"]);

	// upload gambar
	$foto = 'foto_tailor';
	$foto_tailor = uploadGambar($foto);
	if( !$foto_tailor ) {
		return false;
	}

	// upload video
	$video = 'video_tailor';
	$video_tailor = uploadVid($video);
	if( !$video_tailor ) {
		return false;
	}

	$sql = "INSERT INTO tailor (nama, alamat, jenis, foto_tailor, video_tailor)
			VALUES ('$nama', '$alamat', '$jenis', '$foto_tailor', '$video_tailor')";

	mysqli_query($conn, $sql);
	return mysqli_affected_rows($conn);
}


function updateTailor($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $foto_tailor = htmlspecialchars($data["foto_tailor"]);
    $video_tailor = htmlspecialchars($data["video_tailor"]);
	var_dump($id);
	var_dump($nama);
	$sql = "UPDATE tailor SET
                nama = '$nama',
                alamat = '$alamat',
                jenis = '$jenis',
                foto_tailor = '$foto_tailor',
                video_tailor = '$video_tailor'
			WHERE
				tailorID = $id
			";

	mysqli_query($conn, $sql);
	return mysqli_affected_rows($conn);
}

function search($keword) {
	$query = "SELECT * FROM tailor 
				WHERE 
					nama LIKE '%$keword%' OR
					alamat LIKE '%$keword%' OR
					jenis LIKE '%$keword%'
			";
	return query($query);
}
?>