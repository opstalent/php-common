<?php

namespace Opstalent\Common\Validator\Constraints;

use Doctrine\Common\Annotations\Annotation;
use Symfony\Component\Validator\Constraint;

/**
 * @author Szymon Kunowski <szymon.kunowski@gmail.com>
 * @package Opstalent\Common
 *
 * @Annotation
 * @Annotation\Target(["PROPERTY","CLASS"])
 */
class InArray extends Constraint
{
    /**
     * @var array
     *
     * @Annotation\Required
     */
    public $values;

    /**
     * @var string
     *
     */
    public $path;

    /**
     * @var string
     */
    public $message = 'Property not in Values';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return [
            static::CLASS_CONSTRAINT,
            static::PROPERTY_CONSTRAINT
        ];
    }
}