<?php

namespace App\Traits;

trait Hydrator
{
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            echo $method. '    ';
            if (is_callable([$this, $method])) {
                $this->$method($value);
                
            }
        }
    }
}
