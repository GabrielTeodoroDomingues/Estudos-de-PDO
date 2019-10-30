<?php
    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';

    $db = new PDO($host, $user, $pass);

    $query = $db->query('SELECT * FROM alunos');

    $alunos = $query->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($cursos)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($alunos as $aluno): ?>
            <li><?php echo $aluno['nome'] ?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>