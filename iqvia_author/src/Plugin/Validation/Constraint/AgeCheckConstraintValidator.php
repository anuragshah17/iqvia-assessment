<?php

namespace Drupal\iqvia_author\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the AgeCheckConstraint.
 */
class AgeCheckConstraintValidator extends ConstraintValidator {

    /**
     * {@inheritdoc}
     */
    public function validate($items, Constraint $constraint) {
        foreach ($items as $item) {
            // Check if the age is less than 18.
            if ($item->value < 18) {
                // Add a violation message if age is less than 18.
                $this->context->addViolation($constraint->lesserThan);
            }

            // Check if the age is greater than 65.
            if ($item->value > 65) {
                // Add a violation message if age is greater than 65.
                $this->context->addViolation($constraint->greaterThan);
            }
        }
    }

}