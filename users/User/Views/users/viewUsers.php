<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <?php 
        $session = \Config\Services::session();
        $session->start();?>
    <div class="container">
        <h1>Eappera Users</h1>
        <a class="btn btn-primary my-2" href="<?=base_url('users/add')?>">Add New User</a>
        <?php $flashMessages = ['addedUser', 'updatedUser', 'deletedUser', 'deleteError'];
            foreach($flashMessages as $messageName)
                if(isset($session) && !empty($session->getFlashdata($messageName))):?>
                    <div class="alert alert-success">
                        <?=$session->getFlashdata($messageName)?>
                    </div>
                <?php endif;?>
        
        <?php if(!empty($allUsers)):?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;?>
                    <?php foreach($allUsers as $user):?>
                        <tr>
                            <th scope="row"><?=$counter?></th>
                            <td><?=$user['first_name']?></td>
                            <td><?=$user['last_name']?></td>
                            <td><?=$user['email']?></td>
                            <td>
                                <a class="btn btn-warning mb-1" href="<?=base_url('users/edit/'.$user['id'])?>">Edit</a>
                                <a class="btn btn-danger" href="<?=base_url('users/delete/'.$user['id'])?>">Delete</a>
                            </td>
                        </tr>
                        <?php $counter++;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        <?php else:?>
            <div class="alert alert-warning">
                <p>There is no users currently</p>
            </div>
        <?php endif;?>
    </div>
<?= $this->endSection() ?>