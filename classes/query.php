<?php

class JS_Models_Query {


	protected $wp_query;


	public function __construct($wp_query){

		$this->wp_query = $wp_query;

	}


	public function get_posts(){

		$raw_posts = $this->wp_query->get_posts();
		die(var_export($raw_posts));

	}


}