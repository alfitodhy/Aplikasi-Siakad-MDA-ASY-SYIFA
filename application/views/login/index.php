<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-login.css" />
<title>Login</title>
</head>

<body>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin">
                <form method="post" action="" class="sign-in-form">

                    <img src="<?php echo base_url() ?>assets/img/LOGOMDA.png" alt="" class="image-logo">
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
                        <input type="text" placeholder="Username / Email / NIS" id="username" name="username" />
                    </div>
                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password (MMYYYY)" id="password" name="password" />
                    </div>
                    <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                    <button class="btn solid">Login</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h1>MADRASAH DINIYAH AWALIYAH (MDA)</h1>
                    <h2>
                        ASY - SYIFA
                    </h2>
                </div>
                <img src="<?php echo base_url() ?>assets/img/santri.png" class="image" alt="" />
            </div>
        </div>
    </div>