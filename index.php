<?php
// let's define the current active language 
define('ACTIVE_LANGUAGE', 'bangla');
require 'languages.php';
require 'function.php';


/** Example 1 */
$data = array(
    'username' =>  'Anushka',
    'app_name' =>  'DevsLib.'
);
__('Hi {username}, welcome to {app_name}!', true, $data);

// prints
// হাই Anushka, DevsLib. এ আপনাকে স্বাগতম!


/** Example 2 */
$translated_string = __('Hi {username}, welcome to {app_name}!', false, "username:Virat,app_name:DevsLib."); 
echo $translated_string;

// prints
// হাই Anushka, DevsLib. এ আপনাকে স্বাগতম!

/** Example 3 */
__('There is no translation {empty_data}');

// prints
// There is no translation {empty_data}