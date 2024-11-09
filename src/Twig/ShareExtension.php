<?php

namespace Pixel\SocialBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ShareExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction("facebook_share", [$this, "facebookShare"], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction("twitter_share", [$this, "twitterShare"], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction("linkedin_share", [$this, "linkedinShare"], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction("whatsapp_share", [$this, "whatsappShare"], [
                'is_safe' => ['html'],
            ]),
            new TwigFunction("pinterest_share", [$this, "pinterestShare"], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function facebookShare(string $link, string $title): string
    {
        return 'href="https://www.facebook.com/sharer.php?u=' . $link . '&t=' . $title . '" rel="nofollow" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700\');return false;" target="_blank"';
    }

    public function twitterShare(string $link, string $title, string $origin): string
    {
        return 'href="https://twitter.com/share?url=' . $link . '&text=' . $title . '&via=' . $origin . '" target="_blank"';
    }

    public function linkedinShare(string $link): string
    {
        return 'href="https://www.linkedin.com/sharing/share-offsite/?url=' . $link . '" target="_blank"';
    }

    public function whatsappShare(string $text, string $link): string
    {
        return 'href="https://api.whatsapp.com/send?text=' . $text . '%20' . $link . '" target="_blank"';
    }

    public function pinterestShare(string $link): string
    {
        return 'href="http://pinterest.com/pin/create/button/?url=' . $link . '" target="_blank"';
    }
}
