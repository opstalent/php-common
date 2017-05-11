<?php

namespace Opstalent\Common\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Patryk Grudniewski <patgrudniewski@gmail.com>
 * @package Opstalent\Common
 */
class UniqueArrayValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if ($value != array_unique($value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
