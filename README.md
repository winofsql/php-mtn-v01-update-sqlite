# php-mtn-v01-update-sqlite

![image](https://user-images.githubusercontent.com/1501327/157995686-217429dc-4451-4272-a44e-783d590f7844.png)

### db_connect.php
```php 
<?php
// ***************************
// 接続
// ***************************
try {
    $sqlite = new PDO( "sqlite:../{$dbname}" );
}
catch ( PDOException $e ) {
    $error["db"] .= $dbname;
    $error["db"] .= " " . $e->getMessage();
}
// 接続以降で try ～ catch を有効にする設定
$sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```
