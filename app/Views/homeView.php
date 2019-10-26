<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="container">
        <?php $session = \Config\Services::session();?>
        <h1 class="my-3">Welcome to EappEra <?=($session->has('email'))?$session->get('first_name').' '.$session->get('last_name'):'' ?></h1>
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-6">
                <div class="alert alert-danger d-none" id="errorMessage"></div>
                <div class="alert alert-success d-none" id="successMessage"></div>
                <?=form_open_multipart('posts/add', ['csrf_id' => 'my-id', 'method'=>'POST', 'id'=>'postForm']);?>
                    <?php
                        $options = [];
                        foreach($allUsers as $user)
                            $options[$user['id']] = $user['first_name'].' '.$user['last_name'];
                    ?>
                    <div class="form-group">
                        <?php
                            echo form_label('Post User');
                            echo form_dropdown('user_id', $options, '', ['class'=>'form-control']);
                        ?>
                    </div>
                    <?php
                        $data = [
                            'type'  => 'text',
                            'name'  => 'title',
                            'id'    => 'title',
                            'class' => 'form-control'
                        ];
                    ?>

                    <div class="form-group">
                        <?php
                            echo form_label('Post Title');
                            echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            $data['name'] = 'description';
                            $data['id'] = 'description';
                            unset($data['type']);
                            echo form_label('Post Description');
                            echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            $data['name'] = 'image';
                            $data['id'] = 'image';
                            echo form_label('Post Image');
                            echo form_upload($data);
                        ?>
                    </div>
                    <?=form_submit('submit', 'Add New Post!', ['class'=>'btn btn-primary']);?>
                <?=form_close();?>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5">
            <div id="homePosts" class="col-sm-12 col-md-6"></div>
        </div>
    </div>
<?= $this->endSection() ?>