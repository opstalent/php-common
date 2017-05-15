<?php

namespace Opstalent\Common\Validator\Constraints;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Szymon Kunowski <szymon.kunowski@gmail.com>
 * @package Opstalent\Common
 */
class InArrayValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if ($value == NULL) return;
        $accessor = PropertyAccess::createPropertyAccessor();
        $needle = ($constraint->path) ? $accessor->getValue($value, $constraint->path) : $value;

        if (!in_array($needle, $constraint->values))
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ array }}', $constraint->values)
                ->addViolation();

    }
}
