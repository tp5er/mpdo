<?php

namespace tp5er;

class mpdo
{
    /**
     * @var null
     */
    private static $pdo = null;

    /**
     * @var array
     */
    protected $conf = [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => '127.0.0.1',
        // 数据库名
        'database' => 'test',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '123456',
        // 端口
        'hostport' => '3306',
        // 数据库编码默认采用utf8
        'charset' => 'utf8',
    ];

    /**
     * query constructor.
     * @param array $conf
     */
    public function __construct($conf = [])
    {
        $this->conf = array_merge($this->conf, $conf);
        if (is_null(self::$pdo)) {
            self::$pdo = $this->pdoObject();
        }
    }


    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql)
    {
        $stmt = self::$pdo->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_NUM);
        $list = $stmt->fetchAll();
        return $list;
    }

     /**
     * 关闭数据库连接
     */
    public function __destruct()
    {
        self::$pdo = null;
    }

    /**
     * @return PDO
     */
    protected function pdoObject()
    {
        $dns = "{$this->conf['type']}:host={$this->conf['hostname']};port={$this->conf['hostport']};dbname={$this->conf['database']}";
        return new \PDO($dns,
            $this->conf['username'],
            $this->conf['password'],
            [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->conf['charset']};",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]
        );
    }

}
