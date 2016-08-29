<?php
if(logged_in()) {
    //   $user_data = user_data('name');
   // echo 'Hello ', $user_data['name'];
} else {
    ?>



    <form action="" method="post">
        <p>
            Email:<input type="email" name="login_email" />
            Password: <input type="password" name="login_password" />
            <input type="submit" value="Log in">
        </p>
    </form>

<?php
}

if(isset($_POST['login_email'], $_POST['login_password'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $errors = array();

    if(empty($login_email) || empty($login_password))  {
        $errors[] = 'Email and password required';

    } else {
        $login = login_check($login_email, $login_password);

        if($login === false) {
            $errors[] = 'Unable to log you';
        }
    }

    if(!empty($errors)) {
        foreach($errors as $error) {
            echo $error, '<br />';
        }
    } else {
        $_SESSION['member_id'] = $login;
        header('Location: index.php');
        exit();
        //echo "Ok";
    }
}
?>