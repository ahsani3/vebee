
    <div class="footer text-center bg-white">
    	<a href="index.php" class="d-flex justify-content-center text-decoration-none">
    	  <div class="logo">
    	      <img src="assets/img/logo.png">
    	  </div>
    	  <p class="main-color" style="margin-top: 8px;font-size: 24px;font-weight: 700">VeBee</p>
    	</a>
    	<div class="d-flex justify-content-center mb-3 flex-wrap">
    		
	    	<a href="index.php" class="d-flex text-decoration-none mr-3 text-color nowrap" style="font-size: 16px;font-weight: 600">
	    		Beranda
	    	</a>
	    	<a href="kegiatan.php" class="d-flex text-decoration-none mr-3 text-color nowrap" style="font-size: 16px;font-weight: 600">
	    		Kegiatan
	    	</a>
            <a href="video.php" class="d-flex text-decoration-none mr-3 text-color nowrap" style="font-size: 16px;font-weight: 600">
                Video
            </a>
	    	<a href="about.php" class="d-flex text-decoration-none mr-3 text-color nowrap" style="font-size: 16px;font-weight: 600">
	    		Tentang Kami
	    	</a>
            <a href="sejarah.php" class="d-flex text-decoration-none mr-3 text-color nowrap" style="font-size: 16px;font-weight: 600">
                Sejarah
            </a>
    	</div>

		<p class="paragraph-color" style="font-size: 12px;">Copyright © 2022. Om Guh VeBee Jepara</p>
    </div>
    	

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/script.js?v=<?= time(); ?>"></script>
    <script>
        var videos = document.querySelectorAll('video');
        for(var i=0; i<videos.length; i++)
           videos[i].addEventListener('play', function(){pauseAll(this)}, true);


        function pauseAll(elem){
          for(var i=0; i<videos.length; i++){
            //Is this the one we want to play?
            if(videos[i] == elem) continue;
            //Have we already played it && is it already paused?
            if(videos[i].played.length > 0 && !videos[i].paused){
            // Then pause it now
              videos[i].pause();
            }
          }
        }
    </script>
  </body>
</html>