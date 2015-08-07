<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Search
 *
 * @ORM\Table(name="search")
 * @ORM\Entity
 */
class Search
{
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
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    public function __construct()
    {
        $this->movieRequest = 'N/C';
        $this->date = new \DateTime('now');
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

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Search
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
