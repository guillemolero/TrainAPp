<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='calendar/resources/fullcalendar.min.css' rel='stylesheet' />
<link href='calendar/resources/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/lib/jquery.min.js'></script>
<script src='calendar/lib/jquery-ui.min.js'></script>
<script src='calendar/resources/fullcalendar.min.js'></script>
<?php 

    include "functions/database.php";

    ?>
    
        <script>

	$(document).ready(function() {


		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
                
                


		/* initialize the calendar
		-----------------------------------------------------------------*/

		


	});

</script>
<script>
            $(document).ready(function() { 
            
            $('#calendar').fullCalendar({
                            header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                            },
                            editable: true,
                            droppable: true, // this allows things to be dropped onto the calendar
                            drop: function(date) {
                                    // is the "remove after drop" checkbox checked?
                                    if ($('#drop-remove').is(':checked')) {
                                            // if so, remove the element from the "Draggable Events" list
                                            $(this).remove();
                                    }
                                    //recoje el item al soltarlo y le añade como ID la fecha en segundos desde 1970 (epoch)
                                    $('.fc-title').attr('id',date);
                            },
                            editable: true,
                            eventLimit: true, // allow "more" link when too many events
                            events: [
                                    { <?php ?>
                                            title: 'All Day Event',
                                            start: '2017-04-01'
                                    },

                            ]
                            
                    });
    });
                    
</script>

<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
		width: 900px;
	}

</style>
</head>
<body>
	<div id='wrap'>

		<div id='external-events'>
			<h2>Ejercicios</h2>
                        <div id ="acordeon">
                            <div id = "apartado1">
                                <h3>Hombros</h3>
                                <div class="contenido">
                                <?php loadSelect("HOMBROS"); ?>
                                </div>
                            </div>
                            <div id = "apartado2">
                                <h3>Pecho</h3>
                                <div class="contenido">
                                <?php loadSelect("PECHO"); ?>
                                </div>
                            </div>
                            <div id = "apartado3">
                                <h3>Espalda</h3>
                                <div class="contenido">
                                <?php loadSelect("ESPALDA"); ?>
                                </div>
                            </div>
                            <div id = "apartado4">
                                <h3>Brazos</h3>
                                <div class="contenido">
                                <?php loadSelect("BRAZOS"); ?>
                                </div>
                            </div>
                            <div id = "apartado5">
                                <h3>Piernas</h3>
                                <div class="contenido">
                                <?php loadSelect("PIERNAS"); ?>
                                </div>
                            </div>
                        </div>
                       
			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>

	</div>
    <script>

	$(document).ready(function() {

		$('#acordeon').children().children("h3").click(function() {

			$(this).siblings(".contenido").slideToggle();
			console.log($(this).siblings(".contenido"));
			});			
		});
</script>

</body>
</html>
