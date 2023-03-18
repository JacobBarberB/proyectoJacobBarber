
const video = document.querySelector("video");
const botonVideo = document.getElementById("botonVideo");
const imagenVideo = document.getElementById("imagenVideo");

video.addEventListener("timeupdate", (event) => {
	if(video.currentTime >= 25){
		imagenVideo.style.display = "block";
	}
	if(video.currentTime >= 32){
		imagenVideo.style.display = "none";
	}
	if(video.currentTime >= 45){
		botonVideo.style.display = "block";
		//console.log(video.currentTime)
	}
	if(video.currentTime >= 53){
		botonVideo.style.display = "none";
	}
});

// video.ontimeupdate = (event) => {
//   console.log("The currentTime attribute has been updated. Again.");
// };