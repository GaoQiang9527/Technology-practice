<?php

interface Db_Adapter
{
    /**
     * 数据库连接
     * @param $config 数据库配置
     * @return mixed
     */
    public function connect($config);

    /**
     * 执行数据库查询
     * @param $query 数据库查询SQL字符串
     * @param $handle 连接对象
     * @return mixed
     */
    public function query($query, $handle);
}