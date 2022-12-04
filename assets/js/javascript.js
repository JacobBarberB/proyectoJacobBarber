
function ButtonModal(nombre, numero){	
	var modal = document.getElementById("myModal" + numero);
	modal.style.display = "block";
	//document.getElementById("modal-titulo").innerHTML = nombre;
}
function Close(numero){
	var modal = document.getElementById("myModal" + numero);
	modal.style.display = "none";	
	//document.getElementById('nombre_produc').innerHTML = "";
}
function ButtonAdd(id, nombre, descripcion, precio, tipo){
	var cantidad = document.getElementById("modal-cantidad" + id).value;
	var modal = document.getElementById("myModal" + id);
	
	/*localStorage.setItem('id_producto', id);
	localStorage.setItem('nombre_producto', nombre);
	localStorage.setItem('cantidad_producto', cantidad);*/
	//console.log(nombre, cantidad);
	//console.log(cantidad);
	
	//window.location.href = "carta.php";
	//window.location.href = window.location.href + "?w1=" + nombre + "&w2" + cantidad;

	//console.log(document.getElementsByName("ingredientes"));

	var ingredientes = '';
	for(let i = 0; i < document.getElementsByName('ingredientes-' + id + '[]').length; i++) {
	    const currElem = Array.prototype.slice.call(document.getElementsByName('ingredientes-' + id + '[]'))[i];
		if (currElem.checked) {
			ingredientes += currElem.value + ";";
		}
	}

	var ajaxHandler = new XMLHttpRequest();
	ajaxHandler.open("POST", 'modelo/add_product.php', true);

	ajaxHandler.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajaxHandler.send("id="+id+"&nombre="+nombre+"&cantidad="+cantidad+"&descripcion="+descripcion+"&precio="+precio+"&ingredientes="+ingredientes+"&tipo="+tipo);

	ajaxHandler.onload = function () {
	    if(ajaxHandler.status === 200) {	    	
	        modal.style.display = "none";
	        location.reload();	        
	    }
	}
}