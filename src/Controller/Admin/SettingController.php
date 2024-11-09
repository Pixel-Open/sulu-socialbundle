<?php

declare(strict_types=1);

namespace Pixel\SocialBundle\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\View\ViewHandlerInterface;
use HandcraftedInTheAlps\RestRoutingBundle\Controller\Annotations\RouteResource;
use HandcraftedInTheAlps\RestRoutingBundle\Routing\ClassResourceInterface;
use Pixel\SocialBundle\Entity\Setting;
use Sulu\Component\Rest\AbstractRestController;
use Sulu\Component\Security\SecuredControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @RouteResource("social-settings")
 */
class SettingController extends AbstractRestController implements ClassResourceInterface, SecuredControllerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        ViewHandlerInterface $viewHandler,
        ?TokenStorageInterface $tokenStorage = null
    ) {
        $this->entityManager = $entityManager;
        parent::__construct($viewHandler, $tokenStorage);
    }

    public function getAction(): Response
    {
        $applicationSetting = $this->entityManager->getRepository(Setting::class)->findOneBy([]);
        return $this->handleView($this->view($applicationSetting ?: new Setting()));
    }

    public function putAction(Request $request): Response
    {
        $applicationSetting = $this->entityManager->getRepository(Setting::class)->findOneBy([]);
        if (!$applicationSetting) {
            $applicationSetting = new Setting();
            $this->entityManager->persist($applicationSetting);
        }
        $this->mapDataToEntity($request->request->all(), $applicationSetting);
        $this->entityManager->flush();
        return $this->handleView($this->view($applicationSetting));
    }

    /**
     * @param array<mixed> $data
     */
    public function mapDataToEntity(array $data, Setting  $entity): void
    {
        $socialMedias = $data['socialMedias'] ?? null;

        $entity->setSocialMedias($socialMedias);
    }

    public function getSecurityContext(): string
    {
        return Setting::SECURITY_CONTEXT;
    }
}
