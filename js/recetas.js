function medicamentos(event,id){
	alert(event.target.value);
	crear_caja_receta(id,event.target.value);
}

function crear_caja_receta(id,num_forms){
	document.getElementById(id).innerHTML = "<h4>Receta</h4>";

	for(var i=1;i<=parseInt(num_forms);i++){
		var div_id1 = crear_div(id,i,"form-group marco");
		crear_label(div_id1,"col-lg-2 control-label","Medicamento");
		var div_id2 = crear_div(div_id1,"2".concat(i),"col-md-6");
		crear_input(div_id2,"form-control","Medicamento".concat(i),"text","Nombre del Medicamento");
		crear_label(div_id1,"col-lg-2 control-label","Cantidad");
		var div_id3 = crear_div(div_id1,"3".concat(i),"col-md-2");
		var num_med = ["1","2","3","4","5"];
		crear_select(div_id3,i,"form-control","Cantidad".concat(i),num_med);
		crear_label(div_id1,"col-lg-2 control-label","Prescripción");
		var div_id4 = crear_div(div_id1,"4".concat(i),"col-md-10");
		crear_textArea(div_id4,"form-control","Prescripcion","Prescripción");
	}	
}

function crear_div(id_padre,id,clase){
	var div = document.createElement("div");
	var div_att_clase = document.createAttribute("class");
	div_att_clase.value = clase;
	var div_att_id = document.createAttribute("id");
	var div_att_id_value = "div".concat(id);
	div_att_id.value = div_att_id_value; 
	div.setAttributeNode(div_att_clase);
	div.setAttributeNode(div_att_id);
	document.getElementById(id_padre).appendChild(div);
	return div_att_id_value;
}

function crear_label(id_padre,clase,nombre_mostrar){
	var label = document.createElement("label");
	label_att_class = document.createAttribute("class");
	label_att_class.value = clase;
	label.setAttributeNode(label_att_class);
	document.getElementById(id_padre).appendChild(label).innerHTML = nombre_mostrar;
}

function crear_input(id_padre,clase,nombre,tipo,placeholder){
	var input = document.createElement("input");
	var input_att_type = document.createAttribute("type");
	input_att_type.value = tipo;
	input.setAttributeNode(input_att_type);
	var input_att_class = document.createAttribute("class");
	input_att_class.value = clase;
	input.setAttributeNode(input_att_class);
	var input_att_name = document.createAttribute("name");
	input_att_name.value = nombre;
	input.setAttributeNode(input_att_name);
	var input_att_placeholder = document.createAttribute("placeholder");
	input_att_placeholder.value = placeholder;
	input.setAttributeNode(input_att_placeholder);
	document.getElementById(id_padre).appendChild(input);
}

function crear_select(id_padre,id,clase,nombre,array_option){
	var select = document.createElement("select");
	var select_att_clase = document.createAttribute("class");
	select_att_clase.value = clase;
	select.setAttributeNode(select_att_clase);
	var select_att_id = document.createAttribute("id");
	var select_att_id_value = "select".concat(id);
	select_att_id.value = select_att_id_value;
	select.setAttributeNode(select_att_id);
	var select_att_name = document.createAttribute("name");
	select_att_name.value = nombre;
	select.setAttributeNode(select_att_name);
	document.getElementById(id_padre).appendChild(select);

	var select_aux =  document.getElementById("select".concat(id));
	for(var i=0;i<array_option.length;i++){
		var option = document.createElement("option");
		option.text = array_option[i];
		if(i == 0){
			var option_aux =  document.createAttribute("selected");
		}
		select_aux.add(option);
	}

	document.getElementById(id_padre).appendChild(select);
}

function crear_textArea(id_padre,clase,nombre,placeholder){
	var textArea = document.createElement("textarea");
	var textArea_att_class = document.createAttribute("class");
	textArea_att_class.value = clase;
	textArea.setAttributeNode(textArea_att_class);
	var textArea_att_name = document.createAttribute("name");
	textArea_att_name.value = nombre;
	textArea.setAttributeNode(textArea_att_name);
	var textArea_att_placeholder = document.createAttribute("placeholder");
	textArea_att_placeholder.value = placeholder;
	textArea.setAttributeNode(textArea_att_placeholder);
	document.getElementById(id_padre).appendChild(textArea);
}