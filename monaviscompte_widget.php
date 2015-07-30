<?php
class monaviscompte_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('monaviscompte', 'monaviscompte', array('description' => __('This module allows you to display a monaviscompte widget on your website in a few seconds', 'monaviscompte')));
    }
    
    public function widget($args, $instance)
    {
    	$itemId = isset($instance['itemId']) ? $instance['itemId'] : '';
    	$accessKey = isset($instance['accessKey']) ? $instance['accessKey'] : '';
    	$widgetSize = isset($instance['widgetSize']) ? $instance['widgetSize'] : '';
    	$widgetColor = isset($instance['widgetColor']) ? $instance['widgetColor'] : 'default';
    	
    	echo
    		'<div id="widget-'.$widgetSize.'-'.$itemId.'" class="widget">'.
				'<script type="text/javascript" src="https://www.monaviscompte.fr/widget/'.$widgetSize.'/'.$widgetColor.'/'.$itemId.'?div=widget-'.$widgetSize.'-'.$itemId.'&public_key='.$accessKey.'"></script>'.
			'</div>';
    }

	public function form($instance)
	{
		$itemId = isset($instance['itemId']) ? $instance['itemId'] : '';
		$accessKey = isset($instance['accessKey']) ? $instance['accessKey'] : '';
		$widgetSize = isset($instance['widgetSize']) ? $instance['widgetSize'] : '';
		$widgetColor = isset($instance['widgetColor']) ? $instance['widgetColor'] : '';

		echo 
			'<p>'.
				'<label for="'.$this->get_field_name( 'itemId' ).'">'.__( 'Item identifier:', 'monaviscompte' ).'*</label>'.
				'<input class="widefat" id="'.$this->get_field_id( 'itemId' ).'" name="'.$this->get_field_name( 'itemId' ).'" type="text" value="'.$itemId.'" />'.
			'</p>'.
			'<p>'.
				'<label for="'.$this->get_field_name( 'accessKey' ).'">'.__( 'Access key:', 'monaviscompte' ).'*</label>'.
				'<input class="widefat" id="'.$this->get_field_id( 'accessKey' ).'" name="'.$this->get_field_name( 'accessKey' ).'" type="text" value="'.$accessKey.'" />'.
			'</p>'.
			'<p>'.
				'<label for="'.$this->get_field_name( 'widgetSize' ).'">'.__( 'Widget size:', 'monaviscompte' ).'</label>'.
				'<select class="widefat" id="'.$this->get_field_id( 'widgetSize' ).'" name="'.$this->get_field_name( 'widgetSize' ).'">'.
					'<option value=""></option>'.
					'<option value="h-small" '.($widgetSize == 'h-small' ? selected : '').'>'.__( 'Small horizontal', 'monaviscompte' ).'</option>'.
					'<option value="s-medium" '.($widgetSize == 's-medium' ? selected : '').'>'.__( 'Medium squared', 'monaviscompte' ).'</option>'.
					'<option value="v-large" '.($widgetSize == 'v-large' ? selected : '').'>'.__( 'Large vertical', 'monaviscompte' ).'</option>'.
				'</select>'.
			'</p>'.
			'<p>'.
				'<label for="'.$this->get_field_name( 'widgetColor' ).'">'.__( 'Widget color:', 'monaviscompte' ).'</label>'.
				'<select class="widefat" id="'.$this->get_field_id( 'widgetColor' ).'" name="'.$this->get_field_name( 'widgetColor' ).'">'.
					'<option value=""></option>'.
					'<option value="default" '.($widgetColor == 'default' ? selected : '').'>'.__( 'Default color', 'monaviscompte' ).'</option>'.
					'<option value="black" '.($widgetColor == 'black' ? selected : '').'>'.__( 'Black', 'monaviscompte' ).'</option>'.
					'<option value="grey" '.($widgetColor == 'grey' ? selected : '').'>'.__( 'Grey', 'monaviscompte' ).'</option>'.
				'</select>'.
			'</p>';
	}
}