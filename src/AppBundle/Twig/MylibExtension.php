<?php 

namespace AppBundle\Twig;

/**
 * Class MylibExtension
 * @package AppBundle\Twig
 */
class MylibExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('time', array($this, 'timeFilter')),
        );
    }

    /**
     * @param $time
     * @param null $format
     * @return string
     */
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'mylib_extension';
    }
} 