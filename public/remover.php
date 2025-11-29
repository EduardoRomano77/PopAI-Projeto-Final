<?php require_once "data/session_init.php"; ?>

<?php
$id = $_GET['id'];

foreach ($_SESSION['metas'] as $i => $m) {
    if ($m['id'] === $id) {
        unset($_SESSION['metas'][$i]);
        break;
    }
}

header("Location: crud.php");
exit();
