<?php

declare(strict_types=1);

namespace Pixel\SocialBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;
use Twig\Error\RuntimeError;

class ShareFunctionsTest extends KernelTestCase
{
    private Environment $twig;

    protected function setUp(): void
    {
        $this->twig = self::getContainer()->get(Environment::class);
    }

    public function shareFunctionsTest(): void
    {}
}
