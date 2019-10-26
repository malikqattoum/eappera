<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-6">
                <h1 class="my-4">Login</h1>
                <div class="alert alert-danger d-none" id="errorMessage"></div>
                <div class="alert alert-success d-none" id="successMessage"></div>  
                <?=form_open('users/api/login', ['csrf_id' => 'my-id', 'method'=>'POST', 'id'=>'loginForm']);?>
                    <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'email',
                            'id'    => 'email',
                            'class' => 'form-control'
                        ];
                    ?>
                    <div class="form-group">
                        <?php
                            echo form_label('Email');
                            echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            $data['name'] = 'password';
                            $data['id'] = 'password';
                            unset($data['type']);
                            echo form_label('Password');
                            echo form_password($data);
                        ?>
                    </div>
                    <?=form_submit('submit', 'Login', ['class'=>'btn btn-primary']);?>
                <?=form_close();?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>