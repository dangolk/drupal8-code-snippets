<?php

namespace Drupal\dino_roar\Controller;

use Symfony\Component\HttpFoundation\Response;

class RoarController
{
    public function roar()
    {
        return new Response('HTTP');
    }

    public function move($param)
    {
        // $res = '';
        // for($i = 1; $i <= (int) $param; $i++){
        //     $res += 'roar';
        // }
        // return new Response($res);

        $roar = 'R'.str_repeat('0', $param).'AR!';
        return new Response($roar);

    }
}
