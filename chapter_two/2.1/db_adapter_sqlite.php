<?php
include_once './db_adapter.php';

class Db_Adapter_sqlite implements Db_Adapter
{
    private $_dbLink; // 数据库连接字符串标识

    /**
     * 数据库连接函数
     * @param 数据库配置 $config
     * @return mixed|resource
     * @throws Exception
     */
    public function connect($config)
    {
        if ($this->_dbLink = sqlite_open($config->file, 0666, $error)) {
            return $this->_dbLink;
        }

        throw new Exception($error);
    }

    /**
     * 执行数据查询
     * @param 数据库查询SQL字符串 $query
     * @param 连接对象 $handle
     * @return mixed|resource
     */
    public function query($query, $handle)
    {
        if ($resource = @sqlite_query($query, $handle)) {
            return $resource;
        }
    }
}