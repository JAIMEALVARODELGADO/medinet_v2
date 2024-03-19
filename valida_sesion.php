<?php
session_start();
if(!isset($_SESSION['gusuario_log']) or $_SESSION['gusuario_log']==''){
    ?>
    <script type="text/javascript">
        window.open("index.php","_self");        
    </script>
    <?php
}
?>
