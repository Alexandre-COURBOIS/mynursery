<?php
/*
Template Name: Agenda
*/
session_start();
global $wp_query;
global $wpdb;

$id = $_SESSION['login']['id'];
$reservations = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}reservation INNER JOIN {$wpdb->prefix}creche ON {$wpdb->prefix}reservation.id_creche = {$wpdb->prefix}creche.id_creche WHERE $id = {$wpdb->prefix}reservation.id_creche");

if(empty($id) || !is_numeric($id)) {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
} else {
$length = count($reservations);
?>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css' rel='stylesheet' />
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
                        customButtons: {
                            backHome: {
                                text: 'Retour au site',
                                click: function() {
                                    document.location.href='../';
                                }
                            }
                        },

                        minTime: '06:00:00',
                        maxTime: '22:00:00',
                        allDaySlot: false,
                        locale: 'fr',
                        height: parent,



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


                        header: {

                            left: 'prev,next today, backHome',

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
<?php get_header(); ?>
<div class='container-flex mt-4'>
    <h2 class="calendarTitle">Réservations <?php if (!empty($reservations)) : echo $reservations[0]->nom_creche; endif ?> </h2>
    <div id='calendar'></div>

</div>

<?php }