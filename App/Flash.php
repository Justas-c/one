<?php
namespace App;

// Flash notification messages
class Flash
{
    const SUCCESS = 'success';
    const INFO = 'info';
    const WARNING = 'warning';
    const DANGER = 'danger';

    public static function addMessage($message, $type = 'success')
    {
        // Create an array in the session if it doesn't already exist
        if (!isset($_SESSION['flash_notifications'])) {
            $_SESSION['flash_notifications'] = [];
        }
        //append the message to the array
        $_SESSION['flash_notifications'][] = [
        'body' => $message,
        'type' => $type
        ];
    }

    // get all the messages
    public static function getMessages()
    {
        if (isset($_SESSION['flash_notifications'])) {
            $messages = $_SESSION['flash_notifications'];
            unset($_SESSION['flash_notifications']);
            return $messages;
        } else {
            return false;
        }
    }

}//end of class
