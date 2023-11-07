<?php

function volver($url) {
    header('Location: ../'. $url);
    exit;
}
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>