<?php
namespace App\Core;

class View
{
    /*
     Render a view file
     param string $view The view file
     param array $data Associative array of data to display in the view (optional)
    */
    public static function render($view, $data = [])
    {
        extract($data, EXTR_SKIP);
        // relative to Core directory
        $file = '../App/Views/' . $view . '.php';

        // Display user if logged in;
        if (\App\Auth::getUser()) {
            $data['user'] = \App\Auth::getUser();
            $user_obj = $data['user'];
            if(isset($user_obj->name)){
                'Currenly logged in - ' . $user_obj->name;
            } elseif(isset($user_obj->firstname)) {
                'Currenly logged in - ' .  $user_obj->firstname;
            }
        }

        // Flash message
        $data['flash_messages'] = \App\Flash::getMessages();

        if (!$data['flash_messages']) {
            unset($data['flash_messages']);
        } elseif ($data['flash_messages']) {
            foreach($data['flash_messages'] as $message) {
                echo '<div class="alert alert-' . $message['type'] .  '">';
                echo $message['body'];
                echo '</div>';
            }
        }

        // require the View file
        if (is_readable($file)) {
            require $file;
        } else {
            echo $file . '- Not found';
            //throw new \Exception("$file not found");
        }
    }

}//end of class











// // Display flash messages if  there are any
// $data['flash_messages'] = \App\Flash::getMessages();
// // test();
// // printr($data['flash_messages']);
// if (isset($data['flash_messages'])) {
//     printr($data['flash_messages']);
// foreach($data['flash_messages'] as $message) {
//     //echo 'flash message: ' . $message;
//     //echo '<div class={$alert}>{$message}</div>'
//     echo '<div class="alert alert-' . $message['type'] .  '">';
//     echo $message['body'];
//     echo '</div>';
//     //printr($message);
//     }
// }
