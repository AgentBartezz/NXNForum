<?php
namespace NXN\NXNForumBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use NXN\NXNForumBundle\Entity\ForumCategory as ForumCategory;
use NXN\NXNForumBundle\Entity\ForumPost as ForumPost;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumTopic
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="ForumSection", inversedBy="topics")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    protected $section;
	
	/**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="topic")
     */
	protected $posts;
	
	public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

	/**
     * @ORM\Column(type="string", length=50, name="topic_name")
     */
    protected $name;

	/**
     * @ORM\Column(type="integer", name="topic_status")
     */
    protected $status;

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
     * @return ForumTopic
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
     * Set status
     *
     * @param integer $status
     * @return ForumTopic
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set category
     *
     * @param \NXN\NXNForumBundle\Entity\ForumCategory $category
     * @return ForumTopic
     */
    public function setCategory(\NXN\NXNForumBundle\Entity\ForumCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \NXN\NXNForumBundle\Entity\ForumCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add posts
     *
     * @param \NXN\NXNForumBundle\Entity\ForumPost $posts
     * @return ForumTopic
     */
    public function addPost(\NXN\NXNForumBundle\Entity\ForumPost $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \NXN\NXNForumBundle\Entity\ForumPost $posts
     */
    public function removePost(\NXN\NXNForumBundle\Entity\ForumPost $posts)
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

    /**
     * Set section
     *
     * @param \NXN\NXNForumBundle\Entity\ForumSection $section
     * @return ForumTopic
     */
    public function setSection(\NXN\NXNForumBundle\Entity\ForumSection $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \NXN\NXNForumBundle\Entity\ForumSection 
     */
    public function getSection()
    {
        return $this->section;
    }
}
