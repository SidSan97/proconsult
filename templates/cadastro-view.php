<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>
<body>
    <form action="http://127.0.0.1/edsa-proconsult/api/cadastrar" method="post">
        <input type="text" name="nome" placeholder="nome"><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="text" name="cpf" placeholder="cpf"><br>
        <input type="password" name="senha" placeholder="senha"><br>
        <input type="text" name="nivel" placeholder="nivel"><br>

        <button type="submit" name="enviar">enviar</button>
    </form>

</body>
</html>