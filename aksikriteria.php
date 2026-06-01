<!DOCTYPE html>
<html>
<head>
	<title>CRUD Ubah Kriteria</title>
</head>
<body>

<?php
// --- koneksi ke database
include 'koneksi.php';
// --- Fngsi tambah data (Create)
function tambah($db){
	
	include 'koneksi.php';
    if (isset($_POST['btn_tambah'])) {
        $idkriteria = $_POST['id_kriteria'];
        $nmkriteria = $_POST['nm_kriteria'];
        // $tipe = $_POST['tipe'];
        //variabel query adalah variabel yang menyimpan perintah sql dml
        $query = mysqli_query($db, "INSERT INTO kriteria (id_kriteria,nm_kriteria) VALUES ('$idkriteria', '$nmkriteria')");
        if ($query) {
            header("location:index.php?page=kriteria");
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
		$id = $_POST['id_kriteria'];
        $nama = $_POST['nm_kriteria'];
        // $tipe = $_POST['tipe'];
 
        mysqli_query($db, "UPDATE kriteria SET nm_kriteria='$nama' WHERE id_kriteria='$id'");
 
        echo (mysqli_error($db));

 
        header("location:index.php?page=kriteria");
	}
	
	// tampilkan form ubah
	if(isset($_GET['id_kriteria'])){
        $id = $_GET['id_kriteria'];
	    $query_mysql = mysqli_query($db,"SELECT * FROM kriteria WHERE id_kriteria='$id'");
        while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
            <form action="" method="POST">
				<h2>Mengubah Isi Tabel</h2>
			<table>
			<tr>
				<td>Nama Kriteria</td>
				<td>
					<input type="hidden" name="id_kriteria" value="<?php echo $data['id_kriteria'] ?>">
					<input type="text" name="nm_kriteria" value="<?php echo $data['nm_kriteria'] ?>">
				</td>
				<!-- <td>Tipe</td>
				<td>
					<select name="tipe" id="tipe">
						<option value="Cost">Cost</option>
						<option value="Benefit">Benefit</option>
					</select>
				</td>					 -->
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
	if (isset($_GET['id_kriteria']) && isset($_GET['aksi'])) {
        $id_siswa    =$_GET['id_kriteria'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id_siswa) && $id_siswa != "") {
        $hapus =mysqli_query($db, "DELETE FROM kriteria WHERE id_kriteria='$id_siswa'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete data berhasil ...');
                document.location='./';  
                </script>
            <?php        
    }
	header("location:index.php?page=kriteria");

	
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
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
			tambah($db);
	}
} else {
	tambah($db);
	// tampil_data($db);
}

if(isset($_GET['page'])){
	$page = $_GET['page'];
	switch ($page) {
		case 'insertKriteria':
			include "insertKriteria.html";
			break;
		case 'kriteria':
			include "kriteria.php";
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