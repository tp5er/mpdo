> mpdo 锻炼原生sql语句的最佳类库

~~~
composer require tp5er/mpdo dev-master
~~~

# 配置信息

~~~~
  $conf = [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => '127.0.0.1',
        // 数据库名
        'database' => 'we7',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '123456',
        // 端口
        'hostport' => '3306',
        // 数据库编码默认采用utf8
        'charset' => 'utf8',
    ];

~~~~

# 常见sql语句总结

## 获取全部表

~~~
$sql = 'SHOW TABLES';
( new \tp5er\mpdo($conf))->query($sql);
~~~

## 获取表定义语句

~~~
 $sql = "SHOW CREATE TABLE `{$table}`";
 ( new \tp5er\mpdo($conf))->query($sql);
~~~

## 获取表数据

~~~
$sql = "SHOW COLUMNS FROM `{$table}`";
( new \tp5er\mpdo($conf))->query($sql);
~~~



