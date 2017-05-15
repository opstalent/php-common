<?php

namespace Opstalent\Common\Validator\Constraints;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Patryk Grudniewski <patgrudniewski@gmail.com>
 * @package Opstalent\Common
 */
class EntityIdValidator extends ConstraintValidator
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @param ObjectManager $em
     */
    public function __construct(ObjectManager $em)
    {
        $this->manager = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        $entity = $this->getRepository($constraint)->find($value);
        if (null === $entity) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ entity }}', $constraint->entity)
                ->setParameter('{{ id }}', $value)
                ->addViolation();
        }
    }

    /**
     * @param EntityId $constraint
     * @return ObjectRepository
     */
    protected function getRepository(EntityId $constraint): ObjectRepository
    {
        return $this->manager->getRepository($constraint->entity);
    }
}
