<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" type="image/icon" href="favicon.ico">
    <title>Tutoriais</title>
</head>

<body>   
    <header class="page-header-ui header-gradient position-relative">
        <div class="symbol">
            <img src="image/tezus-logo.svg">
            <div class="tezeu position-absolute">
                <div class="position-relative"><img src="image/dungeon-tezus.svg" class="position-absolute"></div>
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

    <?php 
        require 'config_paths.php'; 
        require_once 'data_access.php';
        $dataAccess = new DataAccess();        
        $result = $dataAccess->getAllTutorials();        
    ?>

    <script type="module">
        import {TutorialList} from "<?=URL_DEFAULT_PATH?>/js/tutorialScreenRender.js";
        let tutorial_list = new TutorialList(document, [<?= implode(',', $result) ?>], '<?=URL_DEFAULT_PATH . URL_TUTORIAL_PATH?>');
    </script>
</body>

</html>