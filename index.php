<?php

echo "<title>Server Welcome Page</title>";

echo "<h1>Welcome on Server ".$_SERVER['HTTP_HOST']."</h1>";

if (file_exists("./config/services-welcome.cfg")) {
    # code...
    require_once("./config/services-welcome.cfg");

    if (count($services) != 0) {
        # code...
        echo "<h3>Please select what you want to do:</h3>";
        echo "<ul>";
        foreach ($services as $service) {
            # code...
            echo "<li>Go to <a href='" . $service['link'] . "'>" . $service['name']. "</a></li>";
            }
        echo "</ul>";
        }
    }

echo "<h3>Some Data about you:</h3><ul>";
echo "<li>Your Public IP: ".$_SERVER['REMOTE_ADDR'];
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
	echo "<li>Your Client IP: ".$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
echo "</ul>";

echo "<footer>";
$filename = 'VERSION';
if (file_exists($filename)) {
    echo "Server Welcome Page Version: 0.1.". file_get_contents($filename) . " (" . date ("d.m.Y H:i", filemtime($filename)) . " Uhr)";
}
echo "</footer>";

?>