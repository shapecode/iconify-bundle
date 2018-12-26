<?php

namespace Shapecode\Iconify\Symfony\Iconify;

use Shapecode\Iconify\SVGInterface;

/**
 * Interface IconifyInterface
 *
 * @package Shapecode\Iconify\Symfony\Iconify
 * @author  Nikita Loges
 */
interface IconifyInterface
{

    /**
     * @param string $icon
     * @param array  $options
     *
     * @return string
     */
    public function getIcon(string $icon, array $options = []): string;

    /**
     * @param string $value
     * @param        $icon
     * @param array  $options
     *
     * @return string
     */
    public function getIconFilter(string $value, $icon, array $options = []): string;

    /**
     * @param string $icon
     * @param array  $options
     *
     * @return string
     */
    public function getContent(string $icon, array $options = []): string;

    /**
     * @param string $icon
     *
     * @return SVGInterface
     */
    public function getSVG(string $icon): SVGInterface;
}
