<?php

class SQ_Query {


	protected $wp_query;


	public function __construct($wp_query){

		$this->wp_query = $wp_query;

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