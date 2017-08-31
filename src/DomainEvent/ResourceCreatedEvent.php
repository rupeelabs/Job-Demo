<?php
namespace DomainEvent;

use Symfony\Component\EventDispatcher\Event;

class ResourceCreatedEvent extends Event
{
    const NAME = "resource.created";

    /**
     * 资源ID
     *
     * @var integer
     */
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}