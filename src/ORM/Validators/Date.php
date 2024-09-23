<?php
namespace Salesforce\ORM\Validators;

use Salesforce\ORM\Entity;
use Salesforce\ORM\ValidationInterface;
use Salesforce\ORM\Validator;
use Salesforce\ORM\ValidatorInterface;

class Date extends Validator implements ValidatorInterface
{

    /**
     * @param \Salesforce\ORM\Entity $entity entity
     * @param \ReflectionProperty $property property
     * @param \Salesforce\ORM\ValidationInterface $annotation relation
     * @return bool
     */
    public function validate(Entity &$entity, \ReflectionProperty $property, ValidationInterface $annotation)
    {
        $date = $this->mapper->getPropertyValue($entity, $property);
        if ($date === null) {
            return true;
        }
        /** @var \Salesforce\ORM\Annotation\Date $annotation */
        $date = date_parse_from_format($annotation->format, $date);

        return checkdate($date['month'], $date['day'], $date['year']);
    }
}
