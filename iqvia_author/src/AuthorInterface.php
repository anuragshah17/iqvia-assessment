<?php

namespace Drupal\iqvia_author;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for Author entities.
 */
interface AuthorInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}