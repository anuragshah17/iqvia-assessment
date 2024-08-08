<?php

namespace Drupal\iqvia_author\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting an Author entity.
 *
 * @ingroup author
 */
class AuthorDeleteForm extends ContentEntityConfirmFormBase {

    /**
     * {@inheritdoc}
     *
     * Returns the question to ask the user when deleting an Author entity.
     *
     * @return string
     *   The question to ask the user. The page title will be set to this value.
     */
    public function getQuestion() {
        return $this->t('Are you sure you want to delete %name?', ['%name' => $this->entity->label()]);
    }

    /**
     * {@inheritdoc}
     *
     * Returns the route to redirect to if the user cancels the deletion.
     *
     * @return \Drupal\Core\Url
     *   A URL object for the cancellation route.
     */
    public function getCancelUrl() {
        return new Url('entity.author.collection');
    }

    /**
     * {@inheritdoc}
     *
     * Returns the text to be displayed on the confirmation button.
     *
     * @return string
     *   The text for the confirmation button.
     */
    public function getConfirmText() {
        return $this->t('Delete');
    }

    /**
     * {@inheritdoc}
     *
     * Deletes the entity and logs the event.
     *
     * @param array $form
     *   The form array.
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $entity = $this->getEntity();
        $entity->delete();

        // Log the deletion event.
        $this->logger('iqvia_author')->notice('Deleted %title.', [
            '%title' => $this->entity->label(),
        ]);

        // Redirect to the Author entity collection page after deletion.
        $form_state->setRedirect('entity.author.collection');
    }
}
