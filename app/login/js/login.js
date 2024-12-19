document.addEventListener('DOMContentLoaded', function () {
    const userType = document.getElementById('userType');
    const passwordGroup = document.getElementById('passwordGroup');
    const codGroup = document.getElementById('codGroup');

    userType.addEventListener('change', function () {
        if (userType.value === 'cliente') {
            passwordGroup.classList.add('d-none');
            codGroup.classList.remove('d-none');
        } else {
            passwordGroup.classList.remove('d-none');
            codGroup.classList.add('d-none');
        }
    });

    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const userData = {
            email: document.getElementById('email').value,
            password: userType.value === 'profissional' ? document.getElementById('password').value : null,
            cod: userType.value === 'cliente' ? document.getElementById('cod').value : null,
        };

        axios.post('http://localhost/Scheduler/app/login/auth.php', userData)
            .then(function (response) {
                console.log(response)
                if (!response.data.response) {
                    Swal.fire('Erro', 'Senha ou password incorretos', 'error');
                } else {
                    if(response.data.type == 'barber'){
                        Swal.fire('Sucesso', 'Login realizado com sucesso!', 'success');
                    }
                    window.location = "app/agendamento/agendamento.php";
                }
            })
            .catch(function (error) {
                console.error('Erro na requisição:', error);
                Swal.fire('Erro', 'Ocorreu um problema no servidor.', 'error');
            });
    });
});
