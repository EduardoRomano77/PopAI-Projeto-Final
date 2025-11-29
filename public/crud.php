<?php require_once "data/session_init.php"; ?>
<link rel="stylesheet" href="css/style.css">
<?php include "menu.php"; ?>

<div class="container">
    <h2>Metas Financeiras</h2>


    <h3>Cadastrar nova meta</h3>
    <form method="POST" action="crud.php">
        <label>Nome da Meta:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Valor desejado (R$):</label><br>
        <input type="number" name="valor" required><br><br>

        <label>Prazo (meses):</label><br>
        <input type="number" name="prazo" required><br><br>

        <input type="submit" name="criar" value="Criar Meta">
    </form>

    <hr><br>


    <?php
    if (isset($_POST['criar'])) {
        $meta = [
            "id" => uniqid(),
            "nome" => $_POST['nome'],
            "valor" => $_POST['valor'],
            "prazo" => $_POST['prazo']
        ];

        $_SESSION['metas'][] = $meta;
        echo "<p style='color:green;'>Meta criada com sucesso!</p>";
    }
    ?>

     
    <h3>Lista de Metas</h3>

    <table>
        <tr>
            <th>Nome</th>
            <th>Valor (R$)</th>
            <th>Prazo (meses)</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($_SESSION['metas'] as $meta): ?>
        <tr>
            <td><?= $meta['nome'] ?></td>
            <td><?= $meta['valor'] ?></td>
            <td><?= $meta['prazo'] ?></td>
            <td>
                <a href="editar.php?id=<?= $meta['id'] ?>"><button>Editar</button></a>
                <a href="remover.php?id=<?= $meta['id'] ?>"><button>Remover</button></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
