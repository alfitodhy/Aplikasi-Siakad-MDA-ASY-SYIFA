<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-login.css" />
<title>Login Admin</title>
</head>

<body>
    <div class="container-login sign-up-mode">
        <div class="forms-container">
            <div class="signup">
                <form method="post" action="" class="sign-up-form">
                    <h2 class="title">Login Admin</h2>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="username" name="username" />
                    </div>
                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password" />
                    </div>
                    <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                    <button class="btn">Login</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h1>Madrasah Diniyah Awaliyah (MDA) ASY - SYIFA</h1>

                </div>
                <img src="<?php echo base_url() ?>assets/img/admin.svg" class="image" alt="" />
            </div>
        </div>
    </div>