# NetPaste

Ubuntu Paste的本土化版，添加了加密功能，粘贴板的代码可以一键全选

## 部署

```
web_root
 ├─ index.php
 ├─ handle.php
 ├─ frame.html
 ├─ favicon.ico (if you have)
 ├─ util
 │   ├─ config.php
 │   ├─ init.php
 │   ├─ tableEditor.php
 │   ├─ dbEditor.php
 │   ├─ util.php
 │   └─ submit.php
 ├─ css
 │   └─ prism.css
 └─ js
     ├─ prism.js
     └─ prism.select-all.js
```

修改`web_root/util/config.php`中的数据库相关的信息，并将`website`项更改为服务器的域名。

然后第一次启动网页时，执行`web_root/util/init.php`来初始化数据库。

### Rewrite（必要）

#### Nginx

```
if (!-e $request_filename) {
    rewrite ^(.*)$ /handle.php$1 last;
}
```

#### Apache

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ handle.php [L,E=PATH_INFO:$1]
</IfModule>
```

## 其它

+ 苦于Ubuntu Paste的后缀略复杂，故自己写了一个，永久保存（只要服务器还在）且可加密。

+ 代码写的很烂，望轻喷。

## Demo

[网络粘贴板](http://www.lucien.ink/go/paste/)

## 版权所有

[Lucien Shui](http://www.lucien.ink)
