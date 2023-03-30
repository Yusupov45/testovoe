<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            background-color: azure;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-2">
    <div class="row bg-white shadow-sm col-3">
        <div id="Answer"></div>
        <div class="col border rounded p-4" id="Form">
            <h3 class="text-center mb-4">Регистрация</h3>
                <div class="form-group mb-3">
                    <label for="Name">Имя</label>
                    <input type="text" class="form-control" id="Name" placeholder="Введите имя">
                </div>
                <div class="form-group mb-3">
                    <label for="Surname">Фамилия</label>
                    <input type="text" class="form-control" id="Surname" placeholder="Введите фамилию">
                </div>
                <div class="form-group mb-3">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" id="Email" placeholder="Введите email">
                </div>
                <div class="form-group mb-3">
                    <label for="Password">Пароль</label>
                    <input type="password" class="form-control" id="Password" placeholder="Введите Пароль">
                </div>
                <div class="form-group mb-4">
                    <label for="RepeatPassword">Повторите пароль</label>
                    <input type="password" class="form-control" id="RepeatPassword" placeholder="Потворите пароль">
                </div>
                <div class="btn btn-primary w-100" onclick="sendAjaxRequest()">Зарегистрироваться</div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>
        function sendAjaxRequest() {

            let user = {
                name: document.getElementById('Name').value,
                surname: document.getElementById('Surname').value,
                email: document.getElementById('Email').value,
                password: document.getElementById('Password').value,
                repeat_password: document.getElementById('RepeatPassword').value,
            };

            url = 'ajax.php'

            fetch(url, {
                method: 'post',
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify(user) 
            }).then(response => response.json())
            .then(function (res) {

                document.getElementById('Answer').innerHTML = ('ERROR' in res) ? `<h5 class="text-center mb-4" style="color: red">${res['ERROR']}</h5>` : `<h5 class="text-center mb-4" style="color: green">${res['SUCCESS']}</h5>`

                if('SUCCESS' in res) {
                    document.getElementById('Form').setAttribute('hidden', '')
                }

            });

            
        }
    </script>
</body>
</html>