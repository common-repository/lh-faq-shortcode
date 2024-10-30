<?php
/**
 * Plugin Name: LH FAQ Shortcode
 * Plugin URI: https://lhero.org/portfolio/lh-faq-shortcode/
 * Description: Creates a faq shortcode
 * Version: 1.02
 * Author: Peter Shaw
 * Author URI: https://shawfactor.com
*/


if (!class_exists('LH_faq_shortcode_plugin')) {

class LH_faq_shortcode_plugin {
    
var $namespace = 'lh_faq_shortcode';
    
    
private static $instance;


 /**
     * Helper function for registering and enqueueing scripts and styles.
     *
     * @name    The    ID to register with WordPress
     * @file_path        The path to the actual file
     * @is_script        Optional argument for if the incoming file_path is a JavaScript source file.
     */
    private function load_file( $name, $file_path, $is_script = false, $deps = array(), $in_footer = true, $atts = array() ) {
        $url  = plugins_url( $file_path, __FILE__ );
        $file = plugin_dir_path( __FILE__ ) . $file_path;
        if ( file_exists( $file ) ) {
            if ( $is_script ) {
                wp_register_script( $name, $url, $deps, filemtime($file), $in_footer ); 
                wp_enqueue_script( $name );
            }
            else {
                wp_register_style( $name, $url, $deps, filemtime($file) );
                wp_enqueue_style( $name );
            } // end if
        } // end if
	  
	  if (isset($atts) and is_array($atts) and isset($is_script)){
		
		
  $atts = array_filter($atts);

if (!empty($atts)) {

  $this->script_atts[$name] = $atts; 
  
}

		  
	 add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	   

	   
if (isset($this->script_atts[$handle][0]) and !empty($this->script_atts[$handle][0])){
  
$atts = $this->script_atts[$handle];

$implode = implode(" ", $atts);
  
unset($this->script_atts[$handle]);

return str_replace( ' src', ' '.$implode.' src', $tag );

unset($atts);
usent($implode);

		 

	 } else {
	   
 return $tag;	   
	   
	   
	 }
	

}, 10, 2 );
 

	
	  
	}
		
    } // end load_file


public function lh_faq_shortcode_output( $atts ) {

 ob_start();




 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'page',
        'order' => 'ASC',
        'orderby' => 'title',
'posts_per_page' => -1,
'post__in' => '',
'post_parent' => ''
), $atts ) );
 
  // define query parameters based on attributes

$myoptions = array( 
'post_type'  => $type,
	'order'   => $order,
	'orderby' => $orderby,
'posts_per_page' => $posts_per_page
  );  



if ($post_parent){ $myoptions['post_parent'] = $post_parent; }
if ($post__in){ $myoptions['post__in'] = $post__in; }

if (!$post_parent and !$post__in){

$myoptions['post_parent'] = get_the_ID ();

}


$faqPosts = new WP_Query();
$faqPosts->query($myoptions);



if ( $faqPosts->have_posts() ) {

echo '<dl class="lh_faq_shortcode-list">'; 

?>

<?php while ($faqPosts->have_posts()) : $faqPosts->the_post(); ?>

<dt id="<?php echo( basename(get_permalink()) );   ?>" class="lh_faq_shortcode-question"><?php the_title(); ?></dt>

<dd class="lh_faq_shortcode-answer"><?php echo wpautop(do_shortcode($faqPosts->post->post_content)); ?></dd>

<?php endwhile; ?>
<?php

echo '</dl>'; 


$array = array('defer="defer"', 'async="async"');

// include the LH Zero Spam javascript
$this->load_file( $this->namespace.'-script', '/scripts/lh-faq-shortcode.js', true, array(), true, $array);

}

$content = ob_get_clean();


wp_reset_postdata(); 

return $content;

}

public function register_shortcodes(){

add_shortcode('lh_faq_shortcode', array($this,"lh_faq_shortcode_output"));

}

  /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }


public function __construct() {


add_action( 'init', array($this,"register_shortcodes"));


}

}

$lh_faq_shortcode_instance = LH_faq_shortcode_plugin::get_instance();



}



?>