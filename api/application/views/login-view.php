<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<p>LOGIN</p>
    <form action="<?= base_url() ?>api/loginUsuario" method="post">
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="senha" placeholder="senha"><br>

        <button type="submit" name="enviar">enviar</button>
    </form>
</body>
</html>