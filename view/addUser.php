<?php require_once "view/layouts/head.php" ?>
<body>
<?php require_once "view/layouts/nav.php" 
?>

<?php session_start();
if(isset ( $_SESSION[ 'errors' ] )){
    $errors = $_SESSION[ 'errors' ];
    $email = $_SESSION[ 'email' ];
    $name = $_SESSION[ 'name' ];
    $age = $_SESSION[ 'age' ];
    $status = $_SESSION[ 'status' ];

    unset( $_SESSION[ 'errors' ] );
    unset( $_SESSION[ 'email' ] );
    unset( $_SESSION[ 'name' ] );
    unset( $_SESSION[ 'age' ] );
    unset( $_SESSION[ 'status' ] );
}?>


<div class="container-fluid mt-3">
        
        <div class="row justify-content-center">
            <div class="col-8 col-md-8 col-sm-10 p-3 border border-info bg-light rounded rounded-3 shadow shadow-2">
                    <h1>Add User</h1> 
                    <form action="?action=saveuser" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value=<?php if(isset($name)){echo($name);} ?> >
                <?php if ( isset( $errors["name"] ) ): ?> 
                            <div class='text-danger'><?= $errors["name"]?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php if(isset($email)){echo($email);} ?>>
                <?php if ( isset( $errors["email"] ) ): ?> 
                            <div class='text-danger'><?= $errors["email"]?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value=<?php if(isset($age)){echo($age);} ?> >
                <?php if ( isset( $errors["age"] ) ): ?> 
                            <div class='text-danger'><?= $errors["age"]?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="active" value="active" <?php if(isset($status) && $status=="active" ){echo("checked");} ?>>
                    <label class="form-check-label" for="active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" <?php if(isset($status) && $status=="inactive" ){echo("checked");} ?>>
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div>
                <?php if ( isset( $errors["status"] ) ): ?> 
                            <div class='text-danger'><?= $errors["status"]?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        </div>
    </div>
    </div>
    
</body>
<?php require_once "view/layouts/foot.php"?>
