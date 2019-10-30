<?php
    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];

    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';

    $db = new PDO($host, $user, $pass);

    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) 
    values (:nome,:ra,:cursos_id)');

    $resultado = $query ->execute([
        'nome'=>$nomeAluno,
        'ra'=>$raAluno,
        'cursos_id'=> $cursoId]);

    var_dump($resultado);
?>