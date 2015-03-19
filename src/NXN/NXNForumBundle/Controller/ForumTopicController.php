<?php

namespace NXN\NXNForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use NXN\NXNForumBundle\Entity\ForumPost;
use NXN\NXNForumBundle\Form\QuickReplyType;
use Symfony\Component\HttpFoundation\Request;


class ForumTopicController extends Controller
{
	public function forumTopicAction(Request $request, $topic_id, $page) {
		$link = $_SERVER["SCRIPT_NAME"];
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		} 
		$offset = ($page - 1) * 10;
		
		$em = $this->getDoctrine()->getManager();
		$topic = $em->getRepository('NXNNXNForumBundle:ForumTopic')->find($topic_id);
		
		$section = $topic->getSection()->getId();
		$section = $em->getRepository('NXNNXNForumBundle:ForumSection')->find($section);
		$category = $section->getCategory()->getName();
		$curSection = $section->getName();
		
		$post = new ForumPost();
		$user = $this->getUser();
		$post->setPostAuthorId($user);
		$post->setSection($section);
		$post->setTopic($topic);
		$form = $this->createForm(
			new QuickReplyType(),
			$post
		);
		
		if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
		}
		
		$theme = $this->get('theme');
		$theme = $theme->loadTheme();
		
		return $this->render(
			'NXNNXNForumBundle:DarkBlue/Forum:forum.topic.html.twig',
			array (
				'topic' => $topic,
				'link' => $link,
				'section' => $curSection,
				'category' => $category,
				'form' => $form->createView(),
				'theme' => $theme
			)
		);
    }
}