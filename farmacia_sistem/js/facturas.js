		$(document).ready(function(){
			load(1);
			
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_facturas.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					$('[data-toggle="tooltip"]').tooltip({html:true}); 
					
				}
			})
		}

		function eliminar (id){
			var q= $("#q").val();
			if (confirm("Realmente deseas eliminar la factura")){	
				$.ajax({
					type: "GET",
					url: "./ajax/buscar_facturas.php",
					data: "id="+id,"q":q,
					beforeSend: function(objeto){
						$("#resultados").html("Mensaje: Cargando...");
					},
					success: function(datos){
						$("#resultados").html(datos);
						load(1);
					}
				});
			}
		}
		
		function imprimir_factura(id_factura){
			VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_factura,'Factura','','1024','768','true');
		}


		function obtener_receta(id_factura){
			$.ajax({
				type: "GET",
				url:"obtener_receta.php?id="+id_factura,
				success:function(data){
					$(".fetched-data").html(data).fadeIn('slow');
					$('[data-toggle="tooltip"]').tooltip({html:true}); 
				}
			});
		}

		function update_factura(id){
			$.ajax({
				type: "GET",
				dataType:"json",
				url:"actualizar_factura.php?id="+id,
				success:function(mensaje){
					var response = mensaje.response;
					console.log(response);
					switch(response){
						case "Error":
							alert("Aun falta medicamento por entregar");
						break;
						case "actualizado":
							alert("Todo se ha entregado");
						break;
					}
					location.reload();
				}
			});
		}
