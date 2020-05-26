<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Search;

class SearchManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    private function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function confirm($dto)
    {
        $Panel = new Search();
        $Panel->setMovieRequest($dto->movieRequest);

        $this->persistAndFlush($Panel);
    }
}