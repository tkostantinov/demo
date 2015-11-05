<?php

namespace Framework;

/**
 * MVC Controller
 *
 */
abstract class Controller
{
    /**
     * @var DependencyInjectionContainer
     */
    private $diContainer;

    /**
     * @param $diContainer
     */
    public function __construct(DependencyInjectionContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }

    /**
     * @return DependencyInjectionContainer
     */
    public function getDiContainer()
    {
        return $this->diContainer;
    }

    /**
     *
     * @param DependencyInjectionContainer $diContainer
     */
    public function setDiContainer(DependencyInjectionContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }
}
