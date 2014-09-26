<?php

class SQ_Query {


	protected $wp_query;


	public function __construct($wp_query){

		$this->wp_query = $wp_query;

	}


	public function the_post(){

		global $post;
		$this->in_the_loop = true;

		if($this->current_post == -1){
			do_action_ref_array('loop_start', array(&$this));
		}

		$post = $this->next_post();

		$model = 'SQ_Model_'.$post->post_type;
		if(class_exists($model)){
			$post = new $model($post);
		}

		setup_postdata($post);

	}


	public function __get($property){

		if(property_exists($this->wp_query, $property)){
			return $this->wp_query->$property;
		}

		throw new InvalidArgumentException;
	}


	public function __call($method, $arguments){

		if(method_exists($this->wp_query, $method)){
			return $this->wp_query->$method();
		}

		throw new BadMethodCallException;
	}


}