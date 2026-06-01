<!DOCTYPE html>
<html>
<head>
	<title>CRUD Petani Kode</title>
</head>
<body>

<?php
// --- koneksi ke database
include 'koneksi.php';
// --- Fngsi tambah data (Create)
function tambah($db){
	
	include 'koneksi.php';
    if (isset($_POST['btn_tambah'])) {
        $idskala = $_POST['idskala'];
        $value = $_POST['valueskala'];
        $keterangan = $_POST['keterangan'];
        //variabel query adalah variabel yang menyimpan perintah sql dml
        $query = mysqli_query($db, "INSERT INTO skala (idskala,valueskala,keterangan) VALUES ('$idskala', '$value', '$keterangan')");
        if ($query) {
            header("location:index.php?page=skala");
        } else {
            echo "Input Gagal";
        }
    }
	?> 

	<?php
}
// --- Tutup Fngsi tambah data
// --- Fungsi Baca Data (Read)

// --- Tutup Fungsi Baca Data (Read)
// --- Fungsi Ubah Data (Update)
function ubah($db){
	// ubah data
	if(isset($_POST['btn_ubah'])){
		$id = $_POST['idskala'];
        $valueskala = $_POST['valueskala'];
        $keterangan = $_POST['keterangan'];
 
        mysqli_query($db, "UPDATE skala SET valueskala='$valueskala', keterangan='$keterangan'  WHERE idskala='$id'");
 
        echo (mysqli_error($db));

 
        header("location:index.php?page=skala");
	}
	
	// tampilkan form ubah
	if(isset($_GET['idskala'])){
        $id = $_GET['idskala'];
	    $query_mysql = mysqli_query($db,"SELECT * FROM skala WHERE idskala='$id'");
        while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
            <form action="" method="POST">
				<h2>Mengubah Isi Tabel</h2>
			<table>
			<tr>
				<td>Value</td>
				<td>
					<input type="hidden" name="idskala" value="<?php echo $data['idskala'] ?>">
					<input type="text" name="value" value="<?php echo $data['valueskala'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>Keterangan</td>
				<td>
					<input type="text" name="keterangan" value="<?php echo $data['keterangan'] ?>">
				</td>					
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan" name="btn_ubah"></td>					
			</tr>				
		    </table>
			</form>

            <?php
            echo (mysqli_error($db));
        }
	}
	
}
// --- Tutup Fungsi Update
// --- Fungsi Delete
function hapus($db){
	if (isset($_GET['idskala']) && isset($_GET['aksi'])) {
        $id_siswa    =$_GET['idskala'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id_siswa) && $id_siswa != "") {
        $hapus =mysqli_query($db, "DELETE FROM skala WHERE idskala='$id_siswa'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete data berhasil ...');
                document.location='./';  
                </script>
            <?php        
    }
	header("location:index.php?page=skala");

	
}
// --- Tutup Fungsi Hapus
// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="index.php"> &laquo; Home</a>';
			tambah($db);
			break;
		case "update":
			ubah($db);
			break;
		case "delete":
			hapus($db);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($db);
	}
} else {
	tambah($db);
	// tampil_data($db);
}

if(isset($_GET['page'])){
	$page = $_GET['page'];
	switch ($page) {
		case 'insertAlternatif':
			include "insertAlternatif.html";
			break;
		case 'skala':
			include "skala.php";
			break;
		case 'tutorial':
			include "halaman/tutorial.php";
			break;			
		default:
			echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
			break;
	}
}else{
	
}
?>
</body>
</html>