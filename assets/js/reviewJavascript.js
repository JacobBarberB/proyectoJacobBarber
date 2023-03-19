Reviews('DESC');
function Reviews(orden){
	const datos = new FormData();
	datos.append('accion', 'all_review');
	datos.append('orden', orden);
	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		//console.log(res);
		let div = document.getElementById("mostrarReviews");
		div.innerHTML = "";		
		res.forEach(review =>{
			let valo1 = "";
			let valo2 = "";
			let valo3 = "";
			let valo4 = "";
			let valo5 = "";
			if(review.nota == 1){
				valo1 = "checked";
			}else if(review.nota == 2){
				valo2 = "checked";
			}else if(review.nota == 3){
				valo3 = "checked";
			}else if(review.nota == 4){
				valo4 = "checked";
			}else if(review.nota == 5){
				valo5 = "checked";
			}
			div.innerHTML += 
				`<div class="containerReview mx-auto mt-2 mt-lg-3">
		          <div class="text-center">                    
		            <label class="listado_review text-3 fw-bold mx-3 mx-lg-5 mt-3 mt-lg-4"><u>Valoración</u></label>
		            <label class="listado_review text-3 fw-bold mx-3 mx-lg-5 mt-3 mt-lg-4"><u>Cliente</u></label>
		            <label class="listado_review text-3 fw-bold mx-4 mx-lg-5 mt-3 mt-lg-4"><u>Nº pedido</u></label>
		          </div>
		          <div class="text-center">
		          	<td class="text-center"><label class="listado_review text-2 fw-bold color_b me-3 me-lg-5 mt-1 mt-lg-4">
						<p class="clasificacion" disabled>
		                <input type="radio" value="5" ${valo5}><!--
		                --><label>★</label><!--
		                --><input type="radio" value="4" ${valo4}><!--
		                --><label>★</label><!--
		                --><input type="radio" value="3" ${valo3}><!--
		                --><label>★</label><!--
		                --><input type="radio" value="2" ${valo2}><!--
		                --><label>★</label><!--
		                --><input type="radio" value="1" ${valo1}><!--
		                --><label>★</label>           
		                </p>
					</label></td>
		            <td class="text-center"><label class="listado_review text-2 fw-bold color_b mx-4 mx-lg-5 mt-1 mt-lg-4">${review.email}</label></td>
		            <td class="text-center"><label class="listado_review text-2 fw-bold color_b mx-4 mx-lg-5 mt-1 mt-lg-4">${review.id_pedido}</label></td>
		          </div>
		          <div class="text-center">
		            <label class="listado_review text-3 fw-bold mx-1 mx-lg-5 mt-1 mt-lg-3"><u>Comentarios</u></label>
		          </div>
		          <div class="text-center">
		            <td class="text-center"><label class="listado_review text-2 fw-bold color_b mx-1 mx-lg-5 mt-1 mt-lg-4">${review.descripcion}</label></td>
		          </div>        
		        </div>`;			
		});
	});
}

function ButtonModal_Review(id_usuario){	
	var modal = document.getElementById("myModal_review");
	modal.style.display = "block";
	var body = document.querySelector('body');
	body.innerHTML = body.innerHTML + '<div class="blocker"></div>';
	reviewUsuario(id_usuario);
}
function Close_Review(){
	var modal = document.getElementById("myModal_review");
	modal.style.display = "none";	
	document.getElementsByClassName('blocker')[0].remove();

	let select = document.getElementById('orden');
	select.addEventListener('change',
	function(){		
		let selectedOption = this.options[select.selectedIndex];
		if(selectedOption.value == 0){
			Reviews('DESC');
		}else{
			Reviews('ASC');
		}
	});
}
function reviewUsuario(id_usuario){
	const datos = new FormData();
	datos.append('accion', 'buscar_pedido');
	datos.append('id_usuario', id_usuario);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		let select = document.getElementById("select_pedido");
		select.innerHTML = "";
		res.forEach(pedido =>{
			let selectOption = document.createElement("option");
			selectOption.textContent = pedido.id_pedido;
			selectOption.value = pedido.id_pedido;
			select.appendChild(selectOption);
		});
	});
}

function ButtonReview(){
	let pedido = document.getElementById("select_pedido").value;
	let id_usuario = document.getElementById("id_usuario").value;
	let nota = document.querySelector('input[name="estrellas"]:checked').value;
	let comentario = document.getElementById("comentario").value;
	if (comentario == "") {
		notie.alert({ type: 3, text: '"Es obligatorio poner un comentario', stay: true });
		//alert("Es obligatorio poner un comentario");
		return false;
	}
	const datos = new FormData();
	datos.append('accion', 'add_review');
	datos.append('pedido', pedido);
	datos.append('id_usuario', id_usuario);
	datos.append('nota', nota);
	datos.append('comentario', comentario);

	fetch('control', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		notie.alert({ type: 1, text: 'Reseña enviada!', stay: true });
		Close_Review();		
	});	
}

let select = document.getElementById('orden');
select.addEventListener('change',
	function(){		
	let selectedOption = this.options[select.selectedIndex];
	if(selectedOption.value == 0){
		Reviews('DESC');
	}else{
		Reviews('ASC');
	}
	});

