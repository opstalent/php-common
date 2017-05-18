<?php

namespace Opstalent\Common\Validator\Constraints;

use Doctrine\Common\Collections\ArrayCollection;
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
        if($value == null) return;
        $accessor = PropertyAccess::createPropertyAccessor();
        if($value instanceof ArrayCollection) {
            $this->validateCollection($value, $constraint);
        } else {
            $this->validateProperty($value, $constraint);
        }
    }

    public function validateCollection(ArrayCollection $value, Constraint $constraint)
    {
        $value->forAll(function ($key,$item) use ($constraint) {
            $this->validateProperty($item, $constraint);
        });
    }

    public function validateProperty($value, Constraint $constraint)
    {
        $needle = ($constraint->path) ? $accessor->getValue($value, $constraint->path) : $value;
        if (!in_array($needle, $constraint->values)) $this->buildViolation($value, $constraint);
    }

    public function buildViolation($value, Constraint $constraint)
    {
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ array }}', json_encode($constraint->values))
            ->addViolation();
    }
}
