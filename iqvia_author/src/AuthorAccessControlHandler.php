<?php

namespace Drupal\iqvia_author;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the author entity.
 *
 * @see \Drupal\iqvia_author\Entity\Author.
 */
class AuthorAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view author entity');

      case 'edit':
        return AccessResult::allowedIfHasPermission($account, 'edit author entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete author entity');
    }
    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add author entity');
  }

}
