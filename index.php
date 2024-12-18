<?php 
    namespace index;

    class Header {
        public static function render() {
            include(__DIR__ . '/app/header.php');
        }
    }
?>
<script>
    window.location.href = "app/login/login.php";
</script>
