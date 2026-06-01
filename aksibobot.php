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
        $idbobot = $_POST['id_bobot'];
        $idkriteria = $_POST['id_kriteria'];
        $valuebobot = $_POST['valuebobot'];
        //variabel query adalah variabel yang menyimpan perintah sql dml
        $query = mysqli_query($db, "INSERT INTO bobot (id_bobot,id_kriteria,valuebobot) VALUES ('$idbobot', '$idkriteria', '$valuebobot')");
        if ($query) {
            header("location:index.php?page=bobot");
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
		$id = $_POST['id_bobot'];
        $idkriteria = $_POST['id_kriteria'];
        $valuebobot = $_POST['valuebobot'];
 
        mysqli_query($db, "UPDATE bobot SET id_kriteria='$idkriteria', valuebobot='$valuebobot'  WHERE id_bobot='$id'");
 
        echo (mysqli_error($db));

 
        header("location:index.php?page=bobot");
	}
	
	// tampilkan form ubah
	if(isset($_GET['id_bobot'])){
        $id = $_GET['id_bobot'];
	    $query_mysql = mysqli_query($db,"SELECT * FROM bobot WHERE id_bobot='$id'");
        while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
            <form action="" method="POST">
				<h2>Mengubah Isi Tabel</h2>
			<table>
			<?php
            include 'koneksi.php';
            $kriteria = mysqli_query($db, "SELECT * FROM kriteria");
            ?>
				<td>Id Kriteria</td>
				<td>
					<input type="hidden" name="id_bobot" value="<?php echo $data['id_bobot'] ?>">
					<select name="id_kriteria" id="">
                                        <?php while($row= mysqli_fetch_array($kriteria)) { ?>
                                        <option value="<?=$row['id_kriteria']?>"><?=$row['nm_kriteria']?></option>
                                        <?php } ?>)
                                    </select>
				</td>
				<td>Tipe</td>
				<td>
					<input type="text" name="valuebobot" value="<?php echo $data['valuebobot'] ?>">
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
	if (isset($_GET['id_bobot']) && isset($_GET['aksi'])) {
        $id_siswa    =$_GET['id_bobot'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id_siswa) && $id_siswa != "") {
        $hapus =mysqli_query($db, "DELETE FROM bobot WHERE id_bobot='$id_siswa'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete data berhasil ...');
                document.location='./';  
                </script>
            <?php        
    }
	header("location:index.php?page=bobot");

	
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
		case 'insertKriteria':
			include "insertKriteria.html";
			break;
		case 'bobot':
			include "bobot.php";
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