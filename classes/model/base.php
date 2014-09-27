<?php

/**
 * Base Model. 
 * 
 * Requires it's own properties
 * for each of the WP_Post properties else
 * functions like `get_the_title()` don't 
 * work as expected.
 *
 * @package SuperQuery
 * @author Josh Sephton
 **/
class SQ_Model_Base {

	/**
	 * The post on which this model
	 * is based.
	 *
	 * @var WP_Post
	 */
	protected $post;


	/**
	 * Post ID.
	 *
	 * @var int
	 */
	public $ID;


	/**
	 * ID of post author.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @var string
	 */
	public $post_author = 0;


	/**
	 * The post's local publication time.
	 *
	 * @var string
	 */
	public $post_date = '0000-00-00 00:00:00';


	/**
	 * The post's GMT publication time.
	 *
	 * @var string
	 */
	public $post_date_gmt = '0000-00-00 00:00:00';


	/**
	 * The post's content.
	 *
	 * @var string
	 */
	public $post_content = '';


	/**
	 * The post's title.
	 *
	 * @var string
	 */
	public $post_title = '';


	/**
	 * The post's excerpt.
	 *
	 * @var string
	 */
	public $post_excerpt = '';


	/**
	 * The post's status.
	 *
	 * @var string
	 */
	public $post_status = 'publish';


	/**
	 * Whether comments are allowed.
	 *
	 * @var string
	 */
	public $comment_status = 'open';


	/**
	 * Whether pings are allowed.
	 *
	 * @var string
	 */
	public $ping_status = 'open';


	/**
	 * The post's password in plain text.
	 *
	 * @var string
	 */
	public $post_password = '';


	/**
	 * The post's slug.
	 *
	 * @var string
	 */
	public $post_name = '';


	/**
	 * URLs queued to be pinged.
	 *
	 * @var string
	 */
	public $to_ping = '';


	/**
	 * URLs that have been pinged.
	 *
	 * @var string
	 */
	public $pinged = '';


	/**
	 * The post's local modified time.
	 *
	 * @var string
	 */
	public $post_modified = '0000-00-00 00:00:00';


	/**
	 * The post's GMT modified time.
	 *
	 * @var string
	 */
	public $post_modified_gmt = '0000-00-00 00:00:00';


	/**
	 * A utility DB field for post content.
	 *
	 *
	 * @var string
	 */
	public $post_content_filtered = '';


	/**
	 * ID of a post's parent post.
	 *
	 * @var int
	 */
	public $post_parent = 0;


	/**
	 * The unique identifier for a post, not necessarily a URL, used as the feed GUID.
	 *
	 * @var string
	 */
	public $guid = '';


	/**
	 * A field used for ordering posts.
	 *
	 * @var int
	 */
	public $menu_order = 0;


	/**
	 * The post's type, like post or page.
	 *
	 * @var string
	 */
	public $post_type = 'post';


	/**
	 * An attachment's mime type.
	 *
	 * @var string
	 */
	public $post_mime_type = '';


	/**
	 * Cached comment count.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @var string
	 */
	public $comment_count = 0;


	/**
	 * Stores the post object's sanitization level.
	 *
	 * Does not correspond to a DB field.
	 *
	 * @var string
	 */
	public $filter;


	/**
	 * Construct
	 *
	 * @param WP_Post the original post
	 * @return void
	 **/
	public function __construct(WP_Post $post){
		$this->set_post($post);
	}


	/**
	 * Set the post property and then
	 * set this class's properties.
	 *
	 * @param WP_Post the original post
	 * @return void
	 **/
	protected function set_post(WP_Post $post){
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