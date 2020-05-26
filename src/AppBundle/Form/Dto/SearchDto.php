<?php

namespace AppBundle\Form\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class SearchDto
{
    /**
     * @Assert\NotBlank()
     */
    public $movieRequest;
}