<?php

namespace Drupal\iqvia_author;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for Author entities.
 *
 * Author entity list.
 *
 * @ingroup author
 */
class AuthorListBuilder extends EntityListBuilder {

    /**
     * {@inheritdoc}
     *
     * Builds the header for the Author list.
     *
     * @return array
     *   An associative array of header column titles and their labels.
     */
    public function buildHeader() {
        $header['id'] = $this->t('ID');
        $header['name'] = $this->t('Name');
        $header['age'] = $this->t('Age');
        $header['api_key'] = $this->t('API Key');
        $header['operations'] = $this->t('Operations');
        return $header + parent::buildHeader();
    }

    /**
     * {@inheritdoc}
     *
     * Builds a row for the Author list.
     *
     * @return array
     *   An associative array of column values for the entity.
     */
    public function buildRow(EntityInterface $entity) {
        /* @var \Drupal\iqvia_author\Entity\Author $entity */
        $row['id'] = $entity->id();
        $row['name'] = $entity->toLink()->toString();
        $row['age'] = $entity->age->value;
        $row['api_key'] = $entity->api_key->value;
        return $row + parent::buildRow($entity);
    }

}