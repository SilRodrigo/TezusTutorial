<style>
    .avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 3px solid gray;
        opacity: 0;
        background-size: contain;
        background-image: url('<?= URL_DEFAULT_PATH ?>/web/image/capy.png');
        animation: wild-capybara-appears 1s forwards;
    }

    .speech-bubble {
        position: relative;
        border: 2px solid gray;
        border-radius: .4em;
        opacity: 0;
        animation: 1s that-capybara-talks .5s forwards;
    }

    .speech-bubble:after {
        content: '';
        position: absolute;
        top: 0;
        left: 40%;
        width: 0;
        height: 0;
        border: 20px solid transparent;
        border-bottom-color: gray;
        border-top: 0;
        border-right: 0;
        margin-left: -10px;
        margin-top: -20px;
    }

    @keyframes wild-capybara-appears {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes that-capybara-talks {
        0% {
            opacity: 0;
            transform: skewX(0deg) scaleX(0);
        }

        85% {
            opacity: 1;
            transform: skewX(0deg) scaleX(1);
        }

        100% {
            opacity: 1;
            transform: skewX(-10deg) scaleX(1);
        }
    }
</style>

<div class="container d-flex justify-content-center">
    <div class="card shadow col-12 col-md-7 col-xl-5 pb-4">
        <div class="card-body">
            <div class="col-12">
                <div class="py-4 d-flex justify-content-center">
                    <div class="avatar"></div>
                </div>
                <div class="speech-bubble pt-2 mb-4 text-center">
                    <h3>Calma lá jovem, vamo loga primeiro?</h3>
                </div>
                <form class="user" action="./" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="user" id="user" placeholder="Usuário">
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