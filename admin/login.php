<?php
//incluind arquivos conexao
require_once "../inc/config.php";
require_once "../inc/controller/login.php";
require_once "../inc/views/header.php";
?>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Login</h2>
                    <p>Por favor, preencha os campos para fazer o login.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nome do usuário</label>
                            <input type="text" name="username"
                                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php if (isset($_POST['username'])) { echo $username; } ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="password"
                                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <?php if (isset($errorMSG)) { ?>
                        <div class="alert alert-<?php echo ($errorType == "success") ? "success" : $errorType; ?>">
                            <h6 class="text-<?php echo ($errorType == "success") ? "success" : $errorType; ?>">
                                <?php echo $errorMSG; ?></h6>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <button type="submit" name="btn-login" class="btn btn-primary">Entrar</button>
                        </div>
                        <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>