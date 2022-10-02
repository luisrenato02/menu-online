<?php
require_once __DIR__ . '../../model/group.php';
require_once __DIR__ . '../../utils/core.php';

$group = new Group();

$error = false;

if (isset($_POST["btn-group-create"])) {
    $group_name = trim($_POST['group_name']);
    $group_name = strip_tags($group_name);
    $group_name = htmlspecialchars($group_name);

    if (empty($group_name)) {
        $error = true;
        $group_name_err = "Nome é um campo obrigatório";
    }

    if (!$error) {
        $group->setId(random_id(15));
        $group->setName($group_name);
        $response = $group->create();

        if ($response) {
            unset($_POST);
            echo "<script>alert('Grupo criado com sucesso!');</script>";
            echo "<script>location.href = '" . $config->urlLocal . "/admin/groups.php';</script>";
        } else {
            $errorType = "warning";
            $errorMSG = "Erro no servidor.";
        }
    }
}

if (isset($_POST["btn-group-update"])) {
    $group_id = trim($_POST['group_id']);
    $group_id = strip_tags($group_id);
    $group_id = htmlspecialchars($group_id);

    $group_name = trim($_POST['group_name']);
    $group_name = strip_tags($group_name);
    $group_name = htmlspecialchars($group_name);

    if (empty($group_name)) {
        $error = true;
        $group_name_err = "Nome é um campo obrigatório";
    }

    if (!$error) {
        $group->setId($group_id);
        $group->setName($group_name);
        $response = $group->update();

        if ($response) {
            unset($_POST);
            echo "<script>alert('Grupo atualizado com sucesso!');</script>";
            echo "<script>location.href = '" . $config->urlLocal . "/admin/groups.php';</script>";
        } else {
            $errorType = "warning";
            $errorMSG = "Erro no servidor.";
        }
    }
}
