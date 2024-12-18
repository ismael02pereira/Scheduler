 <!-- Agendamento -->
 <div id="appointments" style="display: none;">
        <h2>Agendamento</h2>
        <form id="appointmentForm">
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="appointmentEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="appointmentEmail" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Arquivo:</label>
                <input type="file" class="form-control" id="file">
            </div>
            <div class="mb-3">
                <label for="dateTime" class="form-label">Data e Hora:</label>
                <input type="datetime-local" class="form-control" id="dateTime" required>
            </div>
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>
</div>
