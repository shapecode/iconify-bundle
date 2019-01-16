<?php

namespace Shapecode\Iconify\Symfony\Twig\Extensions;

use Shapecode\Iconify\IconifyInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class IconifyExtension
 *
 * @package Shapecode\Iconify\Symfony\Twig\Extensions
 * @author  Nikita Loges
 */
class IconifyExtension extends AbstractExtension
{

    /** @var IconifyInterface */
    protected $iconify;

    /**
     * @param IconifyInterface $iconify
     */
    public function __construct(IconifyInterface $iconify)
    {
        $this->iconify = $iconify;
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('iconify', [$this, 'getIconify'], [
                'is_safe' => ['html']
            ]),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new TwigFilter('iconify', [$this, 'getIconifyFilter'], [
                'is_safe' => ['html']
            ]),
        ];
    }

    /**
     * @param       $icon
     * @param array $options
     *
     * @return string
     */
    public function getIconify($icon, array $options = [])
    {
        return $this->iconify->getBody($icon, $options);
    }

    /**
     * @param       $value
     * @param array $options
     *
     * @return string
     */
    public function getIconifyFilter($value, array $options = [])
    {
        return $value . ' ' . $this->iconify->getBody($value, $options);
    }
}
