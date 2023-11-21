<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DeviceRepository;
use App\Entity\Device;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ApiController extends AbstractController
{

    private EntityManagerInterface $manager;
    private DeviceRepository $deviceRepository;

    public function __construct(EntityManagerInterface $manager, DeviceRepository $deviceRepository) {
        $this->manager = $manager;
        $this->deviceRepository = $deviceRepository;
    }

    #[Route(path: '/device', name: 'device_get', methods: ['GET'])]
    public function list(Request $request): Response
    {

        if ($search = $request->query->get('search')) {
            $devices[] = $this->deviceRepository->findOneBy(['uuid' => $search]);
        }
        else {
            $devices = $this->deviceRepository->findAll();
        }
        $responses = [];
        foreach ($devices as $device) {
            $response['uuid'] = $device->getUuid();
            $response['serialNumber'] = $device->getSerialNumber();
            $response['shipped'] = $device->getShipped();
            $responses[] = $response;
        }
        return new JsonResponse($responses);
    }

    #[Route(path: '/device/{uuid}', name: 'device_update', methods: ['PUT'])]
    public function update(Request $request, string $uuid): Response
    {
        $device = $this->deviceRepository->findOneBy(['uuid' => $uuid]);
        $device->setShipped(!$device->getShipped());
        $this->manager->persist($device);
        $this->manager->flush();

        return new JsonResponse(['shipped' => $device->getShipped()]);
    }

    #[Route(path: '/device', name: 'device_add', methods: ['POST'])]
    public function store(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $device = new Device();
        $device->setUuid($data['uuid']);
        $device->setSerialNumber($data['serialNumber']);
        $device->setShipped($data['shipped']);
        $this->manager->persist($device);
        $this->manager->flush();
        
        return new JsonResponse(['succes' => true]);
    }
}
