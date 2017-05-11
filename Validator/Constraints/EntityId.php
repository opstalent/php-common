<?php

namespace Opstalent\Common\Validator\Constraints;

use Doctrine\Common\Annotations\Annotation;
use Symfony\Component\Validator\Constraint;

/**
 * @author Patryk Grudniewski <patgrudniewski@gmail.com>
 * @package Opstalent\Common
 *
 * @Annotation
 * @Annotation\Target("PROPERTY")
 */
class EntityId extends Constraint
{
    /**
     * @var string
     *
     * @Annotation\Required
     */
    public $entity;

    /**
     * @var string
     */
    public $message = 'Repository of entity {{ entity }} has no item with ID "{{ id }}".';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return static::PROPERTY_CONSTRAINT;
    }
}
