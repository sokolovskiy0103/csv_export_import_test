<?php


namespace Helpers;

class CsvFile
{
    protected string $path;
    protected array $array;
    protected array $header;


    public function __construct(string $path)
    {
        $this->path = $path;
        $this->array = $this->parseToArray();
        return $this;
    }

    public function getArray(): array
    {
        return $this->array;
    }

    public function parseToArray()
    {
        $rows = array_map('str_getcsv', file($this->path));
        $this->header = array_shift($rows);
        $arr = array();
        foreach ($rows as $row) {
            $arr[] = array_combine($this->header, $row);
        }
        return $arr;
    }

    public function validate()
    {
        if ($this->header === ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender']) {
            return true;
        } else {
            return false;
        }
    }

}