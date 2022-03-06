<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require 'header.php' ?>
    <link rel="stylesheet" href="web/css/index.css">
    <title>Tutoriais</title>
</head>

<body>
    <header class="page-header-ui header-gradient position-relative">
        <div class="symbol">
            <img src="web/image/tezus-logo.svg">
            <div class="tezeu position-absolute">
                <div class="position-relative"><img src="web/image/dungeon-tezus.svg" class="position-absolute"></div>
            </div>
        </div>
        <div class="container page-header-container">
            <div class="row align-items-center">
                <div class="text-white display-3 ">
                    <div>Tutorial</div>
                    <div>Tezus</div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container-fluid">

            <div class="card shadow py-4">
                <div class="card-body">
                    <div class="container">
                        <div class="row g-1" id="tutorial_list">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <div class="admin-btn bg-light d-flex align-items-center" onclick="goAdmin()">
        <div>
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="ps-2 pe-3 back">
            Admin
        </div>
    </div>

    <?php
    require 'config_paths.php';
    require_once 'db/data_access.php';
    $dataAccess = new DataAccess(DB_NAME);
    $result = $dataAccess->getAllTutorials();
    ?>

    <script>
        function goAdmin() {
            window.location.href = './admin';
        }
    </script>

    <script type="module">
        import {TutorialList} from "<?= URL_DEFAULT_PATH ?>/js/tutorialScreenRender.js";
        let tutorial_list = new TutorialList(document, [<?= implode(',', $result) ?>], '<?= URL_DEFAULT_PATH . URL_TUTORIAL_PATH ?>');
    </script>
</body>

</html>