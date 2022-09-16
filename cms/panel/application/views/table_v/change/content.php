<?php $user = getActiveUser();

foreach( getControllerList() as $controllerName ){
echo $controllerName."<br>";
}
?>