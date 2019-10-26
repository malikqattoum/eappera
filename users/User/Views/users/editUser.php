<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="container">
        <h1 class="my-4">Edit User</h1>
        <?php if(isset($validationErrors) && !empty($validationErrors)):?>
                <div class="alert alert-danger">
                    <?php foreach($validationErrors as $value)
                        echo $value.'<br>';
                    ?>
                </div>
        <?php endif ?>
        <?=form_open('users/edit/'.$userData['id'], ['csrf_id' => 'my-id', 'method'=>'POST']);?>
            <?php
                $data = [
                    'type'  => 'text',
                    'name'  => 'first_name',
                    'id'    => 'firstName',
                    'class' => 'form-control'
                ];
            ?>
            <div class="form-group">
                <?php
                    echo form_label('First Name');
                    echo form_input($data, $userData['first_name']);
                ?>
            </div>
            <div class="form-group">
                <?php
                    $data['name'] = 'last_name';
                    $data['id'] = 'lastName';
                    echo form_label('Last Name');
                    echo form_input($data, $userData['last_name']);
                ?>
            </div>
            <div class="form-group">
                <?php
                    $data['name'] = 'email';
                    $data['id'] = 'email';
                    $data['type'] = 'email';
                    echo form_label('Email');
                    echo form_input($data, $userData['email']);
                ?>
            </div>
            <div class="form-group">
                <?php
                    $data['name'] = 'password';
                    $data['id'] = 'password';
                    unset($data['type']);
                    echo form_label('Password');
                    echo form_password($data,'',['placeholder'=>'Enter your new password']);
                ?>
            </div>
            <?=form_submit('submit', 'Update User!', ['class'=>'btn btn-primary']);?>
        <?=form_close();?>
    </div>
<?= $this->endSection() ?>