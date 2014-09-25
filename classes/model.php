<?php

class JS_Models_Model {

	/**
	 *  ID                 The ID of the post
	 *  post_author        The post author's user ID (numeric string)
	 *  post_name          The post's slug
	 *  post_type          See Post Types
	 *  post_title         The title of the post
	 *  post_date          Format: 0000-00-00 00:00:00
	 *  post_date_gmt      Format: 0000-00-00 00:00:00
	 *  post_content       The full content of the post
	 *  post_excerpt       User-defined post excerpt
	 *  post_status        See get_post_status for values
	 *  comment_status     Returns: { open, closed }
	 *  ping_status        Returns: { open, closed }
	 *  post_password      Returns empty string if no password
	 *  post_parent        Parent Post ID (default 0)
	 *  post_modified      Format: 0000-00-00 00:00:00
	 *  post_modified_gmt  Format: 0000-00-00 00:00:00
	 *  comment_count      Number of comments on post (numeric string)
	 *  menu_order         Order value as set through page-attribute when enabled
	 **/


	protected $post;


	protected $decoarators;


	public function __construct($post){

		$this->post = $post;

	}


}