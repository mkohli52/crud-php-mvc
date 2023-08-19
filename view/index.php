<?php require_once "view/layouts/head.php" ?>
<body>
<?php require_once "view/layouts/nav.php" ?>

<table class="table bg-light rounded rounded-3 border border-dark  p-1 " id="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                            <tr> <th scope='row'><?=$user[ "id" ]?></th><td><?=$user[ "name" ]?></td><td><?=$user[ "email" ]?></td><td><?=$user[ "age" ]?></td><td><?=$user[ "status" ]?></td><td class='m-3'><button type='button' class='btn btn-primary me-1'><a href='?action=edituser&id=<?=$user["id"]?>' class='text-white' style='text-decoration:none;' ?><i class='bi bi-pencil'></i></a></button><button type='button' class='btn btn-danger'><a href='?action=deleteuser&id=<?=$user["id"]?>' class='text-white' style='text-decoration:none;' ?><i class='bi bi-trash3-fill'></i></a></button></td></tr>
                    <?php endforeach;?>
                </tbody>
            </table>
</body>
<?php require_once "view/layouts/foot.php" ?>            