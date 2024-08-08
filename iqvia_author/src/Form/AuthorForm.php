<?php

namespace Drupal\iqvia_author\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the Author entity add and edit forms.
 *
 * @ingroup author
 */
class AuthorForm extends ContentEntityForm {

    /**
     * {@inheritdoc}
     *
     * Builds the form for adding or editing an Author entity.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        /* @var $entity \Drupal\iqvia_author\Entity\Author */
        $form = parent::buildForm($form, $form_state);
        $entity = $this->entity;

        // Language field for selecting the language of the Author entity.
        $form['langcode'] = [
            '#title' => $this->t('Language'),
            '#type' => 'language_select',
            '#default_value' => $entity->getUntranslated()->language()->getId(),
            '#languages' => Language::STATE_ALL,
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     *
     * Saves the Author entity.
     * Displays a message based on whether the entity was updated or newly added.
     *
     * @param array $form
     *   The form array.
     *
     * @return int
     *   The status of the save operation.
     */
    public function save(array $form, FormStateInterface $form_state) {
        $status = parent::save($form, $form_state);
        $entity = $this->entity;

        // Display a message based on the save status.
        if ($status == SAVED_UPDATED) {
            $this->messenger()->addMessage($this->t('The author with name %name has been updated.', ['%name' => $entity->toLink()->toString()]));
        } else {
            $this->messenger()->addMessage($this->t('The author with name %name has been added.', ['%name' => $entity->toLink()->toString()]));
        }

        // Redirect to the Author entity collection page after saving.
        $form_state->setRedirectUrl($this->entity->toUrl('collection'));

        return $status;
    }
}