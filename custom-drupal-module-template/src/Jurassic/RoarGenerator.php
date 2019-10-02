<?php

namespace Drupal\dino_roar\Jurassic;

class RoarGenerator
{
    public function getRoar($length)
    {
        return 'R' . str_repeat('0', $length) . 'AR!';
    }
}
