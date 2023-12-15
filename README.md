# php-mtn-v01-update-sqlite

![image](https://user-images.githubusercontent.com/1501327/157995686-217429dc-4451-4272-a44e-783d590f7844.png)
- ### フィールド名
    - scode
    - sname
    - fname
    - syozoku
    - seibetsu
    - kyuyo
    - teate
    - kanri
    - birth

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

- ### SQLに対する入力値の埋め込みは、文字列埋め込み( bind は使用していない )
```php
$stmt = $sqlite->prepare("select * from 社員マスタ where 社員コード = '{$_POST["scode"]}'");
```

- ### model.php を使用せずに syain.php に処理を記述
- ### update のみ
- ### JavaScript 処理なし
- ### HTML による入力チェックなし
- ### フィールドサイズの個別指定なし
```css
.right {
    width: 300px;
}
```
```html
<div>
    <div class="entry left">氏名
    </div>
    <div class="entry right">
        <input class="form-control"
            type="text"
            name="sname"
            id="sname"
            value="<?= $_POST["sname"] ?>">
    </div>
</div>
```
