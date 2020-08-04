<?php
// if (session_id() == ""){
// session_start();
// //header("Cache-control: private");
// }
//*************** IN01-001 **********************//

function killsession() {

 $_SESSION = array();
 session_destroy();

}

 ?>