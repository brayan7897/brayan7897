<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="logo-container">
        <a href="#" class="logo"><img src="../imagenes/logo1.png" alt=""></a>
    </div>
    <div class="container-login">
        <div class="register-container">
            <h1>Registro de cuenta gratis</h1>
            <div class="datos-registro">
                <form action="registro.php" method="post">
                    <div class="correo">
                        <p>Direccion de correo electronico</p>
                        <input type="text" name="correo-r" class="correo-r" placeholder="email">
                    </div>
                    <div class="n_usuario">
                        <p>Nombre de usuario</p>
                        <input type="text" name="usuario-r" class="usuario-r" placeholder="usuario">
                    </div>
                    <div class="password">
                        <p>Contraseña</p>
                        <input type="password" name="password-r" class="password-r" placeholder="contraseña">
                    </div>
                    <input type="submit" value="Crear cuenta" class="bt-registrar"></input>
                </form>
            </div>
        </div>
        <div class="login">
                <h1>Iniciar sesion</h1>
                <div class="datos-login">
                    <form action="ingresar.php" method="post">
                        <div class="correo-login">
                            <p>Nombre de usuario</p>
                            <input type="text" name="usuario-l" class="usuario-l" placeholder="Usuario">
                        </div>
                        <div class="password-login">
                            <p>Contraseña</p>
                            <input type="password" name="password-l" class="password-l" placeholder="Password">
                        </div>
                        <input type="submit" value="Ingresar" class="bt-logear">
                    </form>
                </div>
        </div>
    </div>
</body>
</html>