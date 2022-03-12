<head>
    <?php require '../header.php' ?>
    <link rel="stylesheet" href="<?= URL_DEFAULT_PATH ?>/web/css/login.css">
    <title>Login</title>
</head>

<?php 
require_once 'validation.php';
$validation = new Validation(); 
if ($validation->validateSession()) $validation->loginSuccessful();
?>

<body class="bg-secondary d-flex align-items-center" style="height: 100vh;">
    <div class="container d-flex justify-content-center">
        <div class="card shadow col-12 col-md-7 col-xl-5 pb-4">
            <div class="card-body">
                <div class="col-12">
                    <div class="py-4 d-flex justify-content-center">
                        <div class="avatar"></div>
                    </div>
                    <div class="speech-bubble pt-2 mb-4 text-center">
                        <h3><?=$_GET['server_response'] ?? 'Calma lá jovem, vamo loga primeiro?' ?></h3>
                    </div>
                    <form class="user" action="./" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <div class="ms-1 custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>
                        <button href="./" type="submit" class="btn btn-success btn-user btn-block my-4">
                            Login
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
        <div class="floor-line"></div>
    </div>
</body>