<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tutorial.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" type="image/icon" href="favicon.ico">
    <title>Loja Magento no Docker</title>
</head>

<body class="block-overflow">    
    <header class="intro">
        <div class="container">
            <div class="shadow card py-2">
                <div class="card-body d-flex align-items-center">
                    <div id="tutorial_title" class="display-5 text-secondary">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info" id="sub_title"></h6>
                </div>
                <div class="card-body d-flex flex-wrap bg-light tutorial-steps-card">
                    <div class="col-12 col-md-6" id="tutorial_steps"></div>
                    <div class="col-12 col-md-6">
                        <div class="video-container">
                            <div id="player"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="alert-container d-flex w-100 justify-content-center" id="alertBox">
        <div class="alert" role="alert"></div>
    </div>

    <?php require 'config_paths.php' ?>

    <!-- Carrega os passos do tutorial -->
    <?php 
        require_once 'data_access.php';
        $dataAccess = new DataAccess();
        $result = $dataAccess->getContentById($_GET['tutorial_id']);
    ?>
    <script type="module">       
        import TutorialScreenRender from '<?=URL_DEFAULT_PATH?>/js/tutorialScreenRender.js';        
        let tutorial_object = JSON.parse(<?= $result ?>);
        new TutorialScreenRender(document, tutorial_object);
    </script>

    <!-- Carrega a API do YT  -->
    <script src="<?=URL_DEFAULT_PATH?>/js/youtubeApi.js"></script>

    <!-- Seta listeners e outras funções do JS -->
    <script type="module">
        import Utils from "<?=URL_DEFAULT_PATH?>/js/utils.js";

        const intro_end = document.querySelector('.intro .container');
        intro_end.addEventListener('animationend', context => {
            if (context.animationName === 'intro-end') document.body.classList.remove('block-overflow');
        });

        function listeners() {
            document.querySelectorAll('[url-copy]').forEach(elem => {
                let lastChild = elem.lastChild,
                    iconElem = document.createElement('i');
                iconElem.classList.add('ps-2', 'fa-regular', 'fa-copy');
                lastChild.append(iconElem);
                elem.addEventListener('click', event => { Utils.copyToClipBoard(elem.attributes['url-copy'].value); })
            });

            document.querySelectorAll('[yt-timestamp]').forEach(elem => {
                let timeStamp = elem.attributes['yt-timestamp'].value;
                elem.setAttribute('fancyTime', Utils.fancyTimeFormat(timeStamp))
                elem.addEventListener('click', event => { player.seekTo(elem.attributes['yt-timestamp'].value); })
            });

            document.addEventListener('scroll', () => {
                if (window.innerWidth < 768) return;
                const initial_scroll_validation = document.querySelector('.tutorial-steps-card').getClientRects()[0].y - document.body.getClientRects()[0].y,
                    ytPlayer = document.querySelector('#player');
                if (window.pageYOffset < initial_scroll_validation) return ytPlayer.style.top = '';
                ytPlayer.style.top = `${window.pageYOffset - initial_scroll_validation}px`;
            })

            window.onbeforeunload = function () {
                window.scrollTo(0, 0);                    
            }
        }

        window.addEventListener('load', () => {
            listeners();
            setTimeout(() => ytVideoValidation(), 1000);

            function ytVideoValidation() {
                if (document.querySelector('[yt-link]') && !document.querySelector('iframe')) {
                    Utils.showAlert('Ocorreu um erro ao carregar o vídeo, vamos atualizar a página. Aguenta aí!', 5000, 'alert-danger')
                    setTimeout(document.location.reload, 2000);
                }
            }
        });

        
    </script>

</body>

</html>