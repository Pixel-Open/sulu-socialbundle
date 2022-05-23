<?php

namespace Pixel\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Sulu\Component\Persistence\Model\AuditableInterface;
use Sulu\Component\Persistence\Model\AuditableTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="social_setting")
 * @Serializer\ExclusionPolicy("all")
 */
class Setting implements AuditableInterface
{
    use AuditableTrait;

    public const RESOURCE_KEY = "social_settings";
    public const FORM_KEY = "social_settings";
    public const SECURITY_CONTEXT = "social_settings.settings";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose()
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Serializer\Expose()
     */
    private ?array $socialMedias = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return array|null
     */
    public function getSocialMedias(): ?array
    {
        return $this->socialMedias;
    }

    /**
     * @param array|null $socialMedias
     */
    public function setSocialMedias(?array $socialMedias): void
    {
        $this->socialMedias = $socialMedias;
    }
}
