<?php

	$query = $em->createQuery('SELECT c.forumTheme as theme, c.configTime FROM NXN\NXNForumBundle\Entity\ForumConfig c ORDER BY c.configTime DESC')->setMaxResults(1);
	$theme = $query->getResult();
	$theme = $theme["0"]["theme"];
		
?>