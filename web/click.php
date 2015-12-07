<?php
$fh = fopen('clicks.log', 'a+');
if ( $fh )
{
// Dump body
fwrite($fh, print_r($HTTP_RAW_POST_DATA, true));
fclose($fh);
}
?> ok
