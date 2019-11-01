<?php
   include_once('config/conexão.php');

    $query = $db->query('SELECT * FROM cursos');

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($cursos)
    // recuperando o id na url.

    if(isset($_GET['id'])){

        $id = $_GET['id'];
    }elseif(isset($_POST['id'])) {
        $id = $_POST['id'];
    }else {
        echo 'Você deve passar um id';
        exit;
    }

    $query = $db->prepare('SELECT * FROM alunos WHERE id = ?');

    $query->execute([$id]);
    $aluno = $query->fetch(PDO::FETCH_ASSOC);
var_dump($_POST);
    if($_POST != []){
        $nomeAluno = $_POST['nomeAluno'];
        $raAluno = $_POST['raAluno'];
        $cursoId = $_POST['curso'];
        $id = $_POST['id'];

        $query = $db->prepare('UPDATE alunos SET nome = :nome, ra = :ra, curso_id = :curso_id WHERE id = :id');
        $resultado = $query->execute(['id' => $id, 'curso_id' => $cursoId, 'ra' => $raAluno, 'nome' => $nomeAluno]);
        var_dump($id);
    };

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
    <form action="updateAluno.php" method="post">
        <input type="text" name = 'id' readonly hidden value='<?php echo $id ?>'>
        <h2>Nome aluno</h2>
        <input type="text" name = 'nomeAluno' value = '<?php echo $aluno['nome'];?>'>
        <h2>Ra do aluno</h2>
        <input type="text" name = 'raAluno' value = '<?php echo $aluno['ra'];?>' readonly>
        <h2>Cuesos disponíveis</h2>
        <select name="curso" id="">
            <?php foreach($cursos as $curso): ?> 
               <?php if($curso['id'] == $aluno['curso_id']): ?>
                <option selected value="<?php $curso['id']; ?>">
                    <?php echo $curso['nome']; ?>
                </option>
                <?php else: ?>
                <option value="<?php $curso['id'];?>">
                    <?php echo $curso['nome']; ?>
                </option>
                <?php endif; ?>
    
    
            <?php endforeach; ?>
        </select>
        <button type="submit">Salvar alterações</button>
    </form>
</body>
</html>