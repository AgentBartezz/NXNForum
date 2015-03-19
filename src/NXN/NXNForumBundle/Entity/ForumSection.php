<?php
namespace NXN\NXNForumBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use NXN\NXNForumBundle\Entity\ForumTopic as ForumTopic;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumSection
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="ForumCategory", inversedBy="sections")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
	
	/**
     * @ORM\Column(type="string", length=50, name="forum_section_name")
     */
    protected $name;	
	
	/**
     * @ORM\OneToMany(targetEntity="ForumTopic", mappedBy="section")
     */
	protected $topics;
	
	/**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="section")
	 * @ORM\OrderBy({"postTime" = "ASC"})
     */
	protected $posts;
	
	public function __construct()
    {
		$this->posts = new ArrayCollection();
        $this->topics = new ArrayCollection();
    }
	
	/**
	 * @ORM\Column(type="string", length=100, name="sec_desc", nullable=true)
	 */
	protected $secDesc;
	
	/**
     * @ORM\Column(type="integer", name="section_status", options = {"default" = "0"})
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
     * @param integer $name
     * @return ForumCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ForumCategory
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
     * Add topics
     *
     * @param \NXN\NXNForumBundle\Entity\ForumTopic $topics
     * @return ForumCategory
     */
    public function addTopic(\NXN\NXNForumBundle\Entity\ForumTopic $topics)
    {
        $this->topics[] = $topics;

        return $this;
    }

    /**
     * Remove topics
     *
     * @param \NXN\NXNForumBundle\Entity\ForumTopic $topics
     */
    public function removeTopic(\NXN\NXNForumBundle\Entity\ForumTopic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }
	
	

    /**
     * Set secDesc
     *
     * @param string $secDesc
     * @return ForumSection
     */
    public function setSecDesc($secDesc)
    {
        $this->secDesc = $secDesc;

        return $this;
    }

    /**
     * Get secDesc
     *
     * @return string 
     */
    public function getSecDesc()
    {
        return $this->secDesc;
    }

    /**
     * Set category
     *
     * @param \NXN\NXNForumBundle\Entity\ForumCategory $category
     * @return ForumSection
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
     * @return ForumCategory
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
}
