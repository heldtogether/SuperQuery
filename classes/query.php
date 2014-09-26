<?php

class SQ_Query {


	protected $wp_query;


	public function __construct($wp_query){

		$this->wp_query = $wp_query;

	}


	public function get_posts(){

		$raw_posts = $this->wp_query->get_posts();

		$posts = array();
		foreach($raw_posts as $post){
			$posts[] = $post;
		}

		die(var_export($posts));

	}


	public function __get($property){

		if(property_exists($this->wp_query, $property)){
			return $this->wp_query->$property;
		}

		throw new InvalidArgumentException;
	}


}