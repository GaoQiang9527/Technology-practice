<?php
include_once './db_adapter.php';

class Db_Adapter_mysql implements Db_Adapter
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
        if ($this->_dbLink = @mysql_connect($config->host . (empty($config->port) ? '' : ':' . $config->port), $config->user, $config->password, true)) {
            if (@mysql_select_db($config->database, $this->_dbLink)) {
                if ($config->charset) {
                    mysql_query("SET NAMES '{$config->charset}'", $this->_dbLink);
                }
                return $this->_dbLink;
            }
        }
        throw new Exception(@mysql_error($this->_dbLink));
    }

    /**
     * 执行数据查询
     * @param 数据库查询SQL字符串 $query
     * @param 连接对象 $handle
     * @return mixed|resource
     */
    public function query($query, $handle)
    {
        if ($resource = @mysql_query($query, $handle)) {
            return $resource;
        }
    }
}