<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/27
 * Time: 22:13
 */
if (isset($_POST['keyword'])) {
    header("Refresh:0;url=/" . $_POST['keyword']);
} else header("Refresh:0;url=/");
?>