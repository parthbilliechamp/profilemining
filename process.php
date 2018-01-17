<?php
session_start();
$_SESSION['user']='';
echo "
<script>
alert('You have successfully logged of');
window.location.href='index.php';
</script>
";
 ?>
