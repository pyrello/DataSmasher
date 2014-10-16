<?php namespace Digible\Datasmasher\Source;

use Digible\DataSmasher\Contracts\SourceDriverInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentSource implements SourceDriverInterface
{
    protected $model;

    public function __construct(Model $model)
    {

    }

    /**
     * @return mixed
     */
    public function getSourceName()
    {
        // TODO: Implement getSourceName() method.
    }
}
 