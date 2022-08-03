<?php 

require '../model/Struktur.php';
$ctrl_struktur = new Struktur();
$list_struktur = $ctrl_struktur->getListStruktur();

if (isset($_POST['tambah'])) {
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $ctrl_struktur->insertStruktur($nama,$jabatan);
}

if (isset($_POST['edit'])) {
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $id = $_POST['id'];
  $ctrl_struktur->updateStruktur($nama,$jabatan,$id);
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  $ctrl_struktur->deleteStruktur($id);
}

include 'layout/header.php';
 ?>

      <h1 class="mb-5">Tentang Kami</h1>
      <h3 class="mb-3">Struktur Anggota</h3>
      <div class="row">
        <div class="col-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div>
      <div class="row">
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
                  <?php foreach ($list_struktur as $a): ?>
                    <tr>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['jabatan'] ?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#edit<?= $a['id'] ?>">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#hapus<?= $a['id'] ?>">hapus</button>
                        </td>
                    </tr>
                      <!-- Modal -->
                      <div class="modal fade" id="hapus<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Struktur</h5>
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

                      <!-- Modal -->
                      <div class="modal fade" id="edit<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Struktur</h5>
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
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Struktur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                  <label for="inputState">Jabatan</label>
                  <select name="jabatan" id="inputState" class="form-control">
                    <option value="anggota" selected>Anggota</option>
                    <option value="bendahara">Bendahara</option>
                    <option value="sekretaris">Sekretaris</option>
                    <option value="ketua">Ketua</option>
                  </select>
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