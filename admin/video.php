<?php 

require '../model/Video.php';
$ctrl_video = new Video();
$list_video = $ctrl_video->getListVideo();

$maxsize = 10485760;

if (isset($_POST['tambah'])) {
  $judul = $_POST['judul'];
  // $video = $_FILES['video']['name'];
  // $tmp = $_FILES['video']['tmp_name'];
  // $size = $_FILES['video']['size'];
  $link = $_POST['link'];
  $ctrl_video->insertVideo($judul,$link);
}

if (isset($_POST['edit'])) {
  $judul = $_POST['judul'];
  // $video = $_FILES['video']['name'];
  // $tmp = $_FILES['video']['tmp_name'];
  // $size = $_FILES['video']['size'];
  // $old_video = $_POST['old_video'];
  $id = $_POST['id'];
  $link = $_POST['link'];
  $ctrl_video->updateVideo($judul,$link,$id);
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  // $video = $_POST['video'];
  $ctrl_video->deleteVideo($id);
}

include 'layout/header.php';
 ?>

      <h1 class="mb-5">Video</h1>
      <div class="row">
        <div class="col-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            Tambah
          </button>
        </div>
      </div>      
      <div class="row">
          <?php foreach ($list_video as $a): ?>
            <div class="col-md-3">
                    <div class="card-custome">
                      <div class="time-flex">
                <!-- <a href="../detail_kegiatan.php?id=<?= $a['id']; ?>" class="text-decoration-none"> -->
                        <!-- <video class="card-img-custome" controls>
                            <source src="<?= $a['video']; ?>" type="video/mp4">
                        </video> -->
                        <div class="embed-responsive embed-responsive-16by9 card-img-custome">
                          <iframe src="<?= $a['video']; ?>" class="embed-responsive-item" allowfullscreen></iframe>
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h5>Apakah anda ingin menghapus video ini</h5>
                        <!-- <input type="hidden" name="video" value="<?= $a['video'] ?>"> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="editjudulvideo<?= $a['id'] ?>">Judul Video</label>
                          <input name="judul" type="text" class="form-control" id="editjudulvideo<?= $a['id'] ?>" aria-describedby="emailHelp" value="<?= $a['judul'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="edtilinkvideo<?= $a['id'] ?>">Link YouTube</label>
                          <input name="link" type="text" class="form-control" id="edtilinkvideo<?= $a['id'] ?>" onchange="setLink('edtilinkvideo<?= $a['id'] ?>')" value="<?= $a['video'] ?>" aria-describedby="emailHelp" required>
                        </div>
                        <!-- <div class="custom-file mb-3">
                          <label for="editvideovideo<?= $a['id'] ?>">Video</label>
                          <input name="video" type="file" accept="video/*" class="custom-file-input" id="editvideovideo<?= $a['id'] ?>">
                          <label class="custom-file-label" for="editvideovideo<?= $a['id'] ?>">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        <input type="hidden" name="old_video" value="<?= $a['video'] ?>"> -->
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="tambahjudulvideo">Judul Video</label>
                    <input name="judul" type="text" class="form-control" id="tambahjudulvideo" aria-describedby="emailHelp" required>
                  </div>
                  <div class="form-group">
                    <label for="tambahlinkvideo">Link YouTube</label>
                    <input name="link" type="text" class="form-control" id="tambahlinkvideo" onchange="setLink('tambahlinkvideo')" aria-describedby="emailHelp" required>
                  </div>
                  <!-- <label for="validatedCustomFile">Video</label>
                  <div class="custom-file mb-3">
                    <input name="video" type="file" accept="video/*" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
<script>
  function getId(url) {
      const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
      const match = url.match(regExp);

      return (match && match[2].length === 11)
        ? match[2]
        : null;
  }

  function setLink(inputId) {
    var linkku = document.getElementById(inputId).value;
    var videoId = getId(linkku);
    document.getElementById(inputId).value = 'https://www.youtube.com/embed/' + videoId;    
  }

</script>
<?php include 'layout/footer.php'; ?>