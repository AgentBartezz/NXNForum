<?php
namespace NXN\NXNForumBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumConfig
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=50, name="forum_name", options = {"default" = "NXNForum"})
     */
    protected $forumName;
	
	/**
     * @ORM\Column(type="string", length=80, name="forum_theme", options = {"default" = "DarkBlue"})
     */
    protected $forumTheme;
	
	/**
     * @ORM\Column(type="datetime", name="config_time")
     */
    protected $configTime;
	
	public function __construct()
	{
		$this->configTime = new \DateTime('now');
	}
	
	/**
     * Set configTime
     *
     * @param \DateTime $configTime
     * @return ForumConfig
     */
    public function setConfigTime($configTime)
    {
        $this->configTime = $configTime;

        return $this;
    }

    /**
     * Get configTime
     *
     * @return \DateTime 
     */
    public function getConfigTime()
    {
        return $this->configTime;
    }
	
	
	/**
     * Set forumName
     *
     * @param string $forumName
     * @return ForumConfig
     */
    public function setForumName($forumName)
    {
        $this->forumName = $forumName;

        return $this;
    }

    /**
     * Get forumName
     *
     * @return string 
     */
    public function getForumName()
    {
        return $this->forumName;
    }
	
	/**
     * Set forumTheme
     *
     * @param string $forumTheme
     * @return ForumConfig
     */
    public function setForumTheme($forumTheme)
    {
        $this->forumTheme = $forumTheme;

        return $this;
    }

    /**
     * Get forumTheme
     *
     * @return string 
     */
    public function getForumTheme()
    {
        return $this->forumTheme;
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
	
}