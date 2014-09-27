SuperQuery
==========

SuperQuery is a Wordpress plugin which hijacks the `WP_Query` loop to return user defined models instead of standard `WP_Post`. If you are highly customising Wordpress, you may wish to define models for your post types to save you from calling `get_post_meta()` throughout your theme.


## Install
1. Upload 'superquery' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a class in superquery/classes/model. Classes must be named according to PSR-0 so that the autoloader can find them.
4. Define a `set_post()` method to set properties of you model from `get_post_meta()`.


## Example
If you've defined a post type, e.g. Hotel, with 2 custom fields called city and country then you will need to create a model that looks something like this:


    class SQ_Model_Hotel extends SQ_Model_Base {

        protected function set_post(WP_Post $post){
            parent::set_post($post);
            $this->city = get_post_meta($this->post->ID, 'city', true);
            $this->country = get_post_meta($this->post->ID, 'country', true);
        }

        public function location(){
            return $this->city.', '.$this->country;
        }

        public function __get($key){
            if(method_exists($this, $key)){
                return $this->$key();
            } else {
                throw new InvalidArgumentException();
            }
        }

    }

Notice that we've added a public method called `location()` and defined a custom `__get()` method. Where ever we have a Hotel post type in the theme we want to call `$post->location` for it to display the full location.

To use SuperQuery in your theme you will need to create an instance of `SQ_Query` from an instance of `WP_Query`.

For the main loop:

    global $wp_query;
    $wp_query = new SQ_Query($wp_query);

    if(have_posts()){
        while(have_posts()){
            the_post();
            echo '<h1>'.get_the_title().'</h1>';
            echo '<p>'.$post->location.'</p>';
        }
    }

Or for a secondary loop:

    $the_query = new SQ_Query(new WP_Query('post_type=hotel'));

    if($the_query->have_posts()){
        while($the_query->have_posts()){
            $the_query->the_post();
            echo '<h1>'.get_the_title().'</h1>';
            echo '<p>'.$post->location.'</p>';
        }
    }

    wp_reset_postdata();


## To Do

Use hooks to automatically create `SQ_Query` in place of `WP_Query`. This doesn't work currently as functions like `wp_reset_postdata()` don't play nicely.
