<?php

 
$data = file_get_contents('php://input');
file_put_contents(TMP . '/data.log', print_r($data, true) . __LINE__, FILE_APPEND);

?>