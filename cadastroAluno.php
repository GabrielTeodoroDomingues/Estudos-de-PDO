<?php
   include_once('config/conexão.php');
   $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];

    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) 
    values (:nome,:ra,:cursos_id)');

    $resultado = $query ->execute([
        'nome'=>$nomeAluno,
        'ra'=>$raAluno,
        'cursos_id'=> $cursoId]);

    var_dump($resultado);
?>