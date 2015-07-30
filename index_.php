<?
              if(extension_loaded('sockets')) $ws="WebSockets OK"; 
               else $ws="WebSockets UNAVAILABLE";
			   echo "<html><head><title>RES</title></head><body><h1>$ws</h1></body></html>";
?>