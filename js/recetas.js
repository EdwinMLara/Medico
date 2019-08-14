function medicamentos(event){
	//var med = document.getElementById('medi');
	//var num_med = med.value;

	alert(event.target.value);
}

function crear_caja_receta(id){
	

}

function crear_div(id_padre,id,clase){
	var div = document.createElement("div");
	div.createAttribute("class").value = clase;
	div.createAttribute("id").value = id;
	document.getElementById(id_padre).appendChild(div);

}

function crear_label(id_padre,clase,nombre_mostrar){
	var label = document.createElement("label");
	label.createAttribute("class").value = clase;
	document.getElementById(id_padre).appendChild(label).innerHTML = nombre_mostrar;
}

function crear_input(id_padre,nombre_submit,tipo,clase,placeholder){
	var input = document.createElement("input");
	input.createAttribute("type").value = tipo;
	input.createAttribute("class").value = clase;
	input.createAttribute("name").value = nombre_submit;
	input.createAttribute("placeholder").value = placeholder;
	document.getElementById(id_padre).appendChild(input);
}

function crear_select(id_padre,id,nombre_submit,clase){
	var select = document.createElement("select");
	select.createAttribute("class").value = clase;
	select.createAttribute("name").value = name;
	select.createAttribute("id").value = id;
	// hay que agregar los options
	document.getElementById(id_padre).appendChild(select);
}

function crear_textArea(id_padre,nombre_submit,clase,placeholder){
	var textArea = document.createElement("textarea");
	textArea.createAttribute("class").value = clase;
	textarea.createAttribute("name").value = nombre_submit;
	textArea.createAttribute("placeholder").value = placeholder;
	document.getElementById(id_padre).appendChild(textArea);
}