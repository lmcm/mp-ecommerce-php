<?php

 
$data = file_get_contents('php://input');
file_put_contents('data.log', print_r($data, true) . __LINE__, FILE_APPEND);
file_put_contents('data2.log', print_r(array("sistyemas"=>"kskskks"), true) . __LINE__, FILE_APPEND);
echo file_put_contents("test.txt","Hello World. Testing!");

echo 'mike';

?>