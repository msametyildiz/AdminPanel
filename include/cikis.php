<?php
@session_destroy();//tüm oturumu sonlandırıyorum
@ob_end_flush();
?>
<meta http-equiv="refresh" content="0;url=<?=SITE?>giris-yap"/>
<?php
exit();
?>