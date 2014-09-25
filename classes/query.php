<?php

class JS_Models_Query {


	protected $wp_query;


	public function __construct($wp_query){

		$this->wp_query = $wp_query;

	}


	public function get_posts(){

		$raw_posts = $this->wp_query->get_posts();

		$posts = array();
		foreach($raw_posts as $post){
			$posts[] = new JS_Models_Model($post);
		}

		die(var_export($posts));

	}


}