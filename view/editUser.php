<?php require_once "view/layouts/head.php"
?>
<body>
<?php require_once "view/layouts/nav.php" ?>
<div class="container-fluid mt-3">
        
        <div class="row justify-content-center">
            <div class="col-8 col-md-8 col-sm-10 p-3 border border-info bg-light rounded rounded-3 shadow shadow-2">
                    <h1>Edit User</h1> 
            <form action="?action=updateuser" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">Id:</label>
                    <input type="number" class="form-control" id="id" name="id" aria-describedby="emailHelp" value='<?=$user[ "id" ]?>' readonly>
                </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value='<?=$user[ "email" ]?>' >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value='<?=$user[ "email" ]?>'>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value='<?=$user[ "age" ]?>'>
            </div>
            <div class="form-group">
                <label>Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="active" value="active" <?php if ( $user[ "status" ] == "active" ){ echo("checked");}  ?>>
                    <label class="form-check-label" for="active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" <?php if ( $user[ "status" ] == "inactive" ){ echo("checked");}  ?>>
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        </div>
    </div>
    </div>
    
</body>
<?php require_once "view/layouts/foot.php"?>