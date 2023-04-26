<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastName;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @ORM\Column(type="string")
     */
    protected $gender;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $phoneNumber;

    /**
    * @param string $username
    * @param string $firstname
    * @param string $lastname
    * @param string $email
    * @param string $country
    * @param string $gender
    * @param string $city
    * @param string $phoneNumber
    */
    public function __construct($username, $firstname, $lastname, $email, $country, $gender, $city, $phoneNumber)
    {
        $this->username     = $username;
        $this->firstName    = $firstname;
        $this->lastName     = $lastname;
        $this->email        = $email;
        $this->country      = $country;
        $this->gender       = $gender;
        $this->city         = $city;
        $this->phoneNumber  = $phoneNumber;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstName;
    }

    public function getLastname()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}