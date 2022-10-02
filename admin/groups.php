<?php
// inclui os arquivos .php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';
require_once '../inc/model/group.php';

$page_title = "Grupos";

$group = new Group();

$groups = $group->getAllgroups();
$group_count = $groups->rowCount();
$group_all = $groups->fetchAll();

if (isset($_GET['group_id'])) {
    $group->setId($_GET['group_id']);
    if ($group->delete()) {
        echo "<script>window.alert('Grupo excluido com sucesso!');</script>";
        echo "<script>location.href = '" . $config->urlLocal . "/admin/groups.php';</script>";
    }
}

require_once "../inc/views/header.php";
require_once "../inc/views/navbar.php";
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Lista de grupos</h4>
                        <a href="create_group.php">Criar grupo</a>
                    </div>
                    <?php if ($group_count > 0) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Grupo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($group_all as $group_row) { ?>
                                    <tr>
                                        <td><?php echo $group_row['group_id']; ?></td>
                                        <td><?php echo $group_row['group_name']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <i class="fas fa-ellipsis-v" id="dropdownMenuButton" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="group/<?php echo $group_row['group_id']; ?>"><i class="fas fa-pencil-alt mr-2"></i> Editar</a>
                                                    <a class="dropdown-item" href="?group_id=<?php echo $group_row['group_id']; ?>" onclick="return confirm('Deseja mesmo excluir?'); "><i class="fas fa-trash-alt mr-2"></i> Excluir</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        Nenhum grupo encontrado
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>