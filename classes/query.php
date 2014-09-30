<?php

/**
 * Query
 * 
 * Constructed with WP_Query and 
 * passes through most method calls 
 * and property requests to the
 * original. Overloads `the_post()`
 * method to check if a model class
 * exists for the post type.
 *
 * @package SuperQuery
 * @author Josh Sephton
 **/
class SQ_Query {


	/**
	 * The query on which this query
	 * is based.
	 *
	 * @var WP_Query
	 */
	protected $wp_query;


	/**
	 * Construct
	 *
	 * @param {WP_Query|array} the original post
	 * @return void
	 **/
	public function __construct($wp_query){
		if(is_object($wp_query) && get_class($wp_query) == 'WP_Query'){
			$this->wp_query = $wp_query;
		} else if(is_array($wp_query)){
			$this->wp_query = new WP_Query($wp_query);
		} else {
			throw new InvalidArgumentException();
		}
	}


	/**
	 * Get the current post.
	 *
	 * It first checks if a model
	 * class exists for the post type.
	 * If available, it creates the
	 * post as the custom class, else
	 * defaults back to WP_Post.
	 *
	 * @return void
	 **/
	public function the_post(){

		global $post;
		$this->in_the_loop = true;

		if($this->current_post == -1){
			do_action_ref_array('loop_start', array(&$this));
		}

		$post = $this->next_post();

		$model = SUPERQUERY_MODEL_PREFIX.$post->post_type;
		if(class_exists($model)){
			$post = new $model($post);
		}

		setup_postdata($post);

	}


	/**
	 * Get magic method
	 *
	 * @return mixed
	 **/
	public function __get($property){
		if(property_exists($this->wp_query, $property)){
			return $this->wp_query->$property;
		}
		throw new InvalidArgumentException;
	}


	/**
	 * Call magic method
	 *
	 * @return mixed
	 **/
	public function __call($method, $arguments){
		if(method_exists($this->wp_query, $method)){
			return $this->wp_query->$method($arguments);
		}
		throw new BadMethodCallException;
	}


}