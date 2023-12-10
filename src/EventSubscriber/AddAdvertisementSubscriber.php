<?php

namespace App\EventSubscriber;

use App\Entity\Advertisement;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Symfony\Bundle\SecurityBundle\Security;

class AddAdvertisementSubscriber implements EventSubscriberInterface
{
  public function __construct(private Security $security)
  {
    
  }

  public function getSubscribedEvents(): array
  {
    return [
      Events::prePersist,
    ];
  }

  public function prePersist(PrePersistEventArgs $args): void
  {
    $user = $this->security->getUser();
    $entity = $args->getObject();

    if (!$entity instanceof Advertisement) {
      return;
    }

    $entity
        ->setUser($user)
        ->setCreadtedAt(new \DateTime());
  }
}