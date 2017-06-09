<?php
    session_start();
    require_once('Database.php');
    require_once('Moments_db.php');
    
    $name = $_POST['name'];
    $code = $_POST['code'];
    $moment = $_POST['mom'];
    $session_id = $_POST['session_id'];
    $string_id = $_POST['string_id'];
    $ip_address = $_POST['ip_address'];
    
    $mom = new Database();
    $mom->db_connect();
    $moments_db = new Moments_db($mom);

	$moments_db->insert_new_mom($string_id, $session_id, $ip_address, $name, $moment, 0);
    echo "<div class='mom'>
                <div class='who'>
                    <img src='media/anon.jpg'><span id='name'>".$name."</span><span id='date'>".date("F j, Y, g:i a")."</span>
                </div>
               <p>".$moment."</p>
            </div>";

    function containsAny($haystack, $needles) {
        foreach($needles as $word) {
            if (stristr($haystack, $word) !== false) {
                return true;
            }
        }
        return false;
    }
    
?>