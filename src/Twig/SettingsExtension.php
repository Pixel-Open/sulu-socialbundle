<?php

namespace Pixel\SocialBundle\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Pixel\SocialBundle\Entity\Setting;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SettingsExtension extends AbstractExtension
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction("social_settings", [$this, "socialSettings"]),
        ];
    }

    public function socialSettings(): Setting
    {
        return $this->entityManager->getRepository(Setting::class)->findOneBy([]);
    }
}
