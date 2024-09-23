<?php
namespace Salesforce\ORM\Validators;

use Salesforce\ORM\Entity;
use Salesforce\ORM\ValidationInterface;
use Salesforce\ORM\Validator;
use Salesforce\ORM\ValidatorInterface;

class Url extends Validator implements ValidatorInterface
{

    /**
     * @param \Salesforce\ORM\Entity $entity entity
     * @param \ReflectionProperty $property property
     * @param \Salesforce\ORM\ValidationInterface $annotation relation
     * @return bool
     */
    public function validate(Entity &$entity, \ReflectionProperty $property, ValidationInterface $annotation)
    {
        $url = $this->mapper->getPropertyValue($entity, $property);
        if ($url === null) {
            return true;
        }

        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
