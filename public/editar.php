<?php require_once "data/session_init.php"; ?>
<link rel="stylesheet" href="css/style.css">
<?php include "menu.php"; ?>

<div class="container">
    <h2>Editar Meta</h2>

    <?php
    $id = $_GET['id'];
    $metaAlvo = null;

    foreach ($_SESSION['metas'] as $i => $m) {
        if ($m['id'] === $id) {
            $metaAlvo = $m;
            $index = $i;
        }
    }

    if (!$metaAlvo) {
        die("Meta não encontrada");
    }

    if (isset($_POST['salvar'])) {
        $_SESSION['metas'][$index]['nome'] = $_POST['nome'];
        $_SESSION['metas'][$index]['valor'] = $_POST['valor'];
        $_SESSION['metas'][$index]['prazo'] = $_POST['prazo'];

        echo "<p style='color:green;'>Meta atualizada!</p>";
    }
    ?>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $metaAlvo['nome'] ?>" required><br><br>

        <label>Valor:</label><br>
        <input type="number" name="valor" value="<?= $metaAlvo['valor'] ?>" required><br><br>

        <label>Prazo (meses):</label><br>
        <input type="number" name="prazo" value="<?= $metaAlvo['prazo'] ?>" required><br><br>

        <input type="submit" name="salvar" value="Salvar Alterações">
    </form>

    <br>
    <a href="crud.php"><button>Voltar</button></a>
</div>
