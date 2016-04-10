<?php 
/*
Plugin Name: Any List Widget
Plugin URI:  http://themepeak.com
Description: Plugin to create realy simple list. You can make list of url, downloads or any other list with dashicons or Contact us field
Version:     1.1
Author:      Sange yonjan For ITEXPERTS PVT LTD.
Author URI:  http://themepeak.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages

*/


// Block direct requests
if ( !defined('ABSPATH') ) {
	die('-1');
}




// Creating the widget 
class tp_anylist extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'tp_anylist', 

// Widget name will appear in UI
__('Anylist Widget', 'tp_anylist_domain'), 

// Widget description
array( 'description' => __( 'Anylist Widget to create list of anything with dashicons', 'tp_anylist_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	 extract( $args );
$title = apply_filters( 'widget_title', $instance['title'] );
//Creating instance for text
for($i=1;$i<=10;$i++){
	
	$text[$i]=$instance['text'.$i];
	}
	
	//Creating instance for genericons
for($i=1;$i<=10;$i++){
	
	$genericon[$i]=$instance['genericon'.$i];
	}

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

?>
<div class="custom-all-info">

<?php for($i=1;$i<=10;$i++){
	
			if(! empty($instance['text'.$i])){
				?>
				<div class="<?php echo 'text'.$i ?>">
				<?php
			 if(! empty($instance['genericon'.$i])){
				?>
				<!-- <div class="<?php 'genericons'.$i?>"> -->
				 <?php echo '<span class="genericon'.' genericon-'.$instance['genericon'.$i].'"></span>'; ?>
				<!-- </div> -->
				
				<?php
				
			} //end of if !empty genericon
			?>
			<?php echo $instance['text'.$i]; ?>
				</div> 
				
				
			<?php
			} //end of if!text
} //end of for all loop
?>
</div>
<?php

// This is where you run the code and display the output



echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'tp_contact_domain' );
}
 //Creating instance for text
for($i=1;$i<=10;$i++){
	
	$text[$i]=$instance['text'.$i];
	}
	
	//Creating instance for genericons
for($i=1;$i<=10;$i++){
	
	$genericon[$i]=$instance['genericon'.$i];
	}

?>
<p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
<?php for($i=1;$i<=10;$i++){
	?>
		
		<p>
<select class="widefat" name="<?php echo $this->get_field_name('genericon'.$i); ?>" >
<option <?php if ( '0'          == $instance['genericon'.$i] ) echo 'selected="selected"'; ?> value="0"></span> Empty</option>
<option <?php if ('book'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="book">	    Book	</option>
<option <?php if ('document'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="document">	Document	</option>
<option <?php if ('download'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="download">	Download	</option>
<option <?php if ('external'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="external">	External Link	</option>
<option <?php if ('facebook'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="facebook">	Facebook	</option>
<option <?php if ('flickr'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="flickr">	Flickr	</option>
<option <?php if ('googleplus'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="googleplus">Googleplus	</option>
<option <?php if ('handset'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="handset">	Handset	</option>
<option <?php if ('location'	== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="location">	Location	</option>
<option <?php if ('mail'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="mail">		Mail	</option>
<option <?php if ('month'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="month">		Month	</option>
<option <?php if ('phone'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="phone">		Phone	</option>
<option <?php if ('picture'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="picture">	Picture	</option>
<option <?php if ('print'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="print">		Print	</option>
<option <?php if ('time'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="time">		Time	</option>
<option <?php if ('twitter'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="twitter">	Twitter	</option>
<option <?php if ('website'		== $instance['genericon'.$i]	) echo 'selected="selected"'; ?> value="website">	Website	</option>
                                                        

       
	</select>
	<label>Select Logo for Text <?php echo $i; ?></label>

<p>
		<p>
		          <label for="<?php echo $this->get_field_id('text'.$i); ?>"><?php _e('Text'.$i); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('text'.$i); ?>" name="<?php echo $this->get_field_name('text'.$i); ?>" type="text" value="<?php echo $text[$i]; ?>" />
        </p>
		<hr/>
<?php
}
}



	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
for($i=1;$i<=10;$i++){
	
	$instance['text'.$i]=$new_instance['text'.$i];
	
}
for($i=1;$i<=10;$i++){
	
	$instance['genericon'.$i]=$new_instance['genericon'.$i];
	
}


return $instance;
}
} // Class tp_contact ends here

// Register and load the widget
function tp_anylist_load_widget() {
	register_widget( 'tp_anylist' );
}
add_action( 'widgets_init', 'tp_anylist_load_widget' );
