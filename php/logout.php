<?php
//cerrar sesion

session_start();
session_destroy();
echo "
<Script>
    window.location.href='../index.php';
</script>
";

?>
