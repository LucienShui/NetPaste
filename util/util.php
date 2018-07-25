<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/25
 * Time: 23:18
 */
function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}
function getFrame() {
    $html = str_combine(file("frame.html"));
    return explode('{$body$}', $html);
}
?>