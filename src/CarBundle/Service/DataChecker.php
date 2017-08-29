<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.08.17
 * Time: 18:05
 */

namespace CarBundle\Service;


use CarBundle\Entity\Car;

/**
 * Class DataChecker
 * @package CarBundle\Service
 */
class DataChecker
{
    /**
     * @var boolean
     */
    protected $requireImagesToPromoteCar;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * DataChecker constructor.
     * @param EntityManager $entityManager
     * @param $requireImagesToPromoteCar
     */
    public function __construct($entityManager, $requireImagesToPromoteCar)
    {
        $this->entityManager = $entityManager;
        $this->requireImagesToPromoteCar = $requireImagesToPromoteCar;
    }


    public function checkCar(Car $car)
    {
        $promote = true;
        if($this->requireImagesToPromoteCar)
        {
            $promote = false;
        }
        $car->setPromote($promote);
        $this->entityManager->persist($car);
        $this->entityManager->flush();
        return $promote;
    }
}