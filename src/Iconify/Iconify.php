<?php

namespace Shapecode\Iconify\Symfony\Iconify;

use Shapecode\Iconify\IconifyInterface as Iconifier;
use Shapecode\Iconify\SVGInterface;

/**
 * Class Iconify
 *
 * @package Shapecode\Iconify\Symfony\Iconify
 * @author  Nikita Loges
 */
class Iconify implements IconifyInterface
{

    /** @var Iconifier */
    protected $iconify;

    /**
     * @param Iconifier $iconify
     */
    public function __construct(Iconifier $iconify)
    {
        $this->iconify = $iconify;
    }

    /**
     * @param       $icon
     * @param array $options
     *
     * @return string
     */
    public function getIcon(string $icon, array $options = []): string
    {
        return $this->getContent($icon, $options);
    }

    /**
     * @param       $value
     * @param       $icon
     * @param array $options
     *
     * @return string
     */
    public function getIconFilter(string $value, $icon, array $options = []): string
    {
        return $value . ' ' . $this->getIcon($icon, $options);
    }

    /**
     * @param       $icon
     * @param array $options
     *
     * @return string
     */
    public function getContent(string $icon, array $options = []): string
    {
        $svg = $this->getSVG($icon);

        return $svg->getSVG($options);
    }

    /**
     * @param string $icon
     *
     * @return SVGInterface
     */
    public function getSVG(string $icon): SVGInterface
    {
        return $this->iconify->getSVG($icon);
    }
}
