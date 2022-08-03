<?php 
require '../model/Beranda.php';
$ctrl_beranda = new Beranda();
$list_kegiatan = $ctrl_beranda->getListkegiatan();

if (isset($_POST['tambah_artikel'])) {
  $role = 'beranda';
  $judul = $_POST['judul'];
  $img_kegiatan = $_FILES['img_kegiatan']['name'];
  $tmp_kegiatan = $_FILES['img_kegiatan']['tmp_name'];
  $teks = $_POST['teks'];
  $ctrl_beranda->insertKegiatan($judul,$img_kegiatan,$tmp_kegiatan,$teks,$role);
}

if (isset($_POST['edit_artikel'])) {
  $role = 'beranda';
  $judul = $_POST['judul'];
  $img_kegiatan = $_FILES['img_kegiatan']['name'];
  $tmp_kegiatan = $_FILES['img_kegiatan']['tmp_name'];
  $teks = $_POST['teks'];
  $id = $_POST['id'];
  $old_img = $_POST['old_img'];
  $ctrl_beranda->updateKegiatan($judul,$img_kegiatan,$tmp_kegiatan,$teks,$id,$old_img,$role);
}

if (isset($_POST['hapus_artikel'])) {
  $id = $_POST['id'];
  $img = $_POST['img'];
  $ctrl_beranda->deleteKegiatan($id,$img);
}

// ==========================================================================

$list_beranda = $ctrl_beranda->getListBeranda();

if (isset($_POST['tambah'])) {
  $judul = $_POST['judul'];
  $img = $_FILES['img']['name'];
  $tmp = $_FILES['img']['tmp_name'];
  $ctrl_beranda->insertBeranda($judul,$img,$tmp);
}

if (isset($_POST['edit'])) {
  $judul = $_POST['judul'];
  $img = $_FILES['img']['name'];
  $tmp = $_FILES['img']['tmp_name'];
  $id = $_POST['id'];
  $old_img = $_POST['old_img'];
  $ctrl_beranda->updateBeranda($judul,$img,$tmp,$id,$old_img);
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $img = $_POST['img'];
  $ctrl_beranda->deleteBeranda($id,$img);
}

include 'layout/header.php';
 ?>

      <h2 class="mb-3">Slider Beranda</h2>
      <div class="row">
        <div class="col-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div>      
      <div class="row">
          <?php foreach ($list_beranda as $a): ?>
            <div class="col-md-3">
                    <div class="card-custome">
                      <div class="time-flex">
                        <img src="../img/<?= $a['img']; ?>" class="card-img-custome">
                        <div style="position: absolute;right: 0;">
                          <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit<?= $a['id'] ?>">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus<?= $a['id'] ?>">hapus</button>
                        </div>
                        <!-- <p class="p4 white label-time"><?= date('d M Y',strtotime($a['create_time'])) ?></p> -->
                      </div>
                      <div class="card-body-custome">
                        <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                      </div>
                    </div>
            </div>

            <div class="modal fade" id="hapus<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h6>Apakah anda ingin menghapus gambar ini?</b></h6>
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

            <div class="modal fade" id="edit<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul Slider</label>
                          <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $a['judul'] ?>">
                        </div>
                        <div class="custom-file mb-3">
                          <label for="gambar<?= $a['id'] ?>">Gambar</label>
                          <input name="img" type="file" accept="image/*" class="custom-file-input" id="gambar<?= $a['id'] ?>">
                          <label class="custom-file-label" for="gambar<?= $a['id'] ?>">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Slider</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <label for="validatedCustomFile">Pilih Gambar</label>
                  <div class="custom-file mb-3">
                    <input name="img" type="file" accept="image/*" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
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

      <h2 class="mb-3">Artikel Beranda</h2>
      <div class="row">
        <div class="col-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_artikel">
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
                          <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit_artikel<?= $a['id'] ?>">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus_artikel<?= $a['id'] ?>">hapus</button>
                        </div>
                        <p class="p4 white label-time"><?= date('d M Y',strtotime($a['create_time'])) ?></p>
                      </div>
                      <div class="card-body-custome">
                        <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                      </div>
                    </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="hapus_artikel<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <button name="hapus_artikel" type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit_artikel<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <label for="img_kegiatan_edit<?= $a['id'] ?>">Gambar</label>
                          <input name="img_kegiatan" type="file" accept="image/*" class="custom-file-input" id="img_kegiatan_edit<?= $a['id'] ?>">
                          <label class="custom-file-label" for="img_kegiatan_edit<?= $a['id'] ?>">Choose file...</label>
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
                      <button name="edit_artikel" type="submit" class="btn btn-warning">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach ?>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambah_artikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="img_kegiatan_tambah">Gambar</label>
                  <div class="custom-file mb-3">
                    <input name="img_kegiatan" type="file" accept="image/*" class="custom-file-input" id="img_kegiatan_tambah" required>
                    <label class="custom-file-label" for="img_kegiatan_tambah">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="teks" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button name="tambah_artikel" type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<?php include 'layout/footer.php'; ?>