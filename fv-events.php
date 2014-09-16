<?php

if( !class_exists('FV_Events') ) :

class FV_Events{
  
  function __construct() {
    add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ), 11 );
    add_filter( 'query_vars', array( $this, 'query_vars' ) );
    
    add_filter('manage_posts_columns' , array( $this, 'manage_posts_columns' ) );
    add_action( 'manage_posts_custom_column' , array( $this, 'manage_posts_custom_column' ), 10, 2 );
  }
  
  
  
  
  function is_query($query) {
    if( isset($query->query_vars['fv_events_start']) || isset($query->query_vars['fv_events_end']) || isset($query->query_vars['fv_events']) ) {
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
    
    $tCurrent = isset($_GET['fv_events_current_time']) ? intval($_GET['fv_events_current_time']) : current_time('timestamp');
    $tWrap = isset($query->query_vars['fv_events_week_wrap']) ? date( 'NHis', strtotime( $query->query_vars['fv_events_week_wrap'] ) ) : false; 
      
    if(isset($query->query_vars['fv_events']) && strcasecmp($query->query_vars['fv_events'],'week') == 0 ) {
      if( $tWrap && date( 'NHis',$tCurrent) >= $tWrap ) {      
        $query->set( 'fv_events_start', date( 'Y-m-d', strtotime("next monday", $tCurrent ) ) );
        $query->set( 'fv_events_end', date( 'Y-m-d', strtotime("next sunday", strtotime("next monday", $tCurrent) ) ) );        
      } else {
        $query->set( 'fv_events_start', date( 'Y-m-d', strtotime("previous monday", strtotime('tomorrow', $tCurrent) ) ) );
        $query->set( 'fv_events_end', date( 'Y-m-d', strtotime("next sunday", strtotime('yesterday', $tCurrent) ) ) );
      }
      
    } else if( isset($query->query_vars['fv_events']) && strcasecmp($query->query_vars['fv_events'],'today') == 0 ) {
      $query->set( 'fv_events_start', date( 'Y-m-d', strtotime("today", $tCurrent) ) );
      $query->set( 'fv_events_end', date( 'Y-m-d', strtotime("today", $tCurrent) )." 23:59:59" );
      
    }
    
    add_filter( 'posts_join', array( $this, 'query_join' ), 10, 2 );
    add_filter( 'posts_where', array( $this, 'query_where' ), 10, 2 );
    add_filter( 'posts_orderby', array( $this, 'query_order_by' ), 10, 2) ;
    
    if( isset($_GET['fv_events_debug']) ) {
      echo "<!--fv_events_debug:\ntWrap: ".$tWrap." vs. ".date( 'NHis',$tCurrent)."\nquery args: ".var_export($query,true)."-->\n\n";
    }
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
    $qvars[] = 'fv_events';
    return $qvars;
  }  
  
  
  
  
  function query_where( $where, $query ) {
    if( !$this->is_query( $query ) ) {
      return $where;
    }
    
    global $wpdb;
    return $where."AND fv_events_start.meta_key = '_fv_event_date' AND UNIX_TIMESTAMP(fv_events_start.meta_value) >= UNIX_TIMESTAMP('{$query->query_vars['fv_events_start']}') AND UNIX_TIMESTAMP(fv_events_start.meta_value) <= UNIX_TIMESTAMP('{$query->query_vars['fv_events_end']}') ";   
  }
    
  
  
  
}

$FV_Events = new FV_Events;

endif;
