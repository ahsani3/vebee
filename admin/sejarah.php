<?php 

require '../model/Sejarah.php';
$ctrl_sejarah = new Sejarah();
$list_sejarah = $ctrl_sejarah->getListSejarah();

if (isset($_POST['tambah'])) {
  $teks = $_POST['teks'];
  $ctrl_sejarah->insertSejarah($teks);
}

if (isset($_POST['edit'])) {
  $teks = $_POST['teks'];
  $id = $_POST['id'];
  $ctrl_sejarah->updateSejarah($teks,$id);
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $ctrl_sejarah->deleteSejarah($id);
}

include 'layout/header.php';
 ?>

      <h1 class="mb-5">Sejarah</h1>
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div>

      <div class="row">
        <?php foreach ($list_sejarah as $s): ?>

        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <?php $teks = explode(PHP_EOL, $s['teks']);foreach ($teks as $t): ?>
                  <p><?= $t ?></p>
              <?php endforeach ?>
              <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit<?= $s['id'] ?>">Edit</button>
              <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus<?= $s['id'] ?>">hapus</button>
            </div>
          </div>
        </div>

        <div class="modal fade" id="hapus<?= $s['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Sejarah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <h5>Apakah anda ingin menghapus data ini</h5>
                    <input type="hidden" name="id" value="<?= $s['id'] ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                  <button name="hapus" type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <div class="modal fade" id="edit<?= $s['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sejarah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Teks</label>
                      <textarea name="teks" class="form-control" id="exampleFormControlTextarea1" rows="3" style="min-height: 300px" required><?= $s['teks'] ?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?= $s['id'] ?>">
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
      <!-- <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-body">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_sejarah as $a): ?>
                    <tr>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['jabatan'] ?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit<?= $a['id'] ?>">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus<?= $a['id'] ?>">hapus</button>
                        </td>
                    </tr>
                    
                      <div class="modal fade" id="hapus<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Sejarah</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <h5>Apakah anda ingin menghapus data ini</h5>
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
                              <h5 class="modal-title" id="exampleModalLabel">Edit Sejarah</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input name="nama" type="text" value="<?= $a['nama'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputState">Jabatan</label>
                                    <select name="jabatan" id="inputState" class="form-control">
                                      <option value="anggota" <?php if($a['jabatan'] == 'anggota'){echo "selected";} ?> >Anggota</option>
                                      <option value="bendahara" <?php if($a['jabatan'] == 'bendahara'){echo "selected";} ?>>Bendahara</option>
                                      <option value="sekretaris" <?php if($a['jabatan'] == 'sekretaris'){echo "selected";} ?>>Sekretaris</option>
                                      <option value="ketua" <?php if($a['jabatan'] == 'ketua'){echo "selected";} ?>>Ketua</option>
                                    </select>
                                  </div>
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
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Opsi</th>
                    </tr>
                </tfoot>
            </table>
            </div>
          </div>
        </div>
      </div> -->
      
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Sejarah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Teks</label>
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