<?php
/**
 * Created by PhpStorm.
 * User: patrycja
 * Date: 02.01.19
 * Time: 12:47
 */

class Comment
{
    private $username;
    private $content;
    private $time;

    /**
     * Comment constructor.
     * @param $username
     * @param $content
     * @param $time
     */
    public function __construct($username, $content, $time)
    {
        $this->username = $username;
        $this->content = $content;
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }




}