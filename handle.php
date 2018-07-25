<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/26
 * Time: 0:03
 */
$request_url = $_SERVER["REQUEST_URI"]; // 取当前路由的后缀
if (preg_match('/^\/p\/[0-9]*$/', $request_url) == 0) {
    echo "<script> alert('请确认索引是否存在') </script>";
    header("Refresh:0;url=/" . $url);
} else {
    require 'util/tableEditor.php';
    $it = new tableEditor();
    $id = str_replace('/p/', '', $request_url);
//    echo $it->exists($id);
//    if (False) {
    if (!$it->exists($id)) {
        echo "<script> alert('请确认索引是否存在') </script>";
        header("Refresh:0;url=/" . $url);
    } else {
        $password = $it->password($id);
        $flag = True;
        if ($password != null && $password != '') {
            session_start();
            if (isset($_SESSION["{$id}"]) || $_SESSION["{$id}"] != $password) {
                $flag = False;
            }
        }
        require 'util/util.php';
        $frame = getFrame();
        echo $frame[0];
        if ($flag) {
            $content = $it->content($id);
            ?>
            <link rel="stylesheet" type="text/css" href="/css/prism.css">
            <script src="/js/prism.js"></script>
            <script src="/js/prism.select-all.js"></script>
            <pre><code class="language-<?php echo $content['type']; ?> line-numbers-rows"><?php echo $content['text']; ?></code></pre>
            <?php
        } else {
            ?>
            <form class="form-horizontal" action="util/validation.php" method="post">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="pswdusr">此文本已加密，请输入密码：</label>
                        <input class="form-control" id="pswdusr" name="password_user">
                        <input style="display: none" name="password_right" value="<?php echo $password; ?>"
                               title="pswdrt">
                        <input style="display: none" name="id" value="<?php echo $id; ?>" title="id">
                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
            <?php
        }
        echo $frame[1];
    }
}
?>
