<?php
/*
Plugin Name: Vina Scroller Widget
Plugin URI: http://VinaThemes.biz
Description: This is a highly customizable plugin to show you or your customer's services, portfolio items, blog contents ... basically all business information thinkable.
Version: 1.0
Author: VinaThemes
Author URI: http://VinaThemes.biz
Author email: mr_hiennc@yahoo.com
Demo URI: http://VinaDemo.biz
Forum URI: http://laptrinhvien-vn.com
License: GPLv3+
*/

//Defined global variables
if(!defined('VINA_SCROLLER_DIRECTORY')) 		define('VINA_SCROLLER_DIRECTORY', dirname(__FILE__));
if(!defined('VINA_SCROLLER_INC_DIRECTORY')) 	define('VINA_SCROLLER_INC_DIRECTORY', VINA_SCROLLER_DIRECTORY . '/includes');
if(!defined('VINA_SCROLLER_URI')) 			define('VINA_SCROLLER_URI', get_bloginfo('url') . '/wp-content/plugins/vina-scroller-widget');
if(!defined('VINA_SCROLLER_INC_URI')) 		define('VINA_SCROLLER_INC_URI', VINA_SCROLLER_URI . '/includes');

//Include library
if(!defined('TCVN_FUNCTIONS')) {
    include_once VINA_SCROLLER_INC_DIRECTORY . '/functions.php';
    define('TCVN_FUNCTIONS', 1);
}
if(!defined('TCVN_FIELDS')) {
    include_once VINA_SCROLLER_INC_DIRECTORY . '/fields.php';
    define('TCVN_FIELDS', 1);
}

class Scroller_Widget extends WP_Widget 
{
	function Scroller_Widget()
	{
		$widget_ops = array(
			'classname' => 'scroller_widget',
			'description' => __("This is a highly customizable plugin to show you or your customer's services, portfolio items, blog contents ... basically all business information thinkable.")
		);
		$this->WP_Widget('scroller_widget', __('Vina Scroller Widget'), $widget_ops);
	}
	
	function form($instance)
	{
		$instance = wp_parse_args( 
			(array) $instance, 
			array( 
				'title' 			=> '',
				'categoryId' 		=> '',
				'noItem' 			=> '5',
				'ordering' 			=> 'id',
				'orderingDirection' => 'desc',
				
				'width'			=> '545',
				'height'		=> '290',
				'moduleStyle'	=> 'theme1',
				'slideAmount'	=> '2',
				'slideSpacing'	=> '30',
				'touchEnabled'	=> 'on',
				'mouseWheel'	=> 'on',
				'hoverAlpha'	=> 'off',
				'hoverEffect'	=> 'on',
				'slideshow'		=> '3000',
				
				'showTitle'		=> 'yes',
				'linkTitle'		=> 'no',
				'thumbImage'	=> 'yes',
				'imageWidth'	=> '258',
				'imageHeight'	=> '130',
				'linkImage'		=> 'yes',
				'readmore'		=> 'yes',
			)
		);

		$title			= esc_attr($instance['title']);
		$categoryId		= esc_attr($instance['categoryId']);
		$noItem			= esc_attr($instance['noItem']);
		$ordering		= esc_attr($instance['ordering']);
		$orderingDirection = esc_attr($instance['orderingDirection']);
		
		$width			= esc_attr($instance['width']);
		$height			= esc_attr($instance['height']);
		$moduleStyle	= esc_attr($instance['moduleStyle']);
		$slideAmount	= esc_attr($instance['slideAmount']);
		$slideSpacing	= esc_attr($instance['slideSpacing']);
		$touchEnabled	= esc_attr($instance['touchEnabled']);
		$mouseWheel		= esc_attr($instance['mouseWheel']);
		$hoverAlpha		= esc_attr($instance['hoverAlpha']);
		$hoverEffect	= esc_attr($instance['hoverEffect']);
		$slideshow		= esc_attr($instance['slideshow']);
		
		$showTitle		= esc_attr($instance['showTitle']);
		$linkTitle		= esc_attr($instance['linkTitle']);
		$thumbImage		= esc_attr($instance['thumbImage']);
		$imageWidth		= esc_attr($instance['imageWidth']);
		$imageHeight	= esc_attr($instance['imageHeight']);
		$linkImage		= esc_attr($instance['linkImage']);
		$readmore		= esc_attr($instance['readmore']);
		?>
        <div id="tcvn-accordion" class="tcvn-plugins-container">
            <div style="color: red; padding: 0px 0px 10px; text-align: center;">You are using free version ! <a href="http://vinathemes.biz/commercial-plugins/item/11-vina-scroller-widget.html" title="Download full version." target="_blank">Click here</a> to download full version.</div>
            <div id="tcvn-tabs-container">
                <ul id="tcvn-tabs">
                    <li class="active"><a href="#basic"><?php _e('Basic'); ?></a></li>
                    <li><a href="#display"><?php _e('Display'); ?></a></li>
                    <li><a href="#advanced"><?php _e('Advanced'); ?></a></li>
                </ul>
            </div>
            <div id="tcvn-elements-container">
                <!-- Basic Block -->
                <div id="basic" class="tcvn-telement" style="display: block;">
                    <p><?php echo eTextField($this, 'title', 'Title', $title); ?></p>
                    <p><?php echo eSelectOption($this, 'categoryId', 'Category', buildCategoriesList('Select all Categories.'), $categoryId); ?></p>
                    <p><?php echo eTextField($this, 'noItem', 'Number of Post', $noItem, 'Number of posts to show. Default is: 5.'); ?></p>
                	<p><?php echo eSelectOption($this, 'ordering', 'Post Field to Order By', 
						array('id'=>'ID', 'title'=>'Title', 'comment_count'=>'Comment Count', 'post_date'=>'Published Date'), $ordering); ?></p>
                    <p><?php echo eSelectOption($this, 'orderingDirection', 'Ordering Direction', 
						array('asc'=>'Ascending', 'desc'=>'Descending'), $orderingDirection, 
						'Select the direction you would like Articles to be ordered by.'); ?></p>
                </div>
                <!-- Display Block -->
                <div id="display" class="tcvn-telement">
                	<p><?php echo eTextField($this, 'width', 'Module Width', $width); ?></p>
                    <p><?php echo eTextField($this, 'height', 'Module Height', $height); ?></p>
                    <p><?php echo eSelectOption($this, 'moduleStyle', 'Module Style', 
						array('theme1'=>'White Theme', 'theme2'=>'Black Theme'), $moduleStyle); ?></p>
                    <p><?php echo eTextField($this, 'slideAmount', 'Slide Amount', $slideAmount); ?></p>
                    <p><?php echo eTextField($this, 'slideSpacing', 'Slide Spacing', $slideSpacing); ?></p>
                    <p><?php echo eSelectOption($this, 'touchEnabled', 'Touch Enabled', 
						array('on'=>'Enable', 'off'=>'Disable'), $touchEnabled); ?></p>
                    <p><?php echo eSelectOption($this, 'mouseWheel', 'Mouse Wheel', 
						array('on'=>'Enable', 'off'=>'Disable'), $mouseWheel); ?></p>
                    <p><?php echo eSelectOption($this, 'hoverAlpha', 'Hover Alpha', 
						array('on'=>'Enable', 'off'=>'Disable'), $hoverAlpha); ?></p>
                    <p><?php echo eSelectOption($this, 'hoverEffect', 'Hover Effect', 
						array('on'=>'Enable', 'off'=>'Disable'), $hoverEffect); ?></p>
                    <p><?php echo eTextField($this, 'slideshow', 'Duration Time (ms)', $slideshow); ?></p>  
                </div>
                <!-- Advanced Block -->
                <div id="advanced" class="tcvn-telement">
                    <p><?php echo eSelectOption($this, 'showTitle', 'Post Title', 
						array('yes'=>'Show post title', 'no'=>'Hide post title'), $showTitle); ?></p>
                    <p><?php echo eSelectOption($this, 'linkTitle', 'Link on Title', 
						array('yes'=>'Yes', 'no'=>'No'), $linkTitle); ?></p>
                    <p><?php echo eSelectOption($this, 'thumbImage', 'Thumbnail Image', 
						array('yes'=>'Show thumbnail image', 'no'=>'Hide thumbnail image'), $thumbImage); ?></p>
                    <p><?php echo eTextField($this, 'imageWidth', 'Image Width (px)', $imageWidth); ?></p>
                    <p><?php echo eTextField($this, 'imageHeight', 'Image Height (px)', $imageHeight); ?></p>
                    <p><?php echo eSelectOption($this, 'linkImage', 'Link on Image', 
						array('yes'=>'Yes', 'no'=>'No'), $linkImage); ?></p>
                    <p><?php echo eSelectOption($this, 'readmore', 'Readmore', 
						array('yes'=>'Show readmore button', 'no'=>'Hide readmore button'), $readmore); ?></p>
                </div>
            </div>
        </div>
		<script>
			jQuery(document).ready(function($){
				var prefix = '#tcvn-accordion ';
				$(prefix + "li").click(function() {
					$(prefix + "li").removeClass('active');
					$(this).addClass("active");
					$(prefix + ".tcvn-telement").hide();
					
					var selectedTab = $(this).find("a").attr("href");
					$(prefix + selectedTab).show();
					
					return false;
				});
			});
        </script>
		<?php
	}
	
	function update($new_instance, $old_instance) 
	{
		return $new_instance;
	}
	
	function widget($args, $instance) 
	{
		extract($args);
		
		$title 			= getConfigValue($instance, 'title',		'');
		$categoryId		= getConfigValue($instance, 'categoryId',	'');
		$noItem			= getConfigValue($instance, 'noItem',		'5');
		$ordering		= getConfigValue($instance, 'ordering',		'id');
		$orderingDirection = getConfigValue($instance, 'orderingDirection',	'desc');
		
		$width			= getConfigValue($instance, 'width',	'545');
		$height			= getConfigValue($instance, 'height',	'290');
		$moduleStyle	= getConfigValue($instance, 'moduleStyle',	'theme1');
		$slideAmount	= getConfigValue($instance, 'slideAmount',	'2');
		$slideSpacing	= getConfigValue($instance, 'slideSpacing',	'30');
		$touchEnabled	= getConfigValue($instance, 'touchEnabled',	'on');
		$mouseWheel		= getConfigValue($instance, 'mouseWheel',	'on');
		$hoverAlpha		= getConfigValue($instance, 'hoverAlpha',	'off');
		$hoverEffect	= getConfigValue($instance, 'hoverEffect',	'on');
		$slideshow		= getConfigValue($instance, 'slideshow',	'3000');
		
		$showTitle		= getConfigValue($instance, 'showTitle',	'yes');
		$linkTitle		= getConfigValue($instance, 'linkTitle',	'yes');
		$thumbImage		= getConfigValue($instance, 'thumbImage',	'yes');
		$imageWidth		= getConfigValue($instance, 'imageWidth',	'258');
		$imageHeight	= getConfigValue($instance, 'imageHeight',	'130');
		$linkImage		= getConfigValue($instance, 'linkImage',	'yes');
		$readmore		= getConfigValue($instance, 'readmore',		'yes');
		
		$params = array(
			'numberposts' 	=> $noItem, 
			'category' 		=> $categoryId, 
			'orderby' 		=> $order,
			'order' 		=> $orderingDirection,
		);
		
		if($categoryId == '') {
			$params = array(
				'numberposts' 	=> $noItem, 
				'orderby' 		=> $order,
				'order' 		=> $orderingDirection,
			);
		}
		
		$posts = get_posts($params);
		
		echo $before_widget;
		
		if($title) echo $before_title . $title . $after_title;
		
		if(!empty($posts)) : 
		?>
        <style type="text/css">
			#vina-scroller-widget {
				width: <?php echo $width + $slideSpacing * 2; ?>px;
				height: <?php echo $height + $slideSpacing * 2; ?>px;
			}
		</style>
        <div id="vina-scroller-widget" class="<?php echo $moduleStyle; ?>">
            <ul>
                <?php 
				foreach($posts as $post) : 
					$thumbnailId 	= get_post_thumbnail_id($post->ID);				
					$thumbnail 		= wp_get_attachment_image_src($thumbnailId , '70x45');	
					$altText 		= get_post_meta($thumbnailId , '_wp_attachment_image_alt', true);
					$commentsNum 	= get_comments_number($post->ID);
					
					$image 	= VINA_SCROLLER_URI . '/includes/timthumb.php?w='.$imageWidth.'&h='.$imageHeight.'&a=c&q=99&z=0&src=';
					$text   = explode('<!--more-->', $post->post_content);
					$sumary = $text[0];
				?>
                <li>
                    <?php if(!empty($thumbnail) && $thumbImage == 'yes') : ?>
                    	<?php if($linkImage == 'yes') { ?>
                        <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
                        	<?php echo '<img class="thumb" data-bw="' . $image.$thumbnail[0] . '" src="' . $image.$thumbnail[0] . '" alt="'. $altText .'"/>'; ?>
                        </a>
                    	<?php } else { ?>
                       	<?php echo '<img class="thumb" data-bw="' . $image.$thumbnail[0] . '" src="' . $image.$thumbnail[0] . '" alt="'. $altText .'"/>'; ?>
                    	<?php } ?>
                    <?php endif; ?>
                    <div style="margin-top:16px"></div>
                    <?php if($showTitle == 'yes') : ?>
                    	<?php if($linkTitle == 'yes') { ?>
                        <h2>
                        	<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
								<?php echo $post->post_title; ?>
                            </a>
                        </h2>
                    	<?php } else { ?>
                        <h2><?php echo $post->post_title; ?></h2>
                        <?php } ?>
                    <?php endif; ?>
                    <p><?php echo $sumary; ?></p>
                    <?php if($readmore == 'yes') : ?>
                    <a class="buttonlight morebutton" href="<?php echo get_permalink($post->ID); ?>"><?php _e('Read more ...'); ?></a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>

            <!-- Control Button -->
            <div class="toolbar">
                <div class="left"></div>
                <div class="right"></div>
            </div>
        </div>
        <div id="tcvn-copyright">
        	<a href="http://vinathemes.biz" title="Free download Wordpress Themes, Wordpress Plugins - VinaThemes.biz">Free download Wordpress Themes, Wordpress Plugins - VinaThemes.biz</a>
        </div>
        <script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#vina-scroller-widget').services({
				width:			<?php echo $width; ?>,
				height:			<?php echo $height; ?>,
				slideAmount:	<?php echo $slideAmount; ?>,
				slideSpacing:	<?php echo $slideSpacing; ?>,
				touchenabled:	"<?php echo $touchEnabled; ?>",
				mouseWheel:		"<?php echo $mouseWheel; ?>",
				hoverAlpha:		"<?php echo $hoverAlpha; ?>",
				slideshow:		<?php echo $slideshow; ?>,
				hovereffect:	"<?php echo $hoverEffect; ?>",
				callBack:function() { }
			});
		}); 
		</script>
		<?php
		endif;
		
		echo $after_widget;
	}
}

add_action('widgets_init', create_function('', 'return register_widget("Scroller_Widget");'));
wp_enqueue_style('vina-scroller-css', 		VINA_SCROLLER_INC_URI . '/css/style.css', '', '1.0', 'screen' );
wp_enqueue_style('vina-scroller-admin-css', VINA_SCROLLER_INC_URI . '/admin/css/style.css', '', '1.0', 'screen' );
wp_enqueue_script('vina-tooltips', 			VINA_SCROLLER_INC_URI . '/admin/js/jquery.simpletip-1.3.1.js', 'jquery', '1.0', true);

wp_enqueue_script('vina-animate', 		VINA_SCROLLER_INC_URI . '/js/jquery.cssAnimate.mini.js', 'jquery', '1.0', true);
wp_enqueue_script('vina-easing', 		VINA_SCROLLER_INC_URI . '/js/jquery.easing.1.3.js', 'jquery', '1.0', true);
wp_enqueue_script('vina-mousewheel', 	VINA_SCROLLER_INC_URI . '/js/jquery.mousewheel.min.js', 'jquery', '1.0', true);
wp_enqueue_script('vina-touchwipe', 	VINA_SCROLLER_INC_URI . '/js/jquery.touchwipe.min.js', 'jquery', '1.0', true);
wp_enqueue_script('vina-scroller', 		VINA_SCROLLER_INC_URI . '/js/scroller.min.js', 'jquery', '1.0', true);
?>