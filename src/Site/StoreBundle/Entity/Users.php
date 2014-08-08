<?php
/**
 * Created by PhpStorm.
 * User: core
 * Date: 7/8/14
 * Time: 12:02 PM
 */

namespace Site\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

class Users implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=35)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $username;

    /**
     * @ORM\Column(type="date")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $sex;

    /**
     * @ORM\Column(type="float")
     */
    protected $height;

    /**
     * @ORM\Column(type="float")
     */
    protected $weight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $location;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $type;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_time;

    /**
     * Set id
     *
     * @param string $id
     * @return Users
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Users
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Users
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return Users
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return Users
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Users
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
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Users
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set created_time
     *
     * @param \DateTime $createdTime
     * @return Users
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;

        return $this;
    }

    /**
     * Get created_time
     *
     * @return \DateTime 
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    public function getRoles()
    {
        $role = '';
        switch($this->type) {
            case 0:
                $role = 'ROLE_USER';
                break;
            case 1:
                $role = 'ROLE_TEACHER';
                break;
        }
        return $role;
    }

    public function getSalt()
    {
    }

    public function eraseCredentials()
    {

    }

}

