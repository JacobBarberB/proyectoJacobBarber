
function ButtonModal(nombre, numero){	
	var modal = document.getElementById("myModal" + numero);
	modal.style.display = "block";
	var body = document.querySelector('body');
	body.innerHTML = body.innerHTML + '<div class="blocker"></div>';
}
function Close(numero){
	var modal = document.getElementById("myModal" + numero);
	modal.style.display = "none";	
	document.getElementsByClassName('blocker')[0].remove();
}
function ButtonAdd(id, id_prod, nombre, descripcion, precio, tipo){
	var cantidad = document.getElementById("modal-cantidad" + id).value;
	var modal = document.getElementById("myModal" + id);	

	var ingredientes = '';
	for(let i = 0; i < document.getElementsByName('ingredientes-' + id + '[]').length; i++) {
	    const currElem = Array.prototype.slice.call(document.getElementsByName('ingredientes-' + id + '[]'))[i];
		if (currElem.checked) {
			ingredientes += currElem.value + ";";
		}		
	}
	//console.log(tipo);
	let ajaxHandler = new XMLHttpRequest();
	ajaxHandler.open("POST", 'add_product', true);

	ajaxHandler.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajaxHandler.send("id="+id+"&id_prod="+id_prod+"&nombre="+nombre+"&cantidad="+cantidad+"&descripcion="+descripcion+"&precio="+precio+"&ingredientes="+ingredientes+"&tipo="+tipo);

	ajaxHandler.onload = function () {
	    if(ajaxHandler.status === 200) {	    	
	        modal.style.display = "none";
	        location.reload();	        
	    }
	}
}

function Registrar(){
	var login_id = document.getElementById("login");
	var registro_id = document.getElementById("registro");	
	login_id.style.display= "none";
	registro_id.style.display= "block";
}
function Login(){
	var login_id = document.getElementById("login");
	var registro_id = document.getElementById("registro");	
	login_id.style.display= "block";
	registro_id.style.display= "none";
}
function user_1(valor){
	document.getElementById(valor + "_sexo").value=0;
	var user_1 = document.getElementById(valor + "_man");
	var user_2 = document.getElementById(valor + "_woman");
	user_1.style.opacity = "1";
	user_2.style.opacity = "0.6";
}
function user_2(valor){
	document.getElementById(valor + "_sexo").value=1;
	var user_1 = document.getElementById(valor + "_man");
	var user_2 = document.getElementById(valor + "_woman");
	user_1.style.opacity = "0.6";
	user_2.style.opacity = "1";
}
var comprovarNombre = 0;
var comprovarApellido = 0;
var comprovarPass = 0;
var comprovarEmail = 0;
var comprovarDirec = 0;
var comprovarTelef = 0;
function confirmarNombre(){
	var nombre = document.getElementById("nombre2").value;
	const malNombre = document.getElementById("malNombre");
	if(nombre == "" ){
		malNombre.style.display= "block";
		malNombre.style.color = "red";
		document.getElementById("nombre2").focus();
		comprovarNombre = 0;
	}else{
		malNombre.style.display= "none";
		comprovarNombre = 1;
	}
	//alert(nombre);
}
function confirmarApellido(){
	var apellido = document.getElementById("apellido").value;
	const malApe = document.getElementById("malApe");
	if(apellido == "" ){
		malApe.style.display= "block";
		malApe.style.color = "red";
		document.getElementById("apellido").focus();
		comprovarApellido = 0;
	}else{
		malApe.style.display= "none";
		comprovarApellido = 1;
	}
}
function confirmarPass(){
	var psw = document.getElementById("psw").value;
	const malPass = document.getElementById("malPass");
	if(psw == "" ){
		malPass.style.display= "block";
		malPass.style.color = "red";
		document.getElementById("psw").focus();
		comprovarPass = 0;
	}else{
		malPass.style.display= "none";
		comprovarPass = 1;
	}
}
function confirmarEmail(){
	var email = document.getElementById("email").value;
	const malEmail = document.getElementById("malEmail");
	if(email == "" ){
		malEmail.style.display= "block";
		malEmail.style.color = "red";
		document.getElementById("email").focus();
		comprovarEmail = 0;
	}else{
		malEmail.style.display= "none";
		comprovarEmail = 1;
	}
}
function confirmarDireccion(){
	var direccion = document.getElementById("direccion").value;
	const malDirec = document.getElementById("malDirec");
	if(direccion == "" ){
		malDirec.style.display= "block";
		malDirec.style.color = "red";
		document.getElementById("direccion").focus();
		comprovarDirec = 0;
	}else{
		malDirec.style.display= "none";
		comprovarDirec = 1;
	}
}
function confirmarTelef(){
	var telefono = document.getElementById("telefono").value;
	const malTel = document.getElementById("malTel");
	if(telefono == "" ){
		malTel.style.display= "block";
		malTel.style.color = "red";
		document.getElementById("telefono").focus();
		comprovarTelef = 0;
	}else{
		malTel.style.display= "none";
		comprovarTelef = 1;
	}
}
function botonRegistrar() {
	var buttonRegis = document.getElementById("buttonRegis");
	//let formRegistro = document.getElementById("formRegistro");
	if(comprovarTelef == 1 && comprovarDirec == 1 && comprovarEmail == 1 && comprovarPass == 1 && comprovarApellido == 1 && comprovarNombre == 1){	
		//formRegistro.action = "modelo/registro.php";	
		buttonRegis.type = "submit";
		alert("Usuario creado correctamente");
	}
}

/* USUARIOS */

function Editar(){	
	var editarUser = document.getElementById("editarUser");
	editarUser.style.display = "block";
}
function Cerrar(){
	var editarUser = document.getElementById("editarUser");
	editarUser.style.display = "none";
}

/* ADMIN */

function AbrirTabla(valor){
	let listado_pedidos = document.getElementById("listado_pedidos");
	listado_pedidos.style.display = "none";
	let listado_producto = document.getElementById("listado_producto");
	let insertar_producto = document.getElementById("insertar_producto");
	let modificar_producto = document.getElementById("modificar_producto");
	let eliminar_producto = document.getElementById("eliminar_producto");
	listado_producto.style.display = "none";
	insertar_producto.style.display = "none";
	modificar_producto.style.display = "none";
	eliminar_producto.style.display = "none";
	let listado_ingrediente = document.getElementById("listado_ingrediente");
	let insertar_ingrediente = document.getElementById("insertar_ingrediente");
	let modificar_ingrediente = document.getElementById("modificar_ingrediente");
	let eliminar_ingrediente = document.getElementById("eliminar_ingrediente");
	listado_ingrediente.style.display = "none";
	insertar_ingrediente.style.display = "none";
	modificar_ingrediente.style.display = "none";
	eliminar_ingrediente.style.display = "none";
	let listado_usuario = document.getElementById("listado_usuario");
	let insertar_usuario = document.getElementById("insertar_usuario");
	let editar_usuario = document.getElementById("editar_usuario");
	let modificar_usuario = document.getElementById("modificar_usuario");
	let eliminar_usuario = document.getElementById("eliminar_usuario");
	listado_usuario.style.display = "none";
	insertar_usuario.style.display = "none";
	editar_usuario.style.display = "none";
	modificar_usuario.style.display = "none";
	eliminar_usuario.style.display = "none";
	
	let idRecibida = document.getElementById(valor);
	idRecibida.style.display = "block";	
}

function categoria(categoria, type) {
	const datos = new FormData();
	datos.append('accion', 'seleccionar_producto');
	datos.append('ingrediente_categoria', categoria);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		let div = document.getElementById(type + "_ingredientes");
		div.innerHTML = '';
		res.forEach(ingrediente => {
			if (ingrediente.activo) {
				div.innerHTML += '<div style="display: inline-block;">'
		                + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
		                + '<input type="checkbox" name="ingrediente[' + ingrediente.id_ingrediente + ']" checked value="1" />'
		              + '</div>';
			} else {
				div.innerHTML += '<div style="display: inline-block;">'
	                + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
	                + '<input type="checkbox" name="ingrediente[' + ingrediente.id_ingrediente + ']" value="0" />'
	              + '</div>';
			}
		});
	});

	/*let ajaxHandler = new XMLHttpRequest();
	ajaxHandler.open("POST", 'administrador/control.php', true);
	ajaxHandler.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//ajaxHandler.responseType = 'json';
	
	ajaxHandler.onreadystatechange =  function(){
		if(ajaxHandler.readyState == 4 && ajaxHandler.status == 200){
			let div = document.getElementById("ingredientes");
			let array = JSON.parse(ajaxHandler.response);

			div.innerHTML = '';
			array.forEach(ingrediente => {
				if (ingrediente.activo) {
					div.innerHTML += '<div style="display: inline-block;">'
	                    + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
	                    + '<input type="checkbox" name="ingrediente-' + ingrediente.id_ingrediente + '[]" checked value="1" />'
	                  + '</div>';
				} else {
					div.innerHTML += '<div style="display: inline-block;">'
	                    + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
	                    + '<input type="checkbox" name="ingrediente-' + ingrediente.id_ingrediente + '[]" value="0" />'
	                  + '</div>';
				}
			});
			
		}
		
	};
	ajaxHandler.send("ingrediente_categoria="+categoria);*/

}

function BuscarProd(nombre, type){
	const datos = new FormData();
	datos.append('accion', 'buscar_producto');
	datos.append('nombre', nombre);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		if (res != null && res.id_producto !== undefined) {
			document.getElementById(type + "_id_producto").value = res.id_producto;
			document.getElementById(type + "_nombre_prod").value = res.nombre_producto;
			document.getElementById(type + "_descripcion_prod").value = res.descripcion;
			document.getElementById(type + "_precio_prod").value = res.precio_producto;
			document.getElementById(type + "_imagen_prod").value = res.imagen;

			if (res.id_categoria == 1) {
				document.getElementById(type + "_categoria_ingred_1").checked = true;
			}
			if (res.id_categoria == 2) {
				document.getElementById(type + "_categoria_ingred_2").checked = true;
			}
			if (res.id_categoria == 3) {
				document.getElementById(type + "_categoria_ingred_3").checked = true;
			}

			let div = document.getElementById(type + "_ingredientes");
			div.innerHTML = '';
			res.ingredientes.forEach(ingrediente => {
				if (ingrediente.activo) {
					div.innerHTML += '<div style="display: inline-block;">'
			                + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
			                + '<input type="checkbox" name="ingrediente[' + ingrediente.id_ingrediente + ']" checked value="1" />'
			              + '</div>';
				} else {
					div.innerHTML += '<div style="display: inline-block;">'
		                + '<label class="text-1 fw-bold fs-6 ps-4 pe-1 pt-2 pl-3 color_b">' + ingrediente.nombre_ingred + '</label>'
		                + '<input type="checkbox" name="ingrediente[' + ingrediente.id_ingrediente + ']" value="0" />'
		              + '</div>';
				}
			});
			document.getElementById(type + '_div').style.display = 'block';
		} else {
			document.getElementById(type + "_id_producto").value = '';
			document.getElementById(type + "_nombre_prod").value = '';
			document.getElementById(type + "_descripcion_prod").value = '';
			document.getElementById(type + "_precio_prod").value = '';
			document.getElementById(type + "_ingredientes").innerHTML = '';
			document.getElementById(type + "_categoria_ingred_1").checked = false;
			document.getElementById(type + "_categoria_ingred_2").checked = false;
			document.getElementById(type + "_categoria_ingred_3").checked = false;
			document.getElementById(type + '_div').style.display = 'none';
		}
	});
}

function EliminarProducto() {
	const datos = new FormData();
	datos.append('accion', 'eliminar_producto');
	datos.append('id_producto', document.getElementById("eliminar_id_producto").value);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => {
		alert("Producto eliminado");
		location.reload();
	});
}

function validarFormularioNuevoProducto() {
	let nom = document.getElementById("produc_nombre_produc").value;
	if (nom == "") {
		alert("Es obligatorio poner un nombre");
		return false;
	}
	let desc = document.getElementById("produc_desc_produc").value;
	if (desc == "") {
		alert("Es obligatorio poner una descripción");
		return false;
	}
	let cat1 = document.getElementById("cate_ingred_1");
	let cat2 = document.getElementById("cate_ingred_2");
	let cat3 = document.getElementById("cate_ingred_3");
	if (cat1.checked || cat2.checked || cat3.checked) {		
	}else{
		alert("Es obligatorio seleccionar una categoria");
		return false;
	}
	let imagen = document.getElementById("imagen_prod").value;
	if (imagen == "") {
		alert("Es obligatorio seleccionar una imagen");
		return false;
	}
	document.getElementById("crear_producto_form").submit();
}
function validarFormularioNuevoIngrediente() {
	let cat1 = document.getElementById("ingred_cat_ingred_1");
	let cat2 = document.getElementById("ingred_cat_ingred_2");
	let cat3 = document.getElementById("ingred_cat_ingred_3");
	if (cat1.checked || cat2.checked || cat3.checked) {		
	}else{
		alert("Es obligatorio seleccionar una categoria");
		return false;
	}
	let nom = document.getElementById("ingred_nombre_ingred").value;
	if (nom == "") {
		alert("Es obligatorio poner un nombre");
		return false;
	}
	document.getElementById("crear_ingrediente_form").submit();
}
function BuscarIngred(nombre, type) {
	const datos = new FormData();
	datos.append('accion', 'buscar_ingrediente');
	datos.append('nombre', nombre);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		if (res != null && res.id_ingrediente !== undefined) {
			document.getElementById(type + "_id_ingrediente").value = res.id_ingrediente;
			document.getElementById(type + "_nombre_ingrediente").value = res.nombre_ingred;
			document.getElementById(type + "_precio_ingrediente").value = res.precio_ingred;

			res.categoria.forEach(ingrediente => {
				if (ingrediente.id_categoria == 1) {
					document.getElementById(type + "_cat_ingred_1").checked = true;
				}
				if (ingrediente.id_categoria == 2) {
					document.getElementById(type + "_cat_ingred_2").checked = true;
				}
				if (ingrediente.id_categoria == 3) {
					document.getElementById(type + "_cat_ingred_3").checked = true;
				}

				if(ingrediente.activo == 1){
					document.getElementById(type + "_ingredienteBasico_si").checked = true;
				}else{
					document.getElementById(type + "_ingredienteBasico_no").checked = true;
				}
			});
			document.getElementById(type + '_div_ingred').style.display = 'block';
		} else {
			document.getElementById(type + "_id_ingrediente").value = '';
			document.getElementById(type + "_nombre_ingrediente").value = '';
			document.getElementById(type + "_precio_ingrediente").value = '';
			document.getElementById("cat_ingred_1").checked = false;
			document.getElementById("cat_ingred_2").checked = false;
			document.getElementById("cat_ingred_3").checked = false;
			document.getElementById("ingredienteBasico_si").checked = false;
			document.getElementById("ingredienteBasico_no").checked = false;
			document.getElementById(type + '_div_ingred').style.display = 'none';
		}
	});
}
function EliminarIngrediente() {
	const datos = new FormData();
	datos.append('accion', 'eliminar_ingrediente');
	datos.append('id_ingrediente', document.getElementById("eliminar_id_ingrediente").value);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => {
		alert("Ingrediente eliminado");		
		location.reload();
	});
}
function BuscarUsuario(email, type) {
	const datos = new FormData();
	datos.append('accion', 'buscar_usuario');
	datos.append('email', email);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		if (res != null && res.id_usuario !== undefined) {
			document.getElementById(type + "_id_usuario").value = res.id_usuario;
			document.getElementById(type + "_nombre").value = res.nombre;
			document.getElementById(type + "_apellido").value = res.apellido;
			document.getElementById(type + "_email").value = res.email;
			document.getElementById(type + "_direccion").value = res.direccion;
			document.getElementById(type + "_telefono").value = res.telefono;
			document.getElementById(type + "_sexo").value = res.sexo;
			document.getElementById(type + "_admin").value = res.admin;
			if(res.sexo == 0){
				document.getElementById(type + "_man").style.opacity = "1";
				document.getElementById(type + "_woman").style.opacity = "0.6";
			}else{
				document.getElementById(type + "_man").style.opacity = "0.6";
				document.getElementById(type + "_woman").style.opacity = "1";				
			}
			if(res.admin == 1){
				document.getElementById(type + "_admin").checked = true;
			}else{
				document.getElementById(type + "_admin").checked = false;
			}
			document.getElementById(type + '_div_usuario').style.display = 'block';
		} else {
			document.getElementById(type + "_id_usuario").value = '';
			document.getElementById(type + "_nombre").value = '';
			document.getElementById(type + "_apellido").value = '';
			document.getElementById(type + "_email").value = '';
			document.getElementById(type + "_direccion").value = '';
			document.getElementById(type + "_telefono").value = '';
			document.getElementById(type + "_admin").checked = false;
			document.getElementById(type + '_div_usuario').style.display = 'none';
		}
	});
}
function EliminarUsuario() {
	const datos = new FormData();
	datos.append('accion', 'eliminar_usuario');
	datos.append('id_usuario', document.getElementById("eliminar_id_usuario").value);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => {
		alert("Usuario eliminado");
		location.reload();
	});
}
function botonPagar(){
	alert("Debes registrarte antes.");
}
function cambiar(nombre, type) {
	let listado_producto = document.getElementById("listado_producto");
	let cambio_producto = document.getElementById(type + "_producto");
	listado_producto.style.display = "none";
	cambio_producto.style.display = "block";
	BuscarProd(nombre, type)
}
function cambiarIngrediente(nombre, type) {
	let listado_ingrediente = document.getElementById("listado_ingrediente");
	let cambio_producto = document.getElementById(type + "_ingrediente");
	listado_ingrediente.style.display = "none";
	cambio_producto.style.display = "block";
	BuscarIngred(nombre, type)
}
function cambiarUsuario(email, type) {
	let listado_usuario = document.getElementById("listado_usuario");
	let cambio_producto = document.getElementById(type + "_usuario");
	listado_usuario.style.display = "none";
	cambio_producto.style.display = "block";
	BuscarUsuario(email, type)
}