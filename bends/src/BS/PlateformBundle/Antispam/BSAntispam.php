<?php

namespace BS\PlateformBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class BSPlateformExtension extends Extension
{
  public function load(array $configs, ContainerBuilder $container)
  {
    $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
    $loader->load('services.yml');
  }
}

namespace BS\PlateformBundle\Antispam;

class BSAntispam
{
  private $mailer;
  private $locale;
  private $minLength;

  public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
  {
    $this->mailer    = $mailer;
    $this->locale    = $locale;
    $this->minLength = (int) $minLength;
  }

  /**
   * Vérifie si le texte est un spam ou non
   *
   * @param string $text
   * @return bool
   */
  public function isSpam($text)
  {
    return strlen($text) < $this->minLength;
  }
}