<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 27.12.18
 * Time: 00:28
 */

class Bargain
{
    private $id;
    private $title;
    private $price;
    private $image;
    private $description;

    /**
     * Bargain constructor.
     * @param $id
     * @param $title
     * @param $price
     * @param $image
     * @param $description
     */
    public function __construct($title, $price, $image, $description)
    {
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
}