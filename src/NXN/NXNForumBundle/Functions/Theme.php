<?php

namespace NXN\NXNForumBundle\Functions;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Theme extends Controller{
	 /**
     * @var string[]
     */
    public $theme;
	
	public function loadTheme() {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery('SELECT c.forumTheme as theme, c.configTime FROM NXN\NXNForumBundle\Entity\ForumConfig c ORDER BY c.configTime DESC')->setMaxResults(1);
		$theme = $query->getResult();
		$theme = $theme['0']['theme'];
		return $theme;
	}

}