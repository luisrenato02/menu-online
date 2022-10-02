<?php
require_once "../inc/config.php";
require_once "../inc/model/group.php";
require_once "../inc/controller/group.php";

$group = new Group();

if (isset($_GET['group_id'])) {
	$group->setId($_GET['group_id']);

	$response = $group->findGroupById();
	$group_row = $response->fetch();
	$group_count = $response->rowCount();

	if ($group_count == 0) {
		echo "<script>alert('Esse grupo não existe');</script>";
		echo "<script>location.href = '" . $config->urlLocal . "/admin/groups.php';</script>";
	}

	$page_title = 'Editando ' . $group_row['group_name'];
}

require_once "../inc/views/header.php";
require_once "../inc/views/navbar.php";
?>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h2>Editar grupo</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="mt-4">
						<div class="form-group">
							<label>*Nome</label>
							<input type="text" name="group_name" class="form-control" value="<?php echo $group_row['group_name']; ?>" required>
							<input type="hidden" name="group_id" value="<?php echo $group_row['group_id']; ?>">
						</div>
						<div class="form-group mt-4">
							<button type="submit" class="btn btn-dark btn-lg btn-block" name="btn-group-update">Atualizar Grupo</button>
							<p class="text-center mt-2"><a href="groups.php" class="btn btn-link text-muted">Voltar</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "../inc/views/footer.php"; ?>