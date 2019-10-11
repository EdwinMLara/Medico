const videoPlayer = document.querySelector("#player");
const tomarFoto = document.querySelector("#btn-foto");
const canvasElement = document.querySelector("#canvas");

const startMedia = () => {
  if (!("mediaDevices" in navigator)) {
    navigator.mediaDevices = {};
  }

  if (!("getUserMedia" in navigator.mediaDevices)) {
    navigator.mediaDevices.getUserMedia = constraints => {
      const getUserMedia =
        navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

      if (!getUserMedia) {
        return Promise.reject(new Error("getUserMedia is not supported"));
      } else {
        return new Promise((resolve, reject) =>
          getUserMedia.call(navigator, constraints, resolve, reject)
        );
      }
    };
  }

  navigator.mediaDevices
    .getUserMedia({ video: true })
    .then(stream => {
      videoPlayer.srcObject = stream;
      videoPlayer.style.display = "block";
    })
    .catch(err => {
      imagePickerArea.style.display = "block";
    });
};


const crear_imagen = (src,alt) =>{
	let newimg = document.createElement("img");
	if (src !== null) 
		newImg.setAttribute("src", src);
  	if (alt !== null) 
  		newImg.setAttribute("alt", alt);
  	return newimg
}

tomarFoto.addEventListener("click", event => {
	var Nombre = document.getElementById("Nombre").value;
	var Apellido = document.getElementById("Apellido").value;
  var Departamento;
  if(document.getElementById("Parentesco")){
    Departamento = document.getElementById("Parentesco").value;
  }else{
    Departamento = document.getElementById("Departamento").value;
  }

	if(Nombre.trim().length == 0 || Apellido.trim().length == 0 || Departamento.trim().length == 0){
		alert("Por favor llena todos los campos primero");
	}else{
		canvasElement.style.display = "block";
		const context = canvasElement.getContext("2d");
		context.drawImage(videoPlayer, 0, 0, canvas.width, canvas.height);

		videoPlayer.srcObject.getVideoTracks().forEach(track => {});

		let picture = canvasElement.toDataURL();

		var img_nombre = "";
		img_nombre = img_nombre.concat(Nombre,"-",Apellido,"-",Departamento);

		fetch("api/save_image.php", {
		   method: "post",
		   body: JSON.stringify({ data: picture, nombre: img_nombre })
		})
		.catch(error => console.log(error));
	}
});


window.addEventListener("load", event => startMedia());