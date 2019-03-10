<?php

$users = 'pages/users.txt';
function err_log($text,$is_error=true)
{

    $color=$is_error?'red':'green';
    echo "<h3><span style='color: $color'>$text</span></h3>";
    return $is_error?false:'';
}
function register ($name, $pass, $email)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if ($name == '' || $pass == '' || $email == '') {
        return err_log('Fill All Required fields');
    }

    global $users;
    $file = fopen($users, 'a+');
    while($line = fgets($file)) {
        list($readname) = explode(":", $line);
        if ($readname == $name) {
            return err_log('Such Login Name Is Already Used!');
        }
    }
    $pass = md5($pass);
    $line = "$name:$pass:$email\n";
    fputs($file, $line);
    fclose($file);
    return true;
}

function login ($name, $pass)
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));

    if ($name == '' || $pass == '') {
       
        return err_log('Fill All Required fields');
    }

    global $users;
    $file = fopen($users, 'a+');
    while($line = fgets($file)) {
        list($readname, $readpass) = explode(":", $line);
  


        if ($readname == $name && $readpass==md5($pass)) {
            session_start();
        $_SESSION['registered_user']=$name;
      
            echo "<h2 style='color:green;'> Автризация прошла успешно</h2>";
            return 0;

        }
    }
    return err_log('Неправильный логин или пароль!');


}