<?php 
require 'Artikel.php';
/**
 * 
 */
class Struktur extends Artikel
{
	
	public function getListStruktur()
	{
		return $this->getList("SELECT * FROM struktur");
	}

	public function getJabatanStruktur($jabatan)
	{
		return $this->getList("SELECT * FROM struktur WHERE jabatan = '$jabatan'");
	}

	public function insertStruktur($nama,$jabatan)
	{
		$insert = $this->query("INSERT INTO struktur (nama,jabatan) VALUES ('$nama','$jabatan')");
		if ($insert) {
			echo "<script>alert('Struktur berhasil ditambahkan!');document.location.href='about.php'</script>";
		}else{
			echo "<script>alert('Struktur gagal ditambahkan!');document.location.href='about.php'</script>";
		}
	}

	public function updateStruktur($nama,$jabatan,$id)
	{
		$update = $this->query("UPDATE struktur SET nama = '$nama', jabatan = '$jabatan' WHERE id = $id ");
		if ($update) {
			echo "<script>alert('Struktur berhasil diedit!');document.location.href='about.php'</script>";
		}else
		{
			echo "<script>alert('Struktur gagal diedit!');document.location.href='about.php'</script>";
		}
	}

	public function deleteStruktur($id)
	{
		$delete = $this->query("DELETE FROM struktur WHERE id = $id");
		if ($delete) {
			echo "<script>alert('Struktur berhasil dihapus!');document.location.href='about.php'</script>";
		} else {
			echo "<script>alert('Struktur gagal dihapus!');document.location.href='about.php'</script>";
		}
		
	}
}

 ?>