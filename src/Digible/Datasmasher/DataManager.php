<?php namespace Digible\DataSmasher;

use Digible\DataSmasher\Contracts\DataInterface;

class DataManager
{
    protected $data = null;

    public function __construct(DataInterface $data)
    {
        $this->data = $data;
    }

    public static function create(DataInterface $data)
    {
        return new static($data);
    }
}
