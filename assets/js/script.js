window.onscroll = function() {scrollFunction()};
 
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    
    document.getElementById("navbar").style.background = "#FFFFFF";
    document.getElementById("navbar").style.boxShadow = "rgba(149, 157, 165, 0.2) 0px 8px 24px";
  } else {
   
    document.getElementById("navbar").style.background = "none";
    document.getElementById("navbar").style.boxShadow = "none";
  }
}

var ToggleBar = document.querySelector('.toggle-bar');
var Main = document.querySelector('.main-admin');
var Sidebar = document.querySelector('.sidebar');
var Navbar = document.querySelector('.navbar');

ToggleBar.addEventListener('click', function() {
	Main.classList.toggle('active');
	Sidebar.classList.toggle('active');
	Navbar.classList.toggle('active');
});

// var stringToHTML = function (str) {
// 	var parser = new DOMParser();
// 	var doc = parser.parseFromString(str, 'text/html');
// 	return doc.body;
// };

$(document).ready(function () {
    $('#example').DataTable();
});

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