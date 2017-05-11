# Validators

## Installation

### EntityId

[EntityId](validator/constraints/entity_id.md) validator needs to be registered as described below.

```yml
services:
    opstalent_common.validator.entity_id:
        class: Opstalent\Common\Validator\Constraints\EntityIdValidator
        arguments:
            - '@doctrine.orm.entity_manager'
        tags:
            - { name: validator.constraint_validator }
```

## Reference

* [EntityId](validator/constraints/entity_id.md)
* [UniqueArray](validator/constraints/unique_array.md)
