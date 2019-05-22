<?php

class gbookModel
{
    private $bookPath;
    private $data;

    public function setBookPath($bookPath)
    {
        $this->bookPath = $bookPath;
    }

    public function getBookPath()
    {
        return $this->bookPath;
    }

    public function open()
    {
    }

    public function close()
    {
    }

    public function read()
    {
        return file_get_contents($this->bookPath);
    }

    public function write($data)
    {
        $data = self::safe($data);
        $this->data = $data->name . '&' . $data->email . "\r\nsaid:\r\n" . $data->content;
        return file_put_contents($this->bookPath, $this->data, FILE_APPEND);
    }

    // 模拟数据的安全处理，先拆包在打包
    public static function safe($data)
    {
        $reflect = new ReflectionObject($data);
        $props = $reflect->getProperties();
        $messageBox = new stdClass();
        foreach ($props as $prop) {
            $ivar = $prop->getName();
            $messageBox->$ivar = trim($prop->getValue($data));
        }
        return $messageBox;
    }

    public function delete()
    {
        file_put_contents($this->bookPath, 'it`s empty now');
    }
}