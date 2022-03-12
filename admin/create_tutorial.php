<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require '../header.php' ?>
    <link rel="stylesheet" href="<?= URL_DEFAULT_PATH ?>/web/css/admin.css">
</head>

<?php require_once 'validation_header.php'; ?>

<body>

    <main class="container-fluid">
        <div class="row">
            <div class="row col-7 p-0">
                <div class="user d-flex align-items-center justify-content-center">
                    <div class="card shadow col-6 p-0">
                        <div class="h4 card-header ">
                            Edição da próxima etapa
                        </div>
                        <div class="card-body">
                            <form id="add_step_form" class="px-3">
                                <div class="input-group pt-2">
                                    <input type="text" name="elem_value" class="form-control form-control-user" placeholder="Digite a próxima etapa..." style="height: 50px;">
                                    <div class="input-group-append">
                                        <select id="step_elem_type" name="step_elem_type" class="btn btn-outline-secondary" type="button">
                                            <option value="div">div</option>
                                            <option value="a">a</option>
                                            <option value="pre">pre</option>
                                        </select>
                                        <button class="btn btn-outline-secondary bg-info text-white" type="submit"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="pt-3 a-link-container">
                                    <input type="text" name="a_link_value" placeholder="Adicione um link..." class="form-control form-control-user">
                                </div>
                                <hr>
                                <div class="text-end"><i onclick="edit_card.removeLastText()" class="pe-1 pointer fa-solid fa-arrow-rotate-left"></i></div>
                                <div id="edit_card_elem"></div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div class="input-group pb-3 col-8 ps-0">
                                        <input type="text" name="copy_value" placeholder="Texto para cópia..." class="form-control form-control-user">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary bg-info text-white"><i class="fa-regular fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="input-group pb-3 col-3 px-0">
                                        <input type="time" name="yt_timestamp" class="form-control form-control-user">
                                    </div>
                                </div>
                            </form>
                            <div class="text-end">
                                <button class="btn btn-primary" id="add_step_to_list">Adicionar às etapas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 shadow">
                <div class="border-left-secondary border-right-secondary creation-bg-color step-card-list">
                    <form class="user pt-4" id="tutorial_form">
                        <div class="d-flex flex-wrap px-1 py-2">
                            <div class="col-12 pb-4" id="tutorial_title">
                                <div class="card shadow">
                                    <div class="pointer h5 text-center card-header bg-primary text-white border-0">
                                        Título do tutorial
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input required class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div tutorial="tutorial_title" name="tutorial_title" class="pointer display-5 text-center code-headers-unset code-header-content"><i class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>
                            <div class="col-12 pb-4" id="tutorial_subtitle">
                                <div class="card shadow">
                                    <div class="pointer h5 text-center card-header bg-info text-white">
                                        Texto de introdução
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input required class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div tutorial="sub_title" name="sub_title" class="pointer h3 text-center text-info code-headers-unset code-header-content"><i class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>

                            <div class="col-12" id="tutorial_yt_link">
                                <div class="card shadow">
                                    <div class="h5 text-center card-header bg-danger text-white">
                                        Link do Youtube
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input required class="form-control code-headers-edit" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div tutorial="yt_link" name="yt_link" class="pointer h3 text-dark text-center code-headers-unset code-header-content"><i class="ps-2 text-lg fa-solid fa-pen-to-square"></i></div>
                            </div>
                        </div>
                        <div class="pt-3 h2 text-center">Etapas</div>
                        <hr>
                        <div class="text-end px-3"><i onclick="tutorial.steps.removeLast()" class="pe-1 pointer fa-solid fa-arrow-rotate-left"></i></div>
                        <div tutorial="steps" class="px-5"></div>
                        <div class="d-flex justify-content-center">
                            <div class="col-6 px-5 btn btn-outline-secondary bg-primary text-white finalizar">Finalizar
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="go-home-btn bg-light d-flex align-items-center" onclick="goHome()">
        <div>
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="ps-2 pe-3 back">
            Voltar
        </div>
    </div>

    <div class="alert-container d-flex justify-content-center align-items-center" id="alertBox">
        <div class="col-2 avatar"></div>
        <div class="col-10 alert d-flex align-items-center" role="alert">teste</div>
    </div>

    <script>
        var tutorial,
            edit_card,
            tutorialRender,
            createStepCardRender;
    </script>

    <script>
        function goHome() {
            window.location.href = '<?= URL_DEFAULT_PATH ?>';
        }
    </script>


    <!-- Renderizando tela e cards  -->
    <script type="module">
        import {
            TutorialRender
        } from '../js/tutorialScreenRender.js'
        import {
            CreateStepCardRender
        } from '../js/tutorialScreenRender.js'

        tutorialRender = new TutorialRender();
        createStepCardRender = new CreateStepCardRender();
        tutorial = tutorialRender.generateTutorial();
        tutorial.referenceElem = tutorial_form;
        edit_card = createStepCardRender.editNewStepCard();
        edit_card_elem.append(edit_card.stepElem);
    </script>

    <script type="module">
        import Utils from '../js/utils.js'

        document.querySelectorAll('.code-headers-edit').forEach(elem => {
            elem.addEventListener('keydown', (event) => {
                if ((event.key === 'Escape' || event.key === 'Enter') && event.target.value !== '') save_header(event);
            });
            elem.addEventListener('focusout', (event) => {
                if (event.target.value !== '') save_header(event);
            });
        });

        function save_header(context) {
            let header_top = Utils.recursiveToId(context.path, '[id]'),
                header = header_top.querySelector('.code-headers-unset'),
                header_edit_icon = header.querySelector('i');
            let header_name = header.getAttribute('tutorial');
            tutorial[header_name] = context.target.value;
            header.append(header_edit_icon);
            header.classList.remove('code-headers-unset');
            let hide_editor_header = header_top.querySelector('.card')
            hide_editor_header.classList.add('code-headers-unset');
        }

        document.querySelectorAll('.code-header-content').forEach(elem => {
            elem.addEventListener('click', edit_header)
        });

        function edit_header(context) {
            let header_top = Utils.recursiveToId(context.path, '[id]'),
                header = header_top.querySelector('.card');
            header.classList.remove('code-headers-unset');
            header.querySelector('input').focus();
            header_top.querySelector('.code-header-content').classList.add('code-headers-unset');
        }

        step_elem_type.addEventListener('change', event => {
            let a = document.querySelector('.a-link-container');
            a.classList.remove('show');
            if (event.target.value === 'a') a.classList.add('show')
        })

        add_step_form.addEventListener('submit', event => {
            addTextToStep(event);
        });

        function addTextToStep(event) {
            event.preventDefault();
            let input_value = event.target.querySelector('input').value;
            if (!input_value) return;
            let form_value = Object.fromEntries(new FormData(event.target).entries());
            event.target.querySelector('input').focus();
            event.target.querySelector('input').value = "";
            createStepCardRender.addToStep(edit_card, form_value);
        }

        add_step_to_list.addEventListener('click', () => {
            addToTutorialList();
        })

        function addToTutorialList() {
            let timestamp = document.querySelector('[name="yt_timestamp"]'),
                copy = document.querySelector('[name="copy_value"]');
            if (!edit_card.text) {
                add_step_form.querySelector('input').focus();
                return Utils.showAlert('Tem que adicionar alguma coisa na etapa amigo...', 3000, 'alert-dark');
            }
            if (timestamp.validity.badInput) {
                timestamp.focus();
                return Utils.showAlert('Oi, o formato do horário está incorreto, ve se não falta uns zeros...', 3000, 'alert-dark');
            }
            edit_card.attributes = {
                'url-copy': copy.value || '',
                'yt-timestamp': Utils.convertTimeString(timestamp.value) || ''
            }
            tutorial.steps.add(edit_card);
            add_step_form.querySelectorAll('input').forEach(input => input.value = "");
            edit_card = createStepCardRender.editNewStepCard();
            edit_card_elem.innerHTML = "";
            edit_card_elem.append(edit_card.stepElem);
        }

        tutorial_form.addEventListener('submit', e => e.preventDefault());

        document.querySelector('.finalizar').addEventListener('click', () => {
            createTutorial();
        });

        function createTutorial() {
            tutorial_form.requestSubmit();
            if (!tutorial.validate()) return Utils.showAlert('Opa, tem coisa errada!', 2000, 'alert-dark');
            event.target.disabled = true;
            let body = new FormData();
            body.append('createTutorial', JSON.stringify(tutorial));
            fetch('./', {
                method: 'POST',
                body: body
            }).then(data => {
                if (data.status === 200) {
                    Utils.showAlert('Tudo certo gafanhoto!', 2000, 'alert-dark');
                    setTimeout(() => {
                        document.location.reload(true);
                    }, 2000);
                    return;
                }
                Utils.showAlert('Deu erro do lado de lá.', 2000, 'alert-dark');
            });
            event.target.disabled = false;
        }
    </script>

</body>

</html>