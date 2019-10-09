<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DateService;

class IndexController extends  AbstractController
{
    /**
     * @Route("/")
     */
    public function home(LoggerInterface $logger)
    {
        $logger->info('Homepage loaded.');

        $year = random_int(0, 100);

        $images = [
            ['url' => 'images/hotel/intro_room.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_pool.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_dining.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_attractions.jpg', 'class' => ''],
            ['url' => 'images/hotel/intro_wedding.jpg', 'class' => 'hidesm']
        ];

        return $this->render(
            'index.html.twig',
            ['year' => $year, 'images' => $images]
        );
    }

    /**
     * @Route("/work")
     */
    public function work(DateService $dateService)
    {
        $year = $dateService->yearsDifference(2000);

        return $this->render(
            'work.html.twig',
            ['year' => $year]
        );
    }
}
