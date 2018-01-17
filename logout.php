<?php
$flag=0;
echo "<script>
if (confirm('Are you sure you want to logout?') == true) {
  window.location.href='process.php';
} else {
    window.history.go(-1);
}
</script>";
 ?>
