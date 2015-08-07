<?php 

namespace AppBundle\Twig;

class MylibExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
            new \Twig_SimpleFilter('time', array($this, 'timeFilter')),
        );
    }

    public function priceFilter($number, $decimals = 0, $decPoint = ',', $thousandsSep = ' ')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = $price . ' €';

        return $price;
    }

    public function timeFilter($time, $format = null)
    {
        if (empty ($format)) {
            if ($time >= 3600) {
                $format = 'H \h i \m\i\n s';
            } elseif ($time >= 60) {
                $format = 'i\hs\m\i\n';
            } else {
                $format = 's';
            }
        }

        return gmdate($format, $time);
    }

    public function getName()
    {
        return 'mylib_extension';
    }
} 