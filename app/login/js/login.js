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
        console.log(userData);

        axios({
            method: "POST",
            url: "http://localhost/Scheduler/app/login/auth.php",
            data: userData,
        }).then(function (response) {
            console.log(response)
        }).catch(function (error) {
            console.error("Erro na requisição:", error);
        });
        // console.log('Dados do Usuário:', userData);
        // alert('Login efetuado com sucesso!');
    });
});