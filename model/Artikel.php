<?php 
require 'Beranda.php';
/**
 * 
 */
class Artikel extends Beranda
{
	
	public function getListArtikel()
	{
		return $this->getList("SELECT * FROM artikel WHERE role != 'beranda' ORDER BY update_time DESC");
	}
	
	

	public function getOneArtikel($id)
	{
		return $this->getOne("SELECT * FROM artikel WHERE id = $id");
	}

	public function getLimitArtikel()
	{
		return $this->getList("SELECT * FROM artikel WHERE role != 'beranda' ORDER BY update_time DESC LIMIT 6");
	}

	public function insertArtikel($judul,$img,$tmp,$teks)
	{
		$gambar = 'artikel_'.date('YmdHis_').$img;
		$insert = $this->query("INSERT INTO artikel (judul,img,teks) VALUES ('$judul','$gambar','$teks')");
		if ($insert) {
			move_uploaded_file($tmp, '../img/'.$gambar);
			echo "<script>alert('Artikel berhasil ditambahkan!');document.location.href='kegiatan.php'</script>";
		}else{
			echo "<script>alert('Artikel gagal ditambahkan!');document.location.href='kegiatan.php'</script>";
		}
	}

	public function updateArtikel($judul,$img,$tmp,$teks,$id,$old_img)
	{
		// var_dump($judul,$img,$tmp,$teks,$id,$old_img);exit();
		if ($img == '' || $tmp == '') {
			$update = $this->query("UPDATE artikel SET judul = '$judul', img = '$old_img', teks = '$teks' WHERE id = $id ");
			if ($update) {
				echo "<script>alert('Artikel berhasil diedit!');document.location.href='kegiatan.php'</script>";
			}else
			{
				echo "<script>alert('Artikel gagal diedit!');document.location.href='kegiatan.php'</script>";
			}
		}else{
			$gambar = 'artikel_'.date('YmdHis_').$img;
			$update = $this->query("UPDATE artikel SET judul = '$judul', img = '$gambar', teks = '$teks' WHERE id = $id ");
			if ($update) {
				unlink('../img/'.$old_img);
				move_uploaded_file($tmp, '../img/'.$gambar);
				echo "<script>alert('Artikel berhasil diedit!');document.location.href='kegiatan.php'</script>";
			} else {
				echo "<script>alert('Artikel gagal diedit!');document.location.href='kegiatan.php'</script>";
				
			}
			
		}
	}

	public function deleteArtikel($id,$img)
	{
		$delete = $this->query("DELETE FROM artikel WHERE id = $id");
		if ($delete) {
			unlink('../img/'.$img);
			echo "<script>alert('Artikel berhasil dihapus!');document.location.href='kegiatan.php'</script>";
		} else {
			echo "<script>alert('Artikel gagal dihapus!');document.location.href='kegiatan.php'</script>";
		}
		
	}
}

 ?>