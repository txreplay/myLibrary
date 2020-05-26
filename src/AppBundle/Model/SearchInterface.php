<?php

namespace AppBundle\Model;

/**
 * Interface SearchInterface
 * @package AppBundle\Model
 */
interface SearchInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return string
     */
    public function getmovieRequest();

    /**
     * @return \DateTime
     */
    public function getDate();
}