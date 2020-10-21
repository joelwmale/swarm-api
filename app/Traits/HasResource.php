<?php

namespace App\Traits;

trait HasResource
{
    /**
     * Get model as a JSON resource.
     *
     * @return resource
     */
    public function getResource(?string $format = null, ?array $options = null): array
    {
        $reflect = new \ReflectionClass($this);
        $resourceClass = '\Swarm\Resources\\'.$reflect->getShortName().'Resource';

        return (new $resourceClass($this))->toArray($format, $options);
    }
}
