<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/5/2015
 * Time: 12:51 AM
 */
require_once('constants.php');



function display_form($method, $action) {

     echo "<form method='{$method}' action='{$action}'>\n";
     echo "              <input type='text' name='" . USER_INPUT_KEY . "'>\n";
//     echo '<input type="text" name="name">';
     echo "              <input type='submit' value='Submit'>" . "\n";
     echo '          </form>' . "\n";
}

function validation($user_input, $country_names_array) {
     $user_input = strtolower($user_input);
     $user_input = ucfirst($user_input);

     if ($user_input === '') {
          echo '<h1>Please Enter a country</h1>';

     } else if(!array_search($user_input, $country_names_array)) {
          echo '<h1>Country Not Found. Please Enter a Known Country</h1>';
     }

     $user_input = stripslashes(strip_tags($user_input));
     $user_input = str_replace("/", "", $user_input);
     $user_input = addslashes($user_input);

     return $user_input;
}

function find_country($user_input, $array_data) {

//     var_dump($array_data);
     for ($i = 0; $i < NUMBER_COUNTRIES; $i++) {

          if($array_data[$i][0] === $user_input) {
               $current_country = $array_data[$i];
               $test_JSON = display_data($user_input, $current_country);

          }
     }
     return $test_JSON;
}

function create_country_array() {
     $array_data = [];
     $get_data = fopen('data/coal_consumption.csv', 'r');

     if(!$get_data) {
          echo '<p>Error something Happen to the file...</p>';
          exit;
     }
     do {
          $line = fgetcsv($get_data);
          if(!$line) {
               break;
          }
          $array_data[] = $line;
     } while($line);

     return $array_data;
}

function display_data($user_input, $current_country) {

     echo '<h1>' . $user_input . '</h1>';
     $current_country = array_map(function($var) {
          // Your 'id' is not an int and will not be converted.
          return is_numeric($var) ? (float) round($var, 2) * 100  : $var;
     }, $current_country);


     $current_country_data = array_slice($current_country, 1, 29);
     var_dump($current_country_data);

     $test_json = json_encode($current_country_data);

     return $test_json;
}

function country_names($array_data) {
     $country_names_array = [];
     for($c = 0; $c < NUMBER_COUNTRIES; $c++) {
          $country_names_array[] = $array_data[$c][0];
     }

     return $country_names_array;
}