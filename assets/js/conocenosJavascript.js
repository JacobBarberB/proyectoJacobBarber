
const video = document.querySelector("video");
const botonVideo = document.getElementById("botonVideo");

video.addEventListener("timeupdate", (event) => {
	if(video.currentTime >= 45){
		botonVideo.style.display = "block";
		console.log(video.currentTime)
	}
	if(video.currentTime >= 53){
		botonVideo.style.display = "none";
	}
});

// video.ontimeupdate = (event) => {
//   console.log("The currentTime attribute has been updated. Again.");
// };