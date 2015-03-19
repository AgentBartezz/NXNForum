<?php

namespace NXN\NXNForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use NXN\NXNForumBundle\Entity\ForumPost;
use NXN\NXNForumBundle\Form\QuickReplyType;
use Symfony\Component\HttpFoundation\Request;


class ForumSectionController extends Controller
{
	public function forumSectionAction($section_id, $page) {
		$link = $_SERVER["SCRIPT_NAME"];
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		} 
		$offset = ($page - 1) * 10;
		
		$em = $this->getDoctrine()->getManager();
		$section = $em->getRepository('NXNNXNForumBundle:ForumSection')->find($section_id);
		
		$theme = $this->get('theme');
		$theme = $theme->loadTheme();
		
		
		return $this->render(
			'NXNNXNForumBundle:DarkBlue/Forum:forum.section.html.twig',
			array (
				'link' => $link,
				'section' => $section,
				'theme' => $theme
			)
		);
    }
}