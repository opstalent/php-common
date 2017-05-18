<?php

namespace Opstalent\Common\Validator\Constraints;

use Doctrine\Common\Annotations\Annotation;
use Symfony\Component\Validator\Constraint;

/**
 * @author Szymon Kunowski <szymon.kunowski@gmail.com>
 * @package Opstalent\Common
 *
 * @Annotation
 * @Annotation\Target(["PROPERTY"])
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
    public $message = 'Value not in array {{ array }}';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return [
            static::PROPERTY_CONSTRAINT
        ];
    }
}