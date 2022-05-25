<?php

namespace Pixel\SocialBundle\Twig;

use Pixel\SocialBundle\Service\SVG;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SVGExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction("social_media_logo", [$this, "socialMediaLogo"], ["is_safe" => ["html"]])
        ];
    }

    public function socialMediaLogo(string $name): string
    {
        $svg = new SVG();
        return $svg->getSVG($name);
    }
}
