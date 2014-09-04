<?php
/*
Plugin Name: FV Events
Plugin URI: http://www.foliovision.com
Description: Add event dates to the posts
Version: 0.1
Author: Foliovision s.r.o.
Author URI: http://www.foliovision.com
*/


if( !class_exists('FV_Events') ) :

class FV_Events{
  
  function __construct() {
    add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ), 11 );
    add_filter( 'query_vars', array( $this, 'query_vars' ) );
    
    add_filter('manage_posts_columns' , array( $this, 'manage_posts_columns' ) );
    add_action( 'manage_posts_custom_column' , array( $this, 'manage_posts_custom_column' ), 10, 2 );
  }
  
  
  
  
  function is_query($query) {
    if( isset($query->query_vars['fv_events_start']) || isset($query->query_vars['fv_events_end']) ) {
      return true;
    }
    return false;
  }
  
  
  
  
  function manage_posts_columns( $columns ) {
    $columns['fv_event_date'] = 'Event Date';
    return $columns;
  }
  
  
  
  
  function manage_posts_custom_column( $column, $post_id ) {
    if( $column != 'fv_event_date' ) {
      return;
    }
    
    echo get_post_meta($post_id, '_fv_event_date', true);
  }

  
  
  
  function pre_get_posts( $query ) {
  
    //If not on event, stop here.
    if( !$this->is_query( $query ) ) {
      return $query;
    }
    
    add_filter( 'posts_join', array( $this, 'query_join' ), 10, 2 );
    add_filter( 'posts_where', array( $this, 'query_where' ), 10, 2 );
    add_filter( 'posts_orderby', array( $this, 'query_order_by' ), 10, 2) ;
  }
  
  
  
  
  function query_join( $join, $query ) {
    if( !$this->is_query( $query ) ) {
      return $join;
    }
    
    global $wpdb;
    return "JOIN {$wpdb->postmeta} AS fv_events_start ON {$wpdb->posts}.ID = fv_events_start.post_id ";   
  }
  
  
  
  
  function query_order_by( $order_by, $query) {
    if( !$this->is_query( $query ) ) {
      return $order_by;
    }
    
    global $wpdb;
    return "fv_events_start.meta_value ".( ( isset($query->query_vars['order']) && strcasecmp($query->query_vars['order'],'asc') == 0 ) ? 'ASC' : 'DESC' );     
  }
  
  
  
  
  function query_vars( $qvars ){
    $qvars[] = 'fv_events_start';
    $qvars[] = 'fv_events_end';
    return $qvars;
  }  
  
  
  
  
  function query_where( $where, $query ) {
    if( !$this->is_query( $query ) ) {
      return $where;
    }
    
    global $wpdb;
    return "AND fv_events_start.meta_key = '_fv_event_date' AND fv_events_start.meta_value >= '{$query->query_vars['fv_events_start']}' AND fv_events_start.meta_value <= '{$query->query_vars['fv_events_end']}' ";   
  }
    
  
  
  
}

$FV_Events = new FV_Events;

endif;
