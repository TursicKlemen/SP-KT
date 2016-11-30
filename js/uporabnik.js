var createdCanvas = false;
document.getElementById("cameraShow").addEventListener("click", function(event){
    event.preventDefault();
    doVideo();
    document.getElementById("cameraShow").style.display = "none";
    document.getElementById("zajemiPix").style.visibility = "visible";
    
    document.getElementById("zajemiPix").addEventListener("click", function(event){
        event.preventDefault();
        if(!createdCanvas){
            document.getElementById("profilePicID").innerHTML = '<canvas id="slika" width="150" height="112"></canvas>';
            canvas = document.getElementById("slika");
            context = canvas.getContext("2d");            
        }
        paintCapture();       
    });
    
});




function openStream(stream){
 video.src=window.URL.createObjectURL(stream);
 video.play();};
 
 function errorFunction(error){
 console.log("Error: ", error);}
 
 function paintCapture() {
 //context.drawImage(video, 0, 0, 640, 480);}
 context.drawImage(video, 0, 0, 150, 112);}
 
 function doVideo() {
 /*canvas = document.getElementById("slika"),
 context = canvas.getContext("2d"),*/
 video = document.getElementById("video");
 videoObj = { "video": true, "audio": true };
 navigator.getUserMedia =
 navigator.getUserMedia || navigator.webkitGetUserMedia ||
 navigator.mozGetUserMedia || navigator.msGetUserMedia;
 if(navigator.getUserMedia) {
 navigator.getUserMedia(videoObj, openStream, errorFunction );
 }
 }