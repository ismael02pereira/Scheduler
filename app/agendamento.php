<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    // Inclui o arquivo header.php
    include('./header.php');
    
?>

<!-- Conteúdo principal da página -->
<div class="main-content ">
<div class="bg-primary base" style="border-radius: 10px 50px 10px 50px;">
    <p class="title-pag" id="mes"></p>
</div>
<div class="container-fluid mt-n22 px-6 sobreposto">
    <!-- <div class="card shadow-lg bg-white rounded">
        <div class="card-body">
        </div>
    </div> -->
    <div class="container mt-5">
        <!-- <div id='calendar-container'> -->
            <div id='calendar'></div>
        <!-- </div> -->
        <!-- <div id="appointments">
            <h2>Agendamento</h2>
            <form id="appointmentForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Arquivo:</label>
                    <input type="file" class="form-control" id="file" accept=".jpg,.png,.pdf">
                </div>
                <div class="mb-3">
                    <label for="dateTime" class="form-label">Data e Hora:</label>
                    <input type="datetime-local" class="form-control" id="dateTime" required>
                </div>
                <button type="submit" class="btn btn-primary">Agendar</button>
            </form>
        </div> -->
    </div>
</div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='fullcalendar/packages/core/main.js'></script>
<script src='fullcalendar/packages/interaction/main.js'></script>
<script src='fullcalendar/packages/daygrid/main.js'></script>
<script src='fullcalendar/packages/timegrid/main.js'></script>
<script src='fullcalendar/packages/list/main.js'></script>
<script src="js/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const meses = [
            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ];

        const data = new Date();  
        const nomeMes = meses[data.getMonth()];
        document.getElementById('mes').innerText = nomeMes;
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'timeGrid', 'list', 'timeGridPlugin' ],
            initialView: 'timeGridWeek',
            themeSystem: 'bootstrap',
            locale: 'pt-br',
            height: 'parent',
            header: {
            left: 'prev,next',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            defaultView: 'dayGridMonth',
            defaultDate: Date.now(),
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
            {
                title: 'All Day Event',
                start: '2020-02-01',
            },
            {
                title: 'Long Event',
                start: '2020-02-07',
                end: '2020-02-10'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-02-09T16:00:00'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-02-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2020-02-11',
                end: '2020-02-13'
            },
            {
                title: 'Meeting',
                start: '2020-02-12T10:30:00',
                end: '2020-02-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2020-02-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2020-02-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2020-02-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2020-02-12T20:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2020-02-28'
            },
            {
                title: 'Ismael Pereira',
                start: '2024-12-20T17:00:00',
                end: '2024-12-20T18:30:00'
            }
            ],
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate

                if (info.event.url) {
                window.open(info.event.url);
                }
            }
    
        });
    
        calendar.render();
    });

    document.getElementById('appointmentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('file', document.getElementById('file').files[0]);
        formData.append('dateTime', document.getElementById('dateTime').value);

        axios.post('http://localhost/Scheduler/app/appointments/add.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (response) {
            Swal.fire('Sucesso', 'Agendamento realizado com sucesso!', 'success');
            console.log(response.data);
        })
        .catch(function (error) {
            Swal.fire('Erro', 'Não foi possível realizar o agendamento.', 'error');
            console.error(error);
        });
    });
</script>

<?php
    // Inclui o arquivo footer.php
    include('footer.php');
?>
