<?php
/*
Template Name: Agenda
*/
session_start();
global $wp_query;
global $wpdb;

$id = $_SESSION['login']['id'];
$reservations = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}reservation WHERE $id = id_creche");
if(empty($id) || !is_numeric($id)) {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
} else {
$length = count($reservations);
?>

<!DOCTYPE html>

<head>
    <title>Planning</title>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
    rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' rel='stylesheet' />

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' rel='stylesheet' />

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css' rel='stylesheet' />

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css' rel='stylesheet' />

    <style>

        html, body {

            font-size: 14px;

            font-family: Roboto, sans-serif;

            background: #e2e2e2;

        }

        #calendar{

            width: 80%;


            margin-left: 100px;

            box-shadow: 0px 0px 10px #000;

            padding:15px;

            background: #fff;

        }

        #calendar-container {

            position: fixed;

            top: 0%;

            text-align: center;

            left: 10%;

            right: 10%;

            bottom: 20%;

        }

    </style>

</head>

<body>

<div id='calendar-container'>

    <div id='calendar'></div>

</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js'></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        $.ajax({
            // Adresse à laquelle la requête est envoyée
            url: '../requestreservation',
            type: 'POST',
            // La fonction à apeller si la requête aboutie

            success: function (reservations) {
                var reservation = jQuery.parseJSON(reservations);
                console.log(reservation);
                var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        locale: 'fr',


                        events: [
                        <?php
                            for($i = 0;  $i < $length ; $i++) { ?>
                            {
                                title: 'Nom de l\'enfant : ' + reservation[<?= $i ?>]['nom'] + ' ' + reservation[<?= $i ?>]['prenom'],
                                start: reservation[<?= $i ?>]['date_resa'],
                                end: reservation[<?= $i ?>]['fin_resa'],
                                allDay: false
                            },
                            <?php } ?>

                        ],


                        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

                        height: 'parent',

                        header: {

                            left: 'prev,next today',

                            center: 'title',

                            right: 'dayGridMonth, timeGridWeek'

                        },

                        defaultView: 'timeGridWeek',

                        navLinks: true, // can click day/week names to navigate views

                        editable: false,

                        eventLimit: true, // allow "more" link when too many events

                    });

                    console.log(calendar);
                    calendar.render();
            },
    })

    });

</script>
</body>
</html>
<?php }