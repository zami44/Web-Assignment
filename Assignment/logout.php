<?php 
    session_start();
    session_unset();
    session_destroy();
?>
<script>
    window.location.href = "login.html";
</script>    
<?php
exit();
?>