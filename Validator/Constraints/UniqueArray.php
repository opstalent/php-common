<?php

namespace Opstalent\Common\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Patryk Grudniewski <patgrudniewski@gmail.com>
 * @package Opstalent\Common
 *
 * @Annotation
 * @Annotation\Target("PROPERTY")
 */
class UniqueArray extends Constraint
{
    /**
     * @var string
     */
    public $message = 'Array items are not unique';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return static::PROPERTY_CONSTRAINT;
    }
}
