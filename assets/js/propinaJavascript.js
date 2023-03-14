function ButtonModal_Propina(importe){	
	let modal = document.getElementById("myModal_propina");
	modal.style.display = "block";
	let body = document.querySelector('body');
	body.innerHTML = body.innerHTML + '<div class="blocker"></div>';

	let precio = document.getElementById("total_propina");
	let calculo = (importe * 1 + (importe * 0.03)).toFixed(2);
	document.getElementById("importe_propina").value = (importe * 0.03).toFixed(2);
	precio.innerHTML = "";
	precio.innerHTML += calculo;
}
function Close_Propina(){
	let modal = document.getElementById("myModal_propina");
	modal.style.display = "none";	
	document.getElementsByClassName('blocker')[0].remove();	
}

// document.getElementById("propina").addEventListener("change", function() {
//   	let v = parseInt(this.value);
//   	console.log(v);
//   	let importe = document.getElementById("importe_pedido").value;
//   	console.log(importe);

//   	let precio = document.getElementById("total_propina");
// 	let calculo = (importe * 1 + (importe * v)).toFixed(2);
// 	console.log(calculo);
// 	precio.innerHTML = "";
// 	precio.innerHTML += calculo;
// });

function Cantidad_Propina(){
	let propina = document.getElementById("propina").value;
	let v = propina / 100;
  	let importe = document.getElementById("importe_pedido").value;
  	let precio = document.getElementById("total_propina");
	let calculo = (importe * 1 + (importe * v)).toFixed(2);
	document.getElementById("importe_propina").value = (importe * v).toFixed(2);
	precio.innerHTML = "";
	precio.innerHTML += calculo;
}

// let no_propina = document.getElementById("no_propina")
// if(no_propina.click()){
// 	console.log("si");
// }else{
// 	console.log("no");
// }

function No_Propina(){
	let no_propina = document.getElementById("no_propina").checked;
	let importe = document.getElementById("importe_pedido").value;
	let precio = document.getElementById("total_propina");
	let propina = document.getElementById("propina").value;
	if(no_propina == true){
		document.getElementById("propina").disabled = true;
		let calculo = importe;
		document.getElementById("importe_propina").value = 0;
		precio.innerHTML = "";
		precio.innerHTML += calculo;
	}else{
		document.getElementById("propina").disabled = false;
		let calculo = (importe * 1 + (importe * propina / 100)).toFixed(2);
		document.getElementById("importe_propina").value = (importe * propina / 100).toFixed(2);
		precio.innerHTML = "";
		precio.innerHTML += calculo;
	}
}
// var miCheckbox = document.getElementById('no_propina');

// alert('El valor inicial del checkbox es ' + miCheckbox.checked);

// miCheckbox.addEventListener('checkbox', function() {
// if(miCheckbox.checked) {
//   console.log("si");
// } else {
//   onsole.log("no");
// }
// });