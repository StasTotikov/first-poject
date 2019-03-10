<h1>Home Page</h1>

<?php if(!isset($_POST['logbtn'])): ?>
    <header class="row">
     
            <div class="col-md-6 col-md-offset-3">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                   
                   
                    <button type="submit" class="btn btn-success" name="logbtn">Login</button>
                </form>
            </div>
            </header>
    
<?php else: ?>
    <?php
        if (login($_POST['login'], $_POST['password'])) {
            echo "<h3><span style='color: green'>Пользователь авторизирован</span></h3>";
        }
    ?>
<?php endif;?>
