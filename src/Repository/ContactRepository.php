<?php

namespace Salesforce\Repository;

use Salesforce\Entity\Contact;
use Salesforce\ORM\Repository;

class ContactRepository extends Repository
{
    protected $className = Contact::class;
}
