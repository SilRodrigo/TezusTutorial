<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require '../header.php' ?>
    <link rel="stylesheet" href="<?= URL_DEFAULT_PATH ?>/web/css/admin.css">
    <title>Criar novo tutorial</title>
</head>

<?php require_once 'validation_header.php';?>

<body>

    <main class="container-fluid">
        <div class="row">
            <div class="row col-7 p-0">
                <form class="user d-flex align-items-center justify-content-center">
                    <div class="card shadow col-6 p-0">
                        <div class="h4 card-header ">
                            Digite uma etapa para o tutorial
                        </div>
                        <div class="input-group p-3">
                            <input type="text" class="form-control form-control-user">
                            <div class="input-group-append">
                                <select class="btn btn-outline-secondary" type="button">
                                    <option value="div">div</option>
                                    <option value="a">a</option>
                                    <option value="pre">pre</option>
                                    <option value="sem_card">none</option>
                                </select>
                                <button class="btn btn-outline-secondary bg-info text-white" type="button"><i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <hr>
                            <div class="card">
                                <div class="card-body row gy-2">
                                    <div>
                                        Step em progresso...
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-end">
                                <button class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-5 shadow">
                <div class="border-left-secondary border-right-secondary creation-bg-color step-card-list">
                    <form class="user pt-4">
                        <div class="row px-1 py-2">
                            <div class="col-12 pb-4" id="tutorial_title">
                                <div class="card shadow">
                                    <div class="pointer h5 text-center card-header bg-primary text-white border-0">
                                        Título do tutorial
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="pointer display-5 text-center code-headers-unset code-header-content"><i
                                        class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>
                            <div class="col-12 pb-4" id="tutorial_subtitle">
                                <div class="card shadow">
                                    <div class="pointer h5 text-center card-header bg-info text-white">
                                        Texto de introdução
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="pointer h3 text-center text-info code-headers-unset code-header-content"><i
                                        class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>

                            <div class="px-4 col-12" id="tutorial_yt_link">
                                <div class="card shadow">
                                    <div class="h5 text-center card-header bg-danger text-white">
                                        Link do Youtube
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="pointer h3 text-dark text-center code-headers-unset code-header-content"><i
                                        class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>
                        </div>
                        <div class="pt-3 h2 text-center">Etapas</div>
                        <hr>
                        <div></div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <script type="module">
        import Utils from '/TezusTutorial/js/utils.js'
        document.querySelectorAll('.code-headers-edit').forEach(elem => {
            elem.addEventListener('keydown', (event) => {
                if ((event.key === 'Escape' || event.key === 'Enter') && event.target.value !== '') save_header(event);
            });
        });
        document.querySelectorAll('.code-header-content').forEach(elem => {
            elem.addEventListener('click', edit_header)
        });

        function save_header(context) {
            let header_top = Utils.recursiveToId(context.path, '[id]'),
                header = header_top.querySelector('.code-headers-unset'),
                header_edit_icon = header.querySelector('i');
            header.innerHTML = context.target.value;
            header.append(header_edit_icon);
            header.classList.remove('code-headers-unset');
            let hide_editor_header = header_top.querySelector('.card')
            hide_editor_header.classList.add('code-headers-unset');
        }

        function edit_header(context) {
            let header_top = Utils.recursiveToId(context.path, '[id]'),
                header = header_top.querySelector('.card');
            header.classList.remove('code-headers-unset');
            header.querySelector('input').focus();
            header_top.querySelector('.code-header-content').classList.add('code-headers-unset');
        }
    </script>

</body>

</html>