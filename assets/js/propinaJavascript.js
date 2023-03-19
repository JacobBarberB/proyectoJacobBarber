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

	let puntos = document.getElementById("mostrar_puntos_ganados");
	puntos.innerHTML = (importe * 1 + (importe * 0.03)).toFixed(0);
	document.getElementById("puntos_ganados").value = (importe * 1 + (importe * 0.03)).toFixed(0);
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
  	let importe = document.getElementById("importe_pedido_puntos").value;
  	let precio = document.getElementById("total_propina");
	let calculo = (importe * 1 + (importe * v)).toFixed(2);
	document.getElementById("importe_propina").value = (importe * v).toFixed(2);
	precio.innerHTML = "";
	precio.innerHTML += calculo;

	let puntos = document.getElementById("mostrar_puntos_ganados");
	puntos.innerHTML = (importe * 1 + (importe * v)).toFixed(0);
	document.getElementById("puntos_ganados").value = (importe * 1 + (importe * v)).toFixed(0);
}

function No_Propina(){
	let no_propina = document.getElementById("no_propina").checked;
	let importe = document.getElementById("importe_pedido_puntos").value;
	let precio = document.getElementById("total_propina");
	let propina = document.getElementById("propina").value;
	let puntos = document.getElementById("mostrar_puntos_ganados");
	if(no_propina == true){
		document.getElementById("propina").disabled = true;
		let calculo = importe;
		document.getElementById("importe_propina").value = 0;
		precio.innerHTML = "";
		precio.innerHTML += calculo;
		puntos.innerHTML = (importe * 1).toFixed(0);
		document.getElementById("puntos_ganados").value = (importe * 1).toFixed(0);
	}else{
		document.getElementById("propina").disabled = false;
		let calculo = (importe * 1 + (importe * propina / 100)).toFixed(2);
		document.getElementById("importe_propina").value = (importe * propina / 100).toFixed(2);
		precio.innerHTML = "";
		precio.innerHTML += calculo;
		puntos.innerHTML = (importe * 1 + (importe * propina / 100)).toFixed(0);
		document.getElementById("puntos_ganados").value = (importe * 1 + (importe * propina / 100)).toFixed(0);
	}
}

function Cantidad_Puntos(){
	let puntos = document.getElementById("puntos").value;
	let valor = puntos * 0.01;
	let importe = document.getElementById("importe_pedido").value;
	let descuento = document.getElementById("descuento");
	let precio_final = document.getElementById("precio_final_puntos");
	descuento.innerHTML = valor.toFixed(2);
	precio_final.innerHTML = (importe - valor).toFixed(2) + " €";
	document.getElementById("puntos_usados").value = puntos;
	document.getElementById("importe_pedido_puntos").value = (importe - valor).toFixed(2);
	let mostrar_precio = document.getElementById("mostrar_precio_pedido");
	mostrar_precio.innerHTML = (importe - valor).toFixed(2) + " €";
	document.getElementById("puntos").value = puntos;
}

function Finalizar_Compra(puntos){
	let puntos_usados = document.getElementById("puntos_usados").value;
	let puntos_ganados = document.getElementById("puntos_ganados").value;
	let suma_puntos = (puntos + parseInt(puntos_ganados)) - puntos_usados;
	document.getElementById("puntos_finales").value = suma_puntos;
	document.getElementById("finalizarCompra").submit();
}