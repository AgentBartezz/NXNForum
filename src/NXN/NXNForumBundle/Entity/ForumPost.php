<?php
namespace NXN\NXNForumBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use NXN\NXNForumBundle\Entity\ForumSection as ForumSection;
use NXN\NXNForumBundle\Entity\ForumTopic as ForumTopic;
use NXN\NXNForumBundle\Entity\ForumCategory as ForumCategory;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumPost
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
     * @ORM\ManyToOne(targetEntity="ForumTopic", inversedBy="posts")
     * @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;
	
	/**
     * @ORM\ManyToOne(targetEntity="ForumSection", inversedBy="posts")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    protected $section;
	
	/**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="post_author_id", referencedColumnName="id")
     */
    protected $postAuthorId;
	
	/**
     * @ORM\Column(type="datetime", name="post_time")
     */
    protected $postTime;
	
	public function __construct()
	{
		$this->postTime = new \DateTime('now');
	}
	
	/**
     * @ORM\Column(type="string", length=1000, name="post_content")
     */
    protected $content;
	
	/**
     * @ORM\Column(type="integer", name="post_status", options={"default" = "0" })
     */
    protected $status = "0";

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
     * Set content
     *
     * @param string $content
     * @return ForumPost
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ForumPost
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
     * Set topic
     *
     * @param ForumTopic $topic
     * @return ForumPost
     */
    public function setTopic(ForumTopic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return ForumTopic 
     */
    public function getTopic()
    {
        return $this->topic;
    }
	
	
	/**
     * Set section
     *
     * @param \NXN\NXNForumBundle\Entity\ForumTopic $section
     * @return ForumSection
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
	
	
	
	
	
	/**
     * Set postAuthorId
     *
     * @param \NXN\NXNForumBundle\Entity\User $postAuthorId
     * @return ForumPost
     */
    public function setPostAuthorId(\NXN\NXNForumBundle\Entity\User $postAuthorId = null)
    {
        $this->postAuthorId = $postAuthorId;

        return $this;
    }

    /**
     * Get postAuthorId
     *
     * @return \NXN\NXNForumBundle\Entity\ForumTopic 
     */
    public function getPostAuthorId()
    {
        return $this->postAuthorId;
    }
	
	/**
     * Set category
     *
     * @param \NXN\NXNForumBundle\Entity\ForumCategory $category
     * @return ForumPost
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
     * Set postTime
     *
     * @param \DateTime $postTime
     * @return ForumPost
     */
    public function setPostTime($postTime)
    {
        $this->postTime = $postTime;

        return $this;
    }

    /**
     * Get postTime
     *
     * @return \DateTime 
     */
    public function getPostTime()
    {
        return $this->postTime;
    }
}
