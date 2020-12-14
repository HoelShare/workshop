<?php declare(strict_types=1);

namespace Workshop\Controller;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"api"})
 */
class DummyController extends AbstractController
{
    /**
     * @var EntityRepositoryInterface
     */
    private $productRepository;

    public function __construct(EntityRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/api/v{version}/_action/do/things", name="api.action.do-things", methods={"GET"})
     */
    public function doThings(Context $context): Response
    {
        $criteria = new Criteria();
        $criteria->addAssociation('productNumbers');
        dd($this->productRepository->search($criteria, $context));
    }
}
