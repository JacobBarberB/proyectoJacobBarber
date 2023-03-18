mostrarSandwiches(2);
async function mostrarSandwiches(categoria){
	const datos = new FormData();
	datos.append('categoria', categoria);

	fetch('mostrar_productos', {
		method: 'POST',
		body: datos,
	}).then(res => res.json())
	.then(res => {
		let cont = 1;
		let key = 0;
		const posicion = [];
		let div = document.getElementById("mostrarSandwiches");
		div.innerHTML = "";
		res.forEach(producto => {
			posicion[key]= producto.id_producto;
			//key = producto.id_producto;
			console.log("KEY: "+posicion);
			div.innerHTML += 
			`<div class="productos marco_${cont}">
            <div class="producto_foto">
              <img class="foto" src=${producto.imagen}>
            </div>
            <div class="producto_texto">
              <label class="titulo text-2">${producto.nombre_producto}</label>
              <p class="text-3">${producto.descripcion}</p>
            </div>
			<div class="producto_precio">
              <label class="precio text-5">${producto.precio_producto} €</label>
            </div>
			<div class="producto_btn">
              <input type="hidden" name="tipo" value=${producto.id_producto}>
              <button type="button" class="boton btn-carta text-2" id="ButtonModal" data-toggle="modal" data-target="#myModal${key}" onclick="ButtonModal('${producto.nombre_producto}', '${key}')">Añadir</button>
              <div id="myModal${key}" class="modalContainer" tabindex="-1">
              	<div class="modal-content col-xs-6" id="modalContent${key}">`              		
              		let diving = document.getElementById(`modalContent${key}`);
              		diving.innerHTML += 
	              	  `<div>
	                    <h2 id="modal-id${key}" style="display:none">${producto.id_producto}</h2>
	                    <h2 id="modal-titulo${key}" class="modal-h2 text-2 size-40">${producto.nombre_producto}</h2>
	                    <button type="button" id="ButtonClose" class="modalClose" onclick="Close(${key})">X</button>
	                  </div>
	                  <label class="modal-canti text-3 fw-bold size-20">Ingredientes:</label>
	                  <div id="modalIngred${key}">`
						//let div_ingred = document.getElementById(`modalIngred${key}`);
						//console.log(div_ingred)
						//let ingredientes;
						

						
						// var promesa = new Promise(function(resolve, reject){							
							
						// 	const a = mostraringredientes2(producto.id_producto, key)
						// 	.then(ingredientes => {
						// 		let div_alr = document.getElementById('modalContent'+ key);
						// 		console.log("--------------------")
						// 			console.log("--------------------")
						// 			console.log(key)
						// 			console.log(div_alr);
						// 			console.log("--------------------")
						// 			console.log("--------------------")
						// 		console.table(ingredientes);

						// 		ingredientes.forEach(ingred =>{
						// 			console.log(ingred)
						// 			div_alr.innerHTML +="wg3gergr";

						// 		});
								
									
						// 	});
						// 	//console.log(div_alr);
						// 	resolve(a)
						// }).then(data => {
						// 	ingredientes = data;
						// 	let div_ing = document.getElementById('modalContent'+ key);
						// 	//console.log(div_alr);
						// 	let keyIng = 0;
						// 	ingredientes.forEach(ingred =>{
						// 		let valor1 = "";
						// 		let valor2 = "";
						// 		if(ingred.nombre_ingred == "pan_sandwich"){
						// 			valor1 = "checked disabled";
						// 		}else if(ingred.activo == 1){
						// 			valor2 = "checked";
						// 		}								
						// 		let i = `<label class="text-3 size-20 ps-2 pe-0 ps-lg-4 pe-lg-1">${ingred.nombre_ingred}</label>
						// 		<label class="text-3 size-20 ps-0 pe-0 pe-lg-1">${ingred.precio_ingred}€</label>
						// 		`;
						// 	//	console.log(i)
						// 		div_alr.innerHTML += i;
						// 		keyIng++;
						// 	});
						// })
						// .catch( err => console.log(err));
						
					diving.innerHTML +=                     
	                  `</div>
					  <div class="text-start">
	                    <label class="modal-canti text-3 size-20">Cantidad</label>
	                    <input type="number" class="modalCant text-3" id="modal-cantidad${key}" value="1">
	                    <button id="ButtonAdd" class="boton modalAdd" onclick="ButtonAdd(${key}, '${producto.id_producto}', '${producto.nombre_producto}', '${producto.descripcion}', '${producto.precio_producto}', '${producto.id_categoria}')">Añadir</button>
	                  </div>
                </div>
              </div>
            </div>
          </div>        
					`
					key++;
					cont++;
					if(cont > 4){
						cont=1
					}

			
			// let diving7 = document.getElementById('modalContent'+ posicion[key]);
			// console.log(posicion[key]);
			
			console.log("FIN FOREACH:"+key);
		});
			let kay = 0;
			const losIngredientes = [];
			posicion.forEach(pos => {
				//let diving7 = document.getElementById('modalIngred'+ kay);
				console.log(kay);
				const a = mostrar(pos)
				.then(ingredientes => {
					console.log(ingredientes);
					ingredientes.forEach(ingred =>{														
						losIngredientes[kay] = ingredientes;
					});									
				});
				kay++;
			});

			//let koy = 0;
			losIngredientes.forEach(losIngred => {
				
				console.log(losIngred);
				
				//koy++;
			});
	});
}

async function mostrarIng(producto){
	const datos_ing = new FormData();
	datos_ing.append('producto', producto);
	fetch('mostrar_ingredientes', {
		method: 'POST',
		body: datos_ing,
	}).then(ing => ing.json())
	.then(ing => {
		return ing;	
	});	
}


async function mostraringredientes(producto, key){
	
	return new Promise((resolve, reject) => {
		let div_ingred = document.getElementById('modalContent'+ key);
		
		const datos_ing = new FormData();
		datos_ing.append('producto', producto);
		fetch('mostrar_ingredientes', {
			method: 'POST',
			body: datos_ing,
		}).then(ing => ing.json())
		.then(ing => {						
			let keyIng = 0;
			ing.forEach(ingrediente => {
				let valor1 = "";
				let valor2 = "";
				if(ingrediente.nombre_ingred == "pan_sandwich"){
					valor1 = "checked disabled";
				}else if(ingrediente.activo == 1){
					valor2 = "checked";
				}

				div_ingred.innerHTML += 
					`<label class="text-3 size-20 ps-2 pe-0 ps-lg-4 pe-lg-1">${ingrediente.nombre_ingred}</label>
					<label class="text-3 size-20 ps-0 pe-0 pe-lg-1">${ingrediente.precio_ingred}€</label>
					<input type="checkbox" name="ingredientes-${keyIng}"[]" ${valor1} ${valor2} value="${ingrediente.id_ingrediente}">
					`
				keyIng++;
			});
		});
		//console.log(div_ingred)
		console.log(div_ingred);
		if(div_ingred != ""){
			resolve(div_ingred);			
		}else{
			reject("Fallo");
		}	
		
	});
}

async function mostraringredientes2(producto, key){
	
	return new Promise((resolve, reject) => {
		let div_ingred = document.getElementById('modalContent'+ key);
		const datos_ing = new FormData();
		datos_ing.append('producto', producto);
		fetch('mostrar_ingredientes', {
			method: 'POST',
			body: datos_ing,
		}).then(ing => ing.json())
		.then(ing => {
			if (ing != null && ing !== undefined){
				resolve(ing);
			}else{
				reject("Fallo");
			}
		});
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

async function mostrar(producto){
	return new Promise((resolve, reject) => {
		const datos_ing = new FormData();
		datos_ing.append('producto', producto);
		fetch('mostrar_ingredientes', {
			method: 'POST',
			body: datos_ing,
		}).then(ing => ing.json())
		.then(ing => {
			
		if (ing != null && ing !== undefined){
				resolve(ing);
			}else{
				reject("Fallo");
			}
		});
	});
}
