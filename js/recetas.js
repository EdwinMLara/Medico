function medicamentos(event,id){
	crear_caja_receta(id,event.target.value);
}

function crear_caja_receta(id,num_forms){
	document.getElementById(id).innerHTML = "<h4>Receta</h4>";

	for(var i=1;i<=parseInt(num_forms);i++){
		var div_id1 = crear_div(id,i,"form-group marco");
		crear_label(div_id1,"col-lg-2 control-label","Medicamento");
		var div_id2 = crear_div(div_id1,"2".concat(i),"col-md-6");
		crear_input(div_id2,i,"form-control","Medicamento".concat(i),"text","Nombre del Medicamento");
		crear_label(div_id1,"col-lg-2 control-label","Cantidad");
		var div_id3 = crear_div(div_id1,"3".concat(i),"col-md-2");
		var num_med = ["1","2","3","4","5"];
		crear_select(div_id3,i,"form-control","Cantidad".concat(i),num_med);
		crear_label(div_id1,"col-lg-2 control-label","Prescripción");
		var div_id4 = crear_div(div_id1,"4".concat(i),"col-md-10");
		crear_textArea(div_id4,i,"form-control","Prescripcion","Prescripción");
		autocomplete(document.getElementById("myInput".concat(i)), countries);
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

function crear_input(id_padre,id,clase,nombre,tipo,placeholder){
	var input = document.createElement("input");
	input.setAttribute("id","myInput".concat(id));
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

function crear_textArea(id_padre,id,clase,nombre,placeholder){
	var textArea = document.createElement("textarea");
	var textArea_att_class = document.createAttribute("class");
	textArea_att_class.value = clase;
	textArea.setAttributeNode(textArea_att_class);
	var textArea_att_name = document.createAttribute("name");
	textArea_att_name.value = nombre.concat(id);
	textArea.setAttributeNode(textArea_att_name);
	var textArea_att_placeholder = document.createAttribute("placeholder");
	textArea_att_placeholder.value = placeholder;
	textArea.setAttributeNode(textArea_att_placeholder);
	document.getElementById(id_padre).appendChild(textArea);
}

function autocomplete(inp, array){
	var currentFocus;

	inp.addEventListener("input",function(e){
		var a,b,i,val = this.value;
		closeALLList();
		if(!val){
			return false;
		}
		currentFocus = -1;

		a = document.createElement("div");
		a.setAttribute("id",this.id + "autocomplete-list");
		a.setAttribute("class","autocomplete-items");

		this.parentNode.appendChild(a);

		for(i=0;i<array.length;i++){
			if(array[i].substr(0,val.length).toUpperCase() == val.toUpperCase()){
				b = document.createElement("div");
				b.innerHTML = "<strong>" + array[i].substr(0,val.length) + "</strong>";
				b.innerHTML += array[i].substr(val.length);
				b.innerHTML += "<input type='hidden' value='" + array[i] +"'>";
				b.setAttribute("name",inp.name);
				b.addEventListener("click", function(e){
					inp.value = this.getElementsByTagName("input")[0].value;
					closeALLList();
				});
				
				a.appendChild(b);
			}
		}
	});
	
	inp.addEventListener("keydown",function(e){
		var x = document.getElementById(this.id + "autocomplete-list");
		if(x){
			x = x.getElementsByTagName("div");
		}
		if(e.keyCode == 40){
			//codigo 40 tecla flecha abajo
			currentFocus++;
			addActive(x);
		}else if(e.keyCode == 38){
			//codigo 38 tecla flecha arriba
			currentFocus--;
			addActive(x);
		}else if(e.keyCode == 13){
			//codigo 13 tecla enter
			e.preventDefault();
			if(currentFocus > -1){
				if(x) x[currentFocus].click();
			}

		}

	});

	function addActive(x){
		if(!x) return false;
		removeActive(x);
		if(currentFocus >= x.length){
			currentFocus = 0;
		}
		if(currentFocus < 0){
			currentFocus = (x.length - 1);
		}

		x[currentFocus].classList.add("autocomplete-active");
	}

	function removeActive(x){
		for(var i=0;i<x.length;i++){
			x[i].classList.remove("autocomplete-active");
		}
	}

	function closeALLList(elmnt){
		var x = document.getElementsByClassName("autocomplete-items");
		for (var i=0;i<x.length;i++){
			if(elmnt != x[i] && elmnt != inp){
				x[i].parentNode.removeChild(x[i]);
			}
		}
	}

	document.addEventListener("click",function(e){
		closeALLList(e.target);
	});
}



//var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
var countries = [];
var ids_countries = [];
autocomplete(document.getElementById("myInput"), countries);

$(document).ready(function(){
	$.ajax({
		url:"api/json-medicamentos-api.php",
		dataType:"json",
		type:"get",
		success: function(datos){
			var x = datos.Medicamentos;
			for (var i = 0; i < x.length;i++){
				countries.push(x[i].Nombre);
				ids_countries.push(x[i].id_medicamento);
			}
		}
	});
});

function actualizar_datos_titular(){
	var hay_titular = document.getElementById("hay_titular");
	switch(hay_titular.selectedIndex){
		case 0:
			alert("Si");
			$(".P1").hide();
			break;
		case 1:
			alert("No");
			$(".P1").hide();
			break;
	}
}