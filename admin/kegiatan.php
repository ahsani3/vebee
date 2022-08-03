<?php 

require '../model/Artikel.php';
$ctrl_artikel = new Artikel();
$list_kegiatan = $ctrl_artikel->getListArtikel();

if (isset($_POST['tambah'])) {
  $judul = $_POST['judul'];
  $img = $_FILES['img']['name'];
  $tmp = $_FILES['img']['tmp_name'];
  $teks = $_POST['teks'];
  $ctrl_artikel->insertArtikel($judul,$img,$tmp,$teks);
}

if (isset($_POST['edit'])) {
  $judul = $_POST['judul'];
  $img = $_FILES['img']['name'];
  $tmp = $_FILES['img']['tmp_name'];
  $teks = $_POST['teks'];
  $id = $_POST['id'];
  $old_img = $_POST['old_img'];
  $ctrl_artikel->updateArtikel($judul,$img,$tmp,$teks,$id,$old_img);
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $img = $_POST['img'];
  $ctrl_artikel->deleteArtikel($id,$img);
}

include 'layout/header.php';
 ?>

      <h1 class="mb-5">Kegiatan Organisasi</h1>
      <div class="row">
        <div class="col-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div>      
      <div class="row">
          <?php foreach ($list_kegiatan as $a): ?>
            <div class="col-md-3">
                    <div class="card-custome">
                      <div class="time-flex">
                <!-- <a href="../detail_kegiatan.php?id=<?= $a['id']; ?>" class="text-decoration-none"> -->
                        <img src="../img/<?= $a['img']; ?>" class="card-img-custome">
                <!-- </a> -->
                        <div style="position: absolute;right: 0;">
                          <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit<?= $a['id'] ?>">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus<?= $a['id'] ?>">hapus</button>
                        </div>
                        <p class="p4 white label-time"><?= date('d M Y',strtotime($a['create_time'])) ?></p>
                      </div>
                      <div class="card-body-custome">
                        <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                      </div>
                    </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="hapus<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h5>Apakah anda ingin menghapus artikel <b>"<?= $a['judul'] ?>"</b></h5>
                        <input type="hidden" name="img" value="<?= $a['img'] ?>">
                        <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                      <button name="hapus" type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul Artikel</label>
                          <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $a['judul'] ?>" required>
                        </div>
                        <div class="custom-file mb-3">
                          <label for="validatedCustomFile">Gambar</label>
                          <input name="img" type="file" accept="image/*" class="custom-file-input" id="validatedCustomFile">
                          <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Content</label>
                          <textarea name="teks" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $a['teks'] ?></textarea>
                        </div>
                        <input type="hidden" name="old_img" value="<?= $a['img'] ?>">
                        <input type="hidden" name="id" value="<?= $a['id'] ?>">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                      <button name="edit" type="submit" class="btn btn-warning">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach ?>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Artikel</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <label for="validatedCustomFile">Gambar</label>
                  <div class="custom-file mb-3">
                    <input name="img" type="file" class="custom-file-input" accept="image/*" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="teks" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php include 'layout/footer.php'; ?>