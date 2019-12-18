<?php
	$events = ReservationData::getEvery();
	if(count($events)){
		foreach($events as $event){
			$idpan = $event->pacient_id;
			try{
				if($paciente = PacientData::getById($idpan)){
					$nomcp = $paciente->name." ".$paciente->lastname;
					$thejson[] = array("title"=>$nomcp,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);
				}else{
					throw new Exception('No hay datos en el objeto');
				}
			}catch(Exception $e){
				
			}
		}
		json_encode($thejson);
	}else{
		$thejson = (object)[];
		json_encode($thejson);
	}	
?>
<script>	
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
			Date:"Y-m",
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});	
	});
</script>

<div class="row">
	<div class="col-md-12">
		<h1>Calendario</h1>
		<div id="calendar"></div>
	</div>
</div>