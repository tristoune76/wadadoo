<?php
//src/Controller/postManager_controller.php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @route("/post")
 */

class PostManagerController extends AbstractController
{

	/**
	 * @route("/index", name = "wadadoo_post_index")
	 */
	
	public function index()
	{
		return $this->render('post/index.html.twig');
	}	
	
	/**
	 * @route("/readAll", name = "wadadoo_post_readAll")
	 */
	
	public function readAll()
	{

	}

	/**
	 * @route("/add", name = "wadadoo_post_add")
	 */
	
	public function add(Request $request)
	{
		//Writing a new post
		if ($request->isMethod('POST'))
		{
			//replacement message for this part where we will deal with the creation and use of the form
			$this->addFlash('notice', 'post bien enregistré.');

			//we send the new post to the view page
			return $this->redirectToRoute('read', ['id' => $id]);

		}
		return $this->render('post/add.html.twig');


	}

	/**
	 * @route("/edit", name = "wadadoo_post_edit" ,  requirements={"id" = "/d+"})
	 */
	
	public function edit($id, Request $request)
	{
		//Editing of post with id $id
		if ($request->isMethod('POST'))
		{
			//replacement message for this part where we will deal with the creation and use of the form
			$this->addFlash('notice', 'post bien modifié.');

			//we send the new post to the view page
			return $this->redirectToRoute('readPost', ['id' => $id]);

		}
		return $this->render('post/edit.html.twig');

	}

	/**
	 * @route("/read", name = "wadadoo_post_read" , requirements = {"id" = "/d+"})
	 */
	
	public function read($id)
	{
		//displaying the post with id $id
		return $this->render('post/read.html.twig' , ['id' => $id]);

	}

	/**
	 * @route("/post/delete", name = "wadadoo_post_delete" , requirements = {"id" = "/d+"})
	 */
	
	public function delete($id)
	{
		//deleting post with id $id
		//replacement message for this part where we will deal with the deletion of the post
		$this->addFlash('notice', 'post bien supprimé.');

		return $this->render('post/delete.html.twig');
	}

}