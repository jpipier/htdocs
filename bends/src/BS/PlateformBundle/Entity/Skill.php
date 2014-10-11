<?php
// src/BS/PlateformBundle/Entity/Skill.php

namespace BS\PlateformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BS\PlateformBundle\Entity\SkillRepository")
 */
class Skill
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;
  
  // Getters et setters
}