<?php

namespace AppBundle\Entity;

/**
 * Skatepark
 */
class Skatepark
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var int
     */
    private $rating;

    /**
     * @var string
     */
    private $image;

    /**
     * @var array
     */
    private $facilities;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skatepark
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Skatepark
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set streetName
     *
     * @param string $streetName
     *
     * @return Skatepark
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    
        return $this;
    }

    /**
     * Get streetName
     *
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Skatepark
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Skatepark
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set facilities
     *
     * @param array $facilities
     *
     * @return Skatepark
     */
    public function setFacilities($facilities)
    {
        $this->facilities = $facilities;
    
        return $this;
    }

    /**
     * Get facilities
     *
     * @return array
     */
    public function getFacilities()
    {
        return $this->facilities;
    }
    
    public function __toString(){
        return $this->getName();
    }
}
