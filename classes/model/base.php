<?php


class SQ_Model_Base {


	protected $post;


	protected function set_post($post){
		$this->post = $post;
		$this->ID = $post->ID;
		$this->post_author = $post->post_author;
		$this->post_date = $post->post_date;
		$this->post_date_gmt = $post->post_date_gmt;
		$this->post_content = $post->post_content;
		$this->post_title = $post->post_title;
		$this->post_excerpt = $post->post_excerpt;
		$this->post_status = $post->post_status;
		$this->comment_status = $post->comment_status;
		$this->ping_status = $post->ping_status;
		$this->post_password = $post->post_password;
		$this->post_name = $post->post_name;
		$this->to_ping = $post->to_ping;
		$this->pinged = $post->pinged;
		$this->post_modified = $post->post_modified;
		$this->post_modified_gmt = $post->post_modified_gmt;
		$this->post_content_filtered = $post->post_content_filtered;
		$this->post_parent = $post->post_parent;
		$this->guid = $post->guid;
		$this->menu_order = $post->menu_order;
		$this->post_type = $post->post_type;
		$this->post_mime_type = $post->post_mime_type;
		$this->comment_count = $post->comment_count;
	}


}