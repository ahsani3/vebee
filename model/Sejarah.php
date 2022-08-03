<?php 
require 'Struktur.php';
/**
 * 
 */
class Sejarah extends Struktur
{
	
	public function getListSejarah()
	{
		return $this->getList("SELECT * FROM sejarah");
	}

	public function insertSejarah($teks)
	{
		$insert = $this->query("INSERT INTO sejarah (teks) VALUES ('$teks')");
		if ($insert) {
			echo "<script>alert('Sejarah berhasil ditambahkan!');document.location.href='sejarah.php'</script>";
		}else{
			echo "<script>alert('Sejarah gagal ditambahkan!');document.location.href='sejarah.php'</script>";
		}
	}

	public function updateSejarah($teks,$id)
	{
		$update = $this->query("UPDATE sejarah SET teks = '$teks' WHERE id = $id ");
		if ($update) {
			echo "<script>alert('Sejarah berhasil diedit!');document.location.href='sejarah.php'</script>";
		}else
		{
			echo "<script>alert('Sejarah gagal diedit!');document.location.href='sejarah.php'</script>";
		}
	}

	public function deleteSejarah($id)
	{
		$delete = $this->query("DELETE FROM sejarah WHERE id = $id");
		if ($delete) {
			echo "<script>alert('Sejarah berhasil dihapus!');document.location.href='sejarah.php'</script>";
		} else {
			echo "<script>alert('Sejarah gagal dihapus!');document.location.href='sejarah.php'</script>";
		}
		
	}
}

 ?>