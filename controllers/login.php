<?php   
    include_once 'config.php';
    $data = $_POST;
    if(isset($data['auth']) ){
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']) );
        if( $user ){
            //login enable
            if( password_verify($data['password'], $user->password) ){
            //все хорошо, логиним пользователя.
                $_SESSION['auth'] = $user;
                /*if (isset($data['remember'])) {
                setcookie('login', $data['login'], time() + 3600 * 24 * 7);
                setcookie('password', password_hash($data['password']), time() + 3600 * 24 * 7);
                header('Location: index.php');
                exit();  
                }*/
                header('Location: index.php');
                exit();
            }
            else {
                $errors[] = 'Неверный пароль';
            }
        
        }
        else{
            $errors[] = 'Такой пользователь не найден';
        }

        if( ! empty($errors) ){
            $msg = '<div style="color: red;">' . array_shift($errors) . '</div>';   
        }
    }

    $content = core\RND::render('view/login.html.php', [
        'msg' => $msg
    ]);

    $html = core\RND::render('controllers/main_index.php', [
        'title' => 'Вход',
        'content' => $content
    ]);

    echo $html;