<?php
// src/Acme/UserBundle/Entity/User.php

namespace NXN\NXNForumBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use NXN\NXNForumBundle\Entity\ForumPost as ForumPost;

/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	
	/**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="user")
     */
	protected $posts;
	
	/**
     * @ORM\Column(type="integer", name="praise_level", options={"default" = "0"})
     */
    protected $praiseLevel = 0;
	
	/**
     * @ORM\Column(type="string", length=100, options={"default" = "default.png"})
     */
    protected $avatar = "default.png";
	

    public function __construct()
    {
        parent::__construct();
        $this->posts = new ArrayCollection();
    }
	
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
     * Set movieMeterLevel
     *
     * @param integer $movieMeterLevel
     * @return User
     */
    public function setPraiseLevel($praiseLevel)
    {
        $this->praiseLevel = $praiseLevel;

        return $this;
    }

    /**
     * Get praiseLevel
     *
     * @return integer 
     */
    public function getPraiseLevel()
    {
        return $this->praiseLevel;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

	
	/**
     * Add posts
     *
     * @param ForumPost $posts
     * @return User
     */
    public function addPost(ForumPost $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param ForumPost $posts
     */
    public function removePost(ForumPost $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}