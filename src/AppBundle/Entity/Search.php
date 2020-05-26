<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Search
 *
 * @ORM\Table(name="search")
 * @ORM\Entity
 */
class Search
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="movieRequest", type="string", length=255)
     */
    private $movieRequest;

    /**
     *
     */
    public function __construct()
    {
        $this->movieRequest = 'N/C';
        $this->date = new \DateTime('now');
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     */
    function __toString()
    {
        return 'Search';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set movieRequest
     *
     * @param string $movieRequest
     * @return Search
     */
    public function setMovieRequest($movieRequest)
    {
        $this->movieRequest = $movieRequest;

        return $this;
    }

    /**
     * Get movieRequest
     *
     * @return string 
     */
    public function getMovieRequest()
    {
        return $this->movieRequest;
    }
}
