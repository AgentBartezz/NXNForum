<?php

namespace NXN\NXNForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use NXN\NXNForumBundle\Functions\Theme;
use Symfony\Component\HttpFoundation\Request;


class ForumIndexController extends Controller
{
    public function forumIndexAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		
		$em = $this->getDoctrine()->getManager();
		$categories = $em->getRepository('NXNNXNForumBundle:ForumCategory')->findAll();
		
		$theme = $this->get('theme');
		$theme = $theme->loadTheme();
		
		
		return $this->render(
			'NXNNXNForumBundle:DarkBlue/Forum:forum.index.html.twig',
			array (
				'link' => $link,
				'categories' => $categories,
				'theme' => $theme
			)
		);
    }
}