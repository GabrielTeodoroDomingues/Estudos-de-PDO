<?php
   include_once('config/conexão.php');

    $query = $db->query('SELECT * FROM cursos');

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($cursos)
    // recuperando o id na url.

    if(isset($_GET['id'])){

    $id = $_GET['id'];
    }else {
        echo 'Você deve passar um id';
        exit;
    }
    

    $query = $db->prepare('SELECT * FROM alunos WHERE id = ?');

    $aluno = $query->execute([$id]);
    $aluno = $aluno->fetch(PDO::FETCH_ASSOC);

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
    <form action="cadastroAluno.php" method="post">
        <h2>Nome aluno</h2>
        <input type="text" name = 'nomeAluno'>
        <h2>Ra do aluno</h2>
        <input type="text" name = 'raAluno'>
        <h2>Cuesos disponíveis</h2>
        <select name="curso" id="">
            <?php foreach($cursos as $curso): ?> 
                <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>