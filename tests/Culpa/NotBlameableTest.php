<?php

namespace Culpa;

use Illuminate\Database\Eloquent\Model;

/**
 * A model that adds the trait but doesn't say which events to track
 */
class NotBlameableModel extends Model
{
    use Blameable;
    protected $table = 'posts';
}

class NotBlameableTest extends \CulpaTest
{
    private $model;

    public function setUp()
    {
        parent::setUp();
        $this->model = new NotBlameableModel;
    }

    public function testBlameables()
    {
        $this->assertFalse($this->model->isBlameable('created'));
        $this->assertFalse($this->model->isBlameable('updated'));
        $this->assertFalse($this->model->isBlameable('deleted'));
    }
}
