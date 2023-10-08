# php-mtn-v01-update

```sql
CREATE TABLE `社員マスタ` (
  `社員コード` varchar(4),
  `氏名` varchar(50),
  `フリガナ` varchar(50),
  `所属` varchar(4),
  `性別` int,
  `作成日` datetime,
  `更新日` datetime,
  `給与` int,
  `手当` int,
  `管理者` varchar(4),
  `生年月日` datetime,
  `所属名` varchar(50),
  `管理者名` varchar(50),
  PRIMARY KEY (`社員コード`)
)
```

![image](https://user-images.githubusercontent.com/1501327/157995686-217429dc-4451-4272-a44e-783d590f7844.png)
