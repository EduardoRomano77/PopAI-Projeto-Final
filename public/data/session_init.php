<?php
session_start();

if (!isset($_SESSION['metas'])) {
    $_SESSION['metas'] = [];
}
