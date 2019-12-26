<?php

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RoarController extends ControllerBase
{
    private $roarGenerator;
    private $loggerFactoryService;

    public function __construct(RoarGenerator $roarGenerator, LoggerChannelFactoryInterface $loggerFactoryService)
    {
        $this->roarGenerator = $roarGenerator;
        $this->loggerFactoryService = $loggerFactoryService;
    }

    public function roar()
    {
        return new Response('HTTP');
    }



    public function move($param)
    {
        $roar = $this->roarGenerator->getRoar($param);

        $this->loggerFactoryService->get('default')
            ->debug($roar);
        return new Response($roar);
    }

    public function roarButFullPageStillIntact($param)
    {
        $roar = $this->roarGenerator->getRoar($param);
        return [
            '#title' => $roar
        ];
    }

    public static function create(ContainerInterface $container)
    {
        $roarGenerator = $container->get('dino_roar.roar_generator');
        $loggerFactory = $container->get('logger.factory');
        return new static($roarGenerator, $loggerFactory);
    }
}
