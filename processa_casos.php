<?php
include_once('controle.php');

if (isset($_POST['cadastrar'])) {
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $local = mysqli_escape_string($conexao, $_POST['local']);
    $date = mysqli_escape_string($conexao, $_POST['data']);
    $descricao = mysqli_escape_string($conexao, $_POST['texto']);

    if (!empty($titulo) && !empty($local) && !empty($date) && !empty($descricao) && !empty($_FILES['imagem'])) {
        $sql = "INSERT INTO caso (titulo, local, data, descricao) VALUE ('$titulo', '$local', '$date', '$descricao')";
        $result = mysqli_query($conexao, $sql);

        if ($result == true) {
            $id_caso = mysqli_insert_id($conexao);

            $files = $_FILES['imagem'];
            $names = $files['name'];
            $tmp_names = $files['tmp_name'];
            $diretorio = "uploads/";
            
            foreach ($names as $index => $name) {
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $newname = uniqid() . '.' . $extension;
                move_uploaded_file($tmp_names[$index], $diretorio . $newname);

                $arquivo = $diretorio . $newname;
                $sql = "INSERT INTO imagem (id_caso, url) VALUE ('$id_caso', '$arquivo')";
                $resultado = mysqli_query($conexao, $sql);
            }
            if ($resultado == true) {
                header("Location: list_casos.php?msg=1");
            } else {
                echo mysqli_errno($conexao) . mysqli_error($conexao);
                die();
            }
        } else {
            echo mysqli_errno($conexao) . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: cad_casos.php?msg=1");
    }
} else if (isset($_POST['editar'])) {
    $id_caso = mysqli_escape_string($conexao, $_POST['id_caso']);
    $titulo = mysqli_escape_string($conexao, $_POST['titulo']);
    $local = mysqli_escape_string($conexao, $_POST['local']);
    $date = mysqli_escape_string($conexao, $_POST['data']);
    $descricao = mysqli_escape_string($conexao, $_POST['texto']);

    if (!empty($titulo) && !empty($local) && !empty($date) && !empty($descricao)) {
        $sql = "UPDATE caso SET titulo='$titulo', local='$local', data='$date', descricao='$descricao' WHERE id_caso='$id_caso'";
        $result = mysqli_query($conexao, $sql);

        if ($result == true) {
            if (isset($_FILES['imagem'])) {
                $files = $_FILES['imagem'];
                $names = $files['name'];
                $tmp_names = $files['tmp_name'];
                $diretorio = "uploads/";

                $sql = "SELECT * FROM imagem WHERE id_caso='$id_caso'";
                $consulta = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($consulta)) {
                    unlink($dados['url']);
                }
                $sql1 = "DELETE FROM imagem WHERE id_caso='$id_caso'";
                $result1 = mysqli_query($conexao, $sql1);
                if ($result1 == true) {
                    foreach ($names as $index => $name) {
                        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        $newname = uniqid() . '.' . $extension;
                        move_uploaded_file($tmp_names[$index], $diretorio . $newname);
                        $arquivo = $diretorio . $newname;

                        $sql = "INSERT INTO imagem (id_caso, url) VALUE ('$id_caso', '$arquivo')";
                        $resultado = mysqli_query($conexao, $sql);
                    }
                    if ($resultado == true) {
                        header("Location: list_casos.php?msg=2");
                    } else {
                        echo mysqli_errno($conexao) . mysqli_error($conexao);
                        die();
                    }
                } else {
                    echo mysqli_errno($conexao) . mysqli_error($conexao);
                    die();
                }
            } else {
                header("Location: list_casos.php?msg=2");
            }
        } else {
            echo mysqli_errno($conexao) . mysqli_error($conexao);
            die();
        }
    } else {
        header("Location: edit_casos.php?id_caso=$id_caso&msg=1");
    }

} else if (isset($_GET['deletar'])) {
    $id_caso = mysqli_escape_string($conexao, $_GET['deletar']);
    $sql = "SELECT * FROM imagem WHERE id_caso='$id_caso'";
    $consulta = mysqli_query($conexao, $sql);
    while ($dados = mysqli_fetch_assoc($consulta)) {
        unlink($dados['url']);
    }
    $sql1 = "DELETE FROM imagem WHERE id_caso='$id_caso'";
    $sql2 = "DELETE FROM caso WHERE id_caso='$id_caso'";
    $result1 = mysqli_query($conexao, $sql1);
    $result2 = mysqli_query($conexao, $sql2);
    if ($result1 == true && $result2 == true) {
        header("Location: list_casos.php?msg=3"); 
    } else {
        echo mysqli_errno($conexao) . mysqli_error($conexao);
        die();
    }
}
?>