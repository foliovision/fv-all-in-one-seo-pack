<?php

require_once( dirname(__FILE__).'/fp-api.php' );

class FV_Simpler_SEO_Pack extends FV_Simpler_SEO_Plugin
{
  //-------------------------------
  // FIELDS
  //-------------------------------

  /** Max numbers of chars in auto-generated description */
  //var $maximum_description_length = 160;
  var $maximum_description_length = 145;
  
  var $maximum_description_length_yellow = 134;
  //var $maximum_title_length = 61;
  var $maximum_title_length = 56;
  
  /** Minimum number of chars an excerpt should be so that it can be used
   * as description. Touch only if you know what you're doing
   */
  var $minimum_description_length = 1;

  var $idEmptyPostName = null;
  var $strTitleForReference = null;
  //-------------------------------
  // CONSTRUCTORSaioseop_
  //-------------------------------




  /**
   * Constructor.
   */
  function __construct(){
    global $fvseop_options;
    $fvseop_options = get_option('aioseop_options');
    
    if( is_admin() ) {
      parent::__construct();
      $this->plugin_slug = 'fv_simpler_seo';
      $this->readme_URL = 'http://plugins.trac.wordpress.org/browser/fv-all-in-one-seo-pack/trunk/readme.txt?format=txt';    
      if( !has_action( 'in_plugin_update_message-fv-all-in-one-seo-pack/fv-all-in-one-seo-pack.php' ) ) {
        add_action( 'in_plugin_update_message-fv-all-in-one-seo-pack/fv-all-in-one-seo-pack.php', array( &$this, 'plugin_update_message' ) );
      }
      
      add_filter( 'user_contactmethods', array( $this, 'update_contactmethods' ), 10, 1 );
      
      global $fv_simpler_seo_version;
      if( get_option('fv_simpler_seo_version') != $fv_simpler_seo_version ) {
        $this->activate();
      }

      if( empty($fvseop_options['fvseo_changes_1_6_25']) ) {
        $sURL = site_url('wp-admin/options-general.php?page=fv_simpler_seo');
        $aNotices = array();
        if( empty($fvseop_options['fvseo_attachments']) || $fvseop_options['fvseo_attachments'] ) $aNotices[] = "<strong>Wordpress attachment URLs</strong> are now redirected to the post where they are attached. <a href='".$sURL."#fvseo_attachments' target='_blank'>Show me the setting</a>";
        if( empty($fvseop_options['fvseo_hentry']) ) $aNotices[] = "<strong>hAtom microformats</strong> are now removed. <a href='".$sURL."#fvseo_hentry' target='_blank'>Show me the setting</a>";
        if( empty($fvseop_options['fvseo_hentry']) ) $aNotices[] = "<strong>Wordpress shortlink</strong> tags are removed. <a href='".$sURL."#fvseo_shortlinks' target='_blank'>Show me the setting</a>";
        $sNotices = "<li>".implode( "</li><li>",$aNotices )."</li>";
        
        $this->pointer_boxes['fvseo_changes_1_6_25'] = array(
          'id' => '#wp-admin-bar-my-account',
          'pointerClass' => 'fvseo_changes_1_6_25',
          'heading' => __('FV Simpler SEO 1.6.25', 'fv_flowplayer'),
          'content' => __("<p>Please check the latest changes below:</p><ol>".$sNotices."</ol>", 'fv_flowplayer'),
          'position' => array( 'edge' => 'top', 'align' => 'right' ),
          'button1' => __('I understand', 'fv_flowplayer'),
          'button2' => __('I\'ll check this later', 'fv_flowplayer')
        );
      }
    }   
  }
  
  
  
  
  function activate() {
    global $fv_simpler_seo_version;
    $fvseop_options = ( get_option('aioseop_options') ) ? get_option('aioseop_options') : array();
    if( /*isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] || */!isset($fvseop_options['aiosp_shorten_slugs']) ) {
      update_option( $this->plugin_slug.'_deferred_notices', 'FV Simpler SEO will from now on automatically shorten your new post slugs to 3 most important keywords. You can disable this option in its <a href="'.$this->get_admin_page_url().'">Settings</a>.' );     
    }
    if( /*isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] || */!isset($fvseop_options['social_meta_facebook']) || !isset($fvseop_options['social_meta_twitter']) ) {
      $deferred = get_option( $this->plugin_slug.'_deferred_notices');
      if( $deferred ) {
        $deferred = $deferred.'<br /><br />';
      }
      update_option( $this->plugin_slug.'_deferred_notices', $deferred.'FV Simpler SEO will from now on automatically add Facebook Open Graph and Twitter Card meta tags to your posts. You can disable this option in its <a href="'.$this->get_admin_page_url().'">Settings</a>.' );     
    }
    
    global $fvseop_default_options;    
    $fvseop_options = array_merge( $fvseop_default_options, $fvseop_options );
    update_option( 'aioseop_options', $fvseop_options );
    
    update_option('fv_simpler_seo_version', $fv_simpler_seo_version);
  }




  function admin_init() {
    if( isset($_GET['page']) && $_GET['page'] == $this->plugin_slug ) {
      wp_enqueue_script('common');
      wp_enqueue_script('wp-lists');
      wp_enqueue_script('postbox');
    } 
  }
  
  
  
  
  function ajax__pointers() {
    if( isset($_POST['key']) && $_POST['key'] == 'fvseo_changes_1_6_25' && isset($_POST['value']) && $_POST['value'] == "true" ) {
      check_ajax_referer('fvseo_changes_1_6_25');

      $fvseop_options = get_option('aioseop_options');
      $fvseop_options['fvseo_changes_1_6_25'] = true;
      update_option( 'aioseop_options', $fvseop_options );
      die();
    }    
  }
  
  
  
    
  function fv_simpler_seo_settings_closed_meta_boxes( $closed ) {
    if ( false === $closed )
        $closed = array( 'fv_simpler_seo_interface_options', 'fv_simpler_seo_advanced' );

    return $closed;
  }


  
  
  //-------------------------------
  // UTILS
  //-------------------------------


  /**      
   * Convert a string to lower case.
   * Originally, this function relied their functionality in a global UTF-8 character table.
   * I will take my chances with a standard function.
   * 
   * Update March 11, 2010: Well, the standard function is not working on some hosts. There's a check for it before this code is used.
   */
  function strtolower($str)
  {
    global $UTF8_TABLES;
    return strtr($str, $UTF8_TABLES['strtolower']);
    ///return mb_strtolower($str, 'UTF-8');
  }

  /**      
   * Convert a string to upper case.
   * Originally, this function relied their functionality in a global UTF-8 character table.
   * I will take my chances with a standard function.
   *
   * Update March 11, 2010: Well, the standard function is not working on some hosts. There's a check for it before this code is used.
   */
  function strtoupper($str)
  {
    global $UTF8_TABLES;
    return strtr($str, $UTF8_TABLES['strtoupper']);
    ///return mb_strtoupper($str, 'UTF-8');
  }

  /**
   * Make a string's first character uppercase.
   */
  function capitalize($s)
  {
    $s = trim($s);
    $tokens = explode(' ', $s);
    while (list($key, $val) = each($tokens)) {
            $tokens[$key] = trim($tokens[$key]);
            $tokens[$key] = strtoupper(substr($tokens[$key], 0, 1)) . substr($tokens[$key], 1);
    }
    $s = implode(' ', $tokens);
    return $s;
    ///return mb_convert_case($s, MB_CASE_TITLE, 'UTF-8');
  }
  
  function curPageURL() {
   $pageURL = 'http';
   if ( isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
   $pageURL .= "://";
   if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
   }
   return $pageURL;
  }
    
  function is_static_front_page()
  {
    global $wp_query;
    
    $post = $wp_query->get_queried_object();
    
    return get_option('show_on_front') == 'page' && is_page() && $post->ID == get_option('page_on_front');
  }
  
  function is_static_posts_page()
  {
    global $wp_query;
    
    $post = $wp_query->get_queried_object();
    
    return get_option('show_on_front') == 'page' && is_home() && $post->ID == get_option('page_for_posts');
  }

  /**
   * This function detects if a given request contains the name of an excluded page.
   */
  function fvseop_mrt_exclude_this_page()
  {
    global $fvseop_options;

    $currenturl = trim(esc_url($_SERVER['REQUEST_URI'], '/'));

    if( isset($fvseop_options['aiosp_ex_pages']) ) {
      $excludedstuff = explode(',', $fvseop_options['aiosp_ex_pages']);
      foreach ($excludedstuff as $exedd)
      {
        $exedd = trim($exedd);
  
        if ($exedd)
        {
          if (stristr($currenturl, $exedd))
          {
            return true;
          }
        }
      }
    }

    return false;
  }
  
  function output_callback_for_title($content)
  {
    return $this->rewrite_title($content);
  }

  /**
   * TODO: This function seems to translate the text to the current language.
   * Actually I don't have any insight that this is really effective.
   */
  function internationalize($in)
  {
    if (function_exists('langswitch_filter_langs_with_message'))
    {
      $in = langswitch_filter_langs_with_message($in);
    }

    if (function_exists('polyglot_filter'))
    {
      $in = polyglot_filter($in);
    }

    if (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage'))
    {
      $in = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($in);
    }

    $in = apply_filters('localization', $in);

    return $in;
  }

  //-------------------------------
  // ACTIONS
  //-------------------------------

  function SortByLength( $strA, $strB ){
    return strlen( $strB ) - strlen( $strA );
  }


  function GeneratePostSlug( $strSlug, $idPost, $keywords = 3 ){
    global $wpdb;
        
    $aSlug = explode( '-', $strSlug );
    
    if( 3 >= count( $aSlug ) ) return $strSlug;
    //if( 4 == count( $aSlug ) && preg_match( '~\d+$~', $aSlug[3] ) ) return $strSlug;  //  todo: this is really not a good way.
    if( 20 >= strlen( $strSlug ) ) return $strSlug;
    
    $aSlug = array_unique( $aSlug );
    $aSortSlug = $aSlug;
    usort( $aSortSlug, array( $this, 'SortByLength' ) );
    $aSortSlug = array_slice( $aSortSlug, 0, $keywords );
    
    $aSlug = array_intersect( $aSlug, $aSortSlug );
    $strSlugNew = implode( '-', $aSlug );
    
    if( $idPost ){
      $aPost = $wpdb->get_var( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = '".$wpdb->escape( $strSlugNew )."' AND `ID` != {$idPost} AND post_type != 'revision'" );
      $i = 0;
      
      if( count($aSortSlug) >= $keywords ) {
        if( $aPost ) {
          $strSlug = $this->GeneratePostSlug( $strSlug, $idPost, ++$keywords );
        } else {
          $strSlug = $strSlugNew;
        }
      } else {
        while( count( $aPosts ) ) {
          if( $i ) $strNewSlug = $strSlug . '-' . ($i+1);
          else $strNewSlug = $strSlug . '-1';
          
          $i++;
          $aPosts = $wpdb->get_results( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = '".$wpdb->escape( $strNewSlug )."' AND `ID` != {$idPost}" );
        } 
        if( $strNewSlug ) $strSlug = $strNewSlug;
      }
    }
    
    return $strSlug;
  }
  

  function EditPostSlug( $strSlug, $idPost = null, $strPostStatus = null, $strPostType = null, $idPostParent = null ){
    global $fvseop_options, $wpdb;

    if( !$fvseop_options['aiosp_shorten_slugs'] || $strPostType == 'revision' )
    return $strSlug;
    
    if( !$idPost ){
      if( isset( $_GET['post'] ) )
        $idPost = intval( $_GET['post'] );
      if( isset( $_POST['post_id'] ) )
        $idPost = intval( $_POST['post_id'] );
      if( isset( $_POST['post_ID'] ) )
        $idPost = intval( $_POST['post_ID'] );
    }
    
    if( !$idPost ) {
      $strSlug = $this->GeneratePostSlug( $strSlug, false );
    } else if ( isset($_POST['new_slug']) && $_POST['new_slug'] == '' ) {
      $strSlug = $this->GeneratePostSlug( $strSlug, $idPost );
    }
    
    return $strSlug;
  }
  
  function SavePostSlug( $aData, $aPostArg ){
    global $fvseop_options;
    
    if( !$fvseop_options['aiosp_shorten_slugs'] || $aPostArg['post_type'] == 'revision' )
      return $aData;
    
    if( isset( $aPostArg['post_id'] ) )
      $idPost = intval( $aPostArg['post_id'] );
    if( isset( $aPostArg['post_ID'] ) )
      $idPost = intval( $aPostArg['post_ID'] );
    if( isset( $aPostArg['ID'] ) )
      $idPost = intval( $aPostArg['ID'] );
    if( isset( $aData['ID'] ) )
      $idPost = intval( $aData['ID'] );
    
    if( !$aData['post_name'] ){
      $this->idEmptyPostName = $idPost;
      $this->strTitleForReference = $aData['post_title'];
    }
    
    return $aData;
  }
  
  function SanitizeTitleForShortening( $strTitle, $strRawTitle = '', $strContext = false ){
    global $fvseop_options;    
    
    if( isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] && $strContext == 'save' && $this->idEmptyPostName && $strRawTitle == $this->strTitleForReference ) {
      $strTitle = $this->GeneratePostSlug( $strTitle, $this->idEmptyPostName );
    }
    
    return $strTitle;
  }





  /**
   * Runs after WordPress admin has finished loading but before any headers are sent.
   * Useful for intercepting $_GET or $_POST triggers. 
   */
  function init()
  {
    // Loads the plugin's translated strings. 
    load_plugin_textdomain('fv_seo', false, dirname(plugin_basename(__FILE__)) . "/languages");
  }
  
  function remove_canonical() {
    if (is_single() || is_page() || $this->is_static_posts_page()) {
      global $wp_query, $fvseop_options;
      $post = $wp_query->get_queried_object();
    
      $custom_canonical = trim( get_post_meta($post->ID, "_aioseop_custom_canonical", true) );
      if( $custom_canonical && $fvseop_options['aiosp_show_custom_canonical'] ) {
        remove_action('wp_head', 'rel_canonical');
      }
    }
  }

  /**
   * Runs before the determination of the template file to be used to display the requested page,
   * so that a plugin can override the template file choice.
   *
   * Used in this case for title rewrite.
   */
  function template_redirect()
  {
    global $wp_query;
    global $fvseop_options;

    $post = $wp_query->get_queried_object();
    
    global $fvseop_options;
    if( isset($fvseop_options['fvseo_attachments']) && $fvseop_options['fvseo_attachments'] ) {
      if( is_attachment() ) {
        global $post;
        $aImage = wp_get_attachment_image_src($post->ID, 'full');
        if( isset($aImage[0]) ) {
          wp_redirect($aImage[0],301);
          exit;
        }
      }
    }
    

    if( $wp_query->is_404 && isset($wp_query->query['paged']) && $wp_query->query['paged'] > 0 ) {

      $aArgs = $wp_query->query;
      unset($aArgs['paged']);
      $objCheckPaging = new WP_Query( $aArgs );

      global $wp_rewrite;
      
      $sLink = false;
      if( $objCheckPaging->is_year ) {        
        $sLink = get_year_link( $aArgs['year'] );
        
      } else if( $objCheckPaging->is_month ) {
        $sLink = get_month_link( $aArgs['year'], intval($aArgs['monthnum']) );
        
      } else if( $objCheckPaging->is_day ) {
        $sLink = get_day_link( $aArgs['year'], $aArgs['monthnum'], $aArgs['day'] );
        
      } else if( $objCheckPaging->is_category ) {
        if( isset($wp_query->query['category_name']) ) {
          $objCat = get_category_by_path( $wp_query->query['category_name'] ); 
          $iCatId = $objCat->term_id;
        }
        if( isset($iCatId) ) {
          $sLink = get_category_link($iCatId);
        }
        
      } else if( $objCheckPaging->is_author ) {
        if( isset($wp_query->query['author_name']) ) {
          $objAuthor = get_user_by( 'slug', $wp_query->query['author_name'] ); 
          $iAuthorId = $objAuthor->ID;
        }
        if( isset($iAuthorId) ) {
          $sLink = get_author_posts_url($iAuthorId);
        }
        
      }
      
      if( $objCheckPaging->max_num_pages > 0 && $sLink ) {
        if( $objCheckPaging->max_num_pages > 1 ) {
          $sLink = user_trailingslashit( trailingslashit($sLink).'page/'.$objCheckPaging->max_num_pages );  
        }
        wp_redirect($sLink,301);
        exit;
      }
    }
    


    if ($this->fvseop_mrt_exclude_this_page())
    {
      return;
    }

    if (is_feed())
    {
      return;
    }

    if (is_single() || is_page())
    {
      $fvseo_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, '_aioseop_disable', true)));
      
      if ($fvseo_disable)
      {
        return;
      }
    }

    /// Let's do this also if longer title is specified or if it's homepage
    if ($fvseop_options['aiosp_rewrite_titles'] || ( is_object( $post ) && isset($post->ID) && get_post_meta($post->ID, "_aioseop_title", true) ) || is_home() )
    {
      ob_start(array($this, 'output_callback_for_title')); // this ob_start is matched with ob_end_flush in wp_head
    }
  }

  /**
   * Triggered within the <head></head> section of the user's template.
   *
   * This hook is theme-dependent which means that it is up to the author of each WordPress theme
   * to include it. It may not be available on all themes, so you should take this into account
   * when using it.
   *
   * Although this is theme-dependent, it is one of the most essential theme hooks, so it is
   * fairly widely supported. 
   */
  function wp_head()
  {
    if (is_feed()) // ignore logic if it's a feed
    {
      return;
    }
                
    global $wp_query;
    global $fvseop_options;

    $post = $wp_query->get_queried_object();
                
        //Add link rel="next/prev" when displaying archive
        global $wp_rewrite;
                
        if($wp_rewrite->using_permalinks() && (is_category() || is_tag() || is_tax())){
            $taxonomy = $wp_query->tax_query->queries[0]["taxonomy"];
            $term = $wp_query->tax_query->queries[0]["terms"][0];
                
            $prev = "";
            $next = "";
              
            $page = 0;
              
            if(isset($wp_query->query["paged"]))
                $page = intval($wp_query->query["paged"]);
                
            $posts_per_page = $wp_query->query_vars["posts_per_page"];
            $found_posts = $wp_query->found_posts;
            $root = get_term_link($term,$taxonomy);                        
            
            
            if($page){
                    
                //set prev links
                if($page-1<2){
                    $prev = user_trailingslashit( trailingslashit($root) );
                }else{
                    $prev = user_trailingslashit( trailingslashit($root).'page/'.($page-1) );
                }
                    
                //set next link
                if($found_posts>$posts_per_page*$page){
                    $next = user_trailingslashit( trailingslashit($root).'page/'.($page+1) );
                }
                  
            }else{
                //set next link if necessary
                if($found_posts > $posts_per_page){
                    $next = user_trailingslashit( trailingslashit($root).'page/2/' );
                }
                   
            }
            
            if($prev){
                echo "<link rel='prev' href='$prev' />";
            }
                
            if($next){
                echo "<link rel='next' href='$next' />";
            }
            // end adding link rel='next/prev'
               
        }
                
    $meta_string = null;

    if ($this->is_static_posts_page())
    {
      // TODO: strip_tags return a string with all HTML and PHP tags stripped from a given str. Since
      // it uses a tag stripping state machine, probably it's better to remove this function if you
      // never use weird post titles.
      //
      // The apply_filters on 'single_post_title' ensure any previous plugin is applied.
      //
      // I would like to change this line to
      //
      // $title = $post->post_title;
      //
      // and save a lot of CPU cycles.
      $title = strip_tags(apply_filters('single_post_title', $post->post_title));
    }

    if (is_single() || is_page())
    {
      $fvseo_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, '_aioseop_disable', true)));
      if ($fvseo_disable)
      {
        return;
      }
      
      $post_noindex = get_post_meta($post->ID, '_aioseop_noindex', true);
      $post_nofollow = get_post_meta($post->ID, '_aioseop_nofollow', true);
      if( $post_noindex ) {
        $meta_robots[] = 'noindex';
      }
      if( $post_nofollow ) {
        $meta_robots[] = 'nofollow';
      } 
      if( isset($meta_robots) && !empty($meta_robots) ) {
        $meta_string .= '<meta name="robots" content="'.implode(',',$meta_robots).'" />'."\n";
      }
      
    }

    if ($this->fvseop_mrt_exclude_this_page())
    {
      return;
    }

                /// Modification - always enabled
    if ($fvseop_options['aiosp_rewrite_titles']     || 1>0)
    {
      // make the title rewrite as short as possible
      if (function_exists('ob_list_handlers'))
      {
        $active_handlers = ob_list_handlers();
      }
      else
      {
        $active_handlers = array();
      }
      
      if ((sizeof($active_handlers) > 0) &&
        (strtolower($active_handlers[sizeof($active_handlers) - 1]) ==
        strtolower('FV_Simpler_SEO_Pack::output_callback_for_title')))
      {
        ob_end_flush(); // this ob_end_flush is matched with ob_start in template_redirect
      }
      else
      {
        // TODO:
        // if we get here there *could* be trouble with another plugin :(
        // decide what to do
      }
    }

    if ((is_home() && stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_keywords'] ) ) &&
      !$this->is_static_posts_page()) || $this->is_static_front_page())
    {
      $keywords = trim( stripcslashes( $this->internationalize($fvseop_options['aiosp_home_keywords']) ) );
    }
    elseif ($this->is_static_posts_page() && !$fvseop_options['aiosp_dynamic_postspage_keywords']) // and if option = use page set keywords instead of keywords from recent posts
    {
      $keywords = stripcslashes($this->internationalize(get_post_meta($post->ID, "_aioseop_keywords", true)));
    }
    else
    {
      $keywords = $this->get_all_keywords();
    }

    if (is_single() || is_page() || $this->is_static_posts_page())
    {
      if ($this->is_static_front_page())
      {
        $description = trim(stripcslashes($this->internationalize($fvseop_options['aiosp_home_description'])));
      }
      else
      {
        $description = $this->get_post_description($post);
        $description = apply_filters('fvseop_description', $description);
      }
    }
    elseif (is_home())
    {
      $description = trim(stripcslashes($this->internationalize($fvseop_options['aiosp_home_description'])));
    }
    elseif (is_category())
    {
      $description = $this->internationalize(category_description());
    }

    if (isset($description) && (strlen($description) > $this->minimum_description_length) &&
      !(is_home() && is_paged()))
    {
      $description = trim(strip_tags($description));
      $description = str_replace('"', '', $description);
      
      // replace newlines on mac / windows?
      $description = str_replace("\r\n", ' ', $description);
      
      // maybe linux uses this alone
      $description = str_replace("\n", ' ', $description);

      if (!isset($meta_string))
      {
        $meta_string = '';
      }

      // description format
      $description_format = stripslashes( $fvseop_options['aiosp_description_format'] );

      if (!isset($description_format) || empty($description_format))
      {
        $description_format = "%description%";
      }
      
      $description = str_replace('%description%', $description, $description_format);
      $description = str_replace('%blog_title%', get_bloginfo('name'), $description);
      $description = str_replace('%blog_description%', get_bloginfo('description'), $description);
      $description = str_replace('%wp_title%', $this->get_original_title(), $description);
      $description = trim( str_replace('%page%', $this->paged_description(), $description) );
      $description = __( $description );

      if ($fvseop_options['aiosp_can'] && is_attachment())
      {
        $url = $this->fvseo_mrt_get_url($wp_query);
                
        if ($url)
        {
          preg_match_all('/(\d+)/', $url, $matches);

          if (is_array($matches))
          {
            $uniqueDesc = join('', $matches[0]);
          }
        }
        
        $description .= ' ' . $uniqueDesc;
      }
      
      $meta_string .= '<meta name="description" content="' . esc_attr($description) . '" />';
    }
    
    $keywords = apply_filters('fvseop_keywords', $keywords);
    
    if (isset($keywords) && !empty($keywords) && !(is_home() && is_paged()))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }
      
      $meta_string .= '<meta name="keywords" content="' . esc_attr($keywords) . '" />';
    }

    if (function_exists('is_tag'))
    {
      $is_tag = is_tag();
    }
    
                /// Added noindex for search
    if ((is_category() && $fvseop_options['aiosp_category_noindex']) ||
      (!is_category() && is_archive() &&!$is_tag && $fvseop_options['aiosp_archive_noindex']) ||
      ($fvseop_options['aiosp_tags_noindex'] && $is_tag) ||
                        (is_search() && $fvseop_options['aiosp_search_noindex'])
                        )
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }
      
      $meta_string .= '<meta name="robots" content="noindex,follow" />';
    }
    
    $page_meta = stripcslashes($fvseop_options['aiosp_page_meta_tags']);
    $post_meta = stripcslashes($fvseop_options['aiosp_post_meta_tags']);
    $home_meta = stripcslashes($fvseop_options['aiosp_home_meta_tags']);
    
    if (is_page() && isset($page_meta) && !empty($page_meta) || $this->is_static_posts_page())
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }
      
      $meta_string .= $page_meta;
    }
    
    if (is_single() && isset($post_meta) && !empty($post_meta))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }

      $meta_string .= $post_meta;
    }

    if (is_home() && !empty($home_meta))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }

      $meta_string .= $home_meta;
    }

    // add google site verification meta tag for webmasters tools
    $home_google_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_google_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_google_site_verification_meta_tag']) : NULL;
    $home_yahoo_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_yahoo_site_verification_meta_tag']) : NULL;
    $home_bing_site_verification_meta_tag = isset( $fvseop_options['aiosp_home_bing_site_verification_meta_tag'] ) ? stripcslashes($fvseop_options['aiosp_home_bing_site_verification_meta_tag']) : NULL;

    if (is_home() && !empty($home_google_site_verification_meta_tag))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }

      $meta_string .= wp_kses($home_google_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
    }
    
    if (is_home() && !empty($home_yahoo_site_verification_meta_tag))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }

      $meta_string .= wp_kses($home_yahoo_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
    }
    
    if (is_home() && !empty($home_bing_site_verification_meta_tag))
    {
      if (isset($meta_string))
      {
        $meta_string .= "\n";
      }

      $meta_string .= wp_kses($home_bing_site_verification_meta_tag, array('meta' => array('name' => array(), 'content' => array())));
    }

    if ($meta_string != null)
    {
      echo wp_kses($meta_string, array('meta' => array('name' => array(), 'content' => array()))) . "\n";
    }

    /// Modification  2010/11/30, adding custom_canonical url
    
    /// check if meta is present
    if (is_single() || is_page() || $this->is_static_posts_page()) {
      $custom_canonical = trim( get_post_meta($post->ID, "_aioseop_custom_canonical", true) );
    }
    ///
    
    //if ($fvseop_options['aiosp_can'])
    if ($fvseop_options['aiosp_can'] || ( isset( $custom_canonical ) && isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']  ) )
    /// End of modification
    {
      if( (isset($custom_canonical) && $custom_canonical) && (isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']) ) {
        $url = $custom_canonical;
      } else {
        $url = $this->fvseo_mrt_get_url($wp_query);
      }
                      $url = apply_filters('fvseop_canonical_url', $url);
      if ($url)
      { 
        echo '<link rel="canonical" href="' . esc_url($url) . '" />' . "\n";
      }
    }
  }
        
        
  function hatom_microformat_replace() {
      global $fvseop_options;
      
      if( !isset($fvseop_options['fvseo_hentry']) || ( $fvseop_options['fvseo_hentry'] != '1' && strcmp($fvseop_options['fvseo_hentry'],'on') ) )
          ob_start(array($this,'hatom_microformat_callback'));
  }
  
  // From here Wordpress starts to process the request
  
  // Called whenever the page generation is ended
  function hatom_microformat_callback($buffer) {
  
      $new_buffer = preg_replace( '~(class=["\'][^"\']*)hfeed\s?~', '$1', $buffer );
      $new_buffer = preg_replace( '~(class=["\'][^"\']*)vcard\s?~', '$1', $new_buffer );
      return $new_buffer;
  }
        
        
        
  
  function fvseo_mrt_get_url($query)
  {
    global $fvseop_options;

    if ($query->is_404 || $query->is_search)
    {
      return false;
    }

    $haspost = count($query->posts) > 0;
    $has_ut = function_exists('user_trailingslashit');

    if (get_query_var('m'))
    {
      $m = preg_replace('/[^0-9]/', '', get_query_var('m'));
      
      switch (strlen($m))
      {
      case 4:
        $link = get_year_link($m);
        break;
      case 6:
        $link = get_month_link(substr($m, 0, 4), substr($m, 4, 2));
        break;
      case 8:
        $link = get_day_link(substr($m, 0, 4), substr($m, 4, 2), substr($m, 6, 2));
        break;
      default:
        return false;
      }
    }
    elseif (($query->is_single || $query->is_page) && $haspost)
    {
      $post = $query->posts[0];
      $link = get_permalink($post->ID);
      $link = $this->yoast_get_paged($link); 
    }
    elseif ($query->is_author && $haspost)
    {
      $author = get_userdata(get_query_var('author'));

      if ($author === false)
        return false;

      $link = get_author_link(false, $author->ID, $author->user_nicename);
    }
    elseif ($query->is_category && $haspost)
    {
      $link = get_category_link(get_query_var('cat'));
      $link = $this->yoast_get_paged($link);
    }
    elseif ($query->is_tag  && $haspost)
    {
      $tag = get_term_by('slug', get_query_var('tag'), 'post_tag');
      
      if (!empty($tag->term_id))
      {
        $link = get_tag_link($tag->term_id);
      }
      
      $link = $this->yoast_get_paged($link);      
    }
    elseif ($query->is_day && $haspost)
    {
      $link = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
    }
    elseif ($query->is_month && $haspost)
    {
      $link = get_month_link(get_query_var('year'), get_query_var('monthnum'));
    }
    elseif ($query->is_year && $haspost)
    {
      $link = get_year_link(get_query_var('year'));
    }
    elseif ($query->is_home)
    {
      if ((get_option('show_on_front') == 'page') && ($pageid = get_option('page_for_posts')))
      {
        $link = get_permalink($pageid);
        $link = $this->yoast_get_paged($link);
        $link = trailingslashit($link);
      }
      else
      {
        $link = get_option('home');
        $link = $this->yoast_get_paged($link);
        $link = trailingslashit($link);
      }
    }
    else
    {
      return false;
    }
    
    return $link;
  }
  
  function yoast_get_paged($link)
  {
    $page = get_query_var('paged');

    if ($page && $page > 1)
    {
      $link = trailingslashit($link) ."page/". "$page";

      if ($has_ut)
      {
        $link = user_trailingslashit($link, 'paged');
      }
      else
      {
        $link .= '/';
      }
    }

    return $link;
  }
  
  
  function paged_description($description = NULL)
  {
    // the page number if paged
    global $paged;
    global $fvseop_options;
    // simple tagging support
    global $STagging;
 
    if( is_paged() )
    {
      $part = $this->internationalize( $fvseop_options['aiosp_paged_format'] );
 
      if( isset($part) || !empty($part) )
      {
        $part = trim($part);
        $part = str_replace('%page%', $paged, $part);
        $description .= $part;
      }
    }
 
    return $description;
  } 
    

  function get_post_description($post)
  {
    global $fvseop_options;

    $description = trim(stripcslashes($this->internationalize(get_post_meta($post->ID, "_aioseop_description", true))));

    if (!$description)
    {
      /// Addition - condition added
      if(!$fvseop_options['aiosp_dont_use_excerpt']) {
        $description = $this->trim_excerpt_without_filters_full_length($this->internationalize($post->post_excerpt));
      }
      /// End of addition

      if (!$description && $fvseop_options["aiosp_generate_descriptions"])
      {
        $description = $this->trim_excerpt_without_filters($this->internationalize($post->post_content));
      }       
    }

    // "internal whitespace trim"
    $description = preg_replace("/\s\s+/", " ", $description);

    return $description;
  }

  /**
   * Replace the title using regular expressions. If the regular expression fails
   * (probably a backtrack limit error) you need to fix your environment.
   */
  function replace_title($content, $title)
  {
        $title = strip_tags(__($title));
    return preg_replace('/<title>(.*?)<\/title>/ms', '<title>' . esc_html($title) . '</title>', $content, 1);
  }
  
  /** @return The original title as delivered by WP (well, in most cases) */
  function get_original_title()
  {
    global $wp_query;
    global $fvseop_options;
    
    if (!$wp_query)
    {
      return null;  
    }
    
    $post = $wp_query->get_queried_object();
    
    // the_search_query() is not suitable, it cannot just return
    global $s;

    $title = null;
    
    if (is_home())
    {
      $title = get_option('blogname');
    }
    elseif (is_single())
    {
      $title = $this->internationalize( /*wp_title('', false)*/ get_the_title($post->ID) );
    }
    elseif (is_search() && isset($s) && !empty($s))
    {
      if (function_exists('attribute_escape'))
      {
        $search = attribute_escape(stripcslashes($s));
      }
      else
      {
        $search = wp_specialchars(stripcslashes($s), true);
      }
      
      $search = $this->capitalize($search);
      $title = $search;
    }
    elseif (is_category() && !is_feed())
    {
      $category_description = $this->internationalize(category_description());
      $category_name = ucwords($this->internationalize(single_cat_title('', false)));
      $title = $category_name;
    }
    elseif (is_page())
    {
      $title = $this->internationalize( /*wp_title('', false)*/ get_the_title() );
    }
    elseif (function_exists('is_tag') && is_tag())
    {
      $tag = $this->internationalize(wp_title('', false));

      if ($tag)
      {
        $title = $tag;
      }
    }
    else if (is_archive())
    {
      $title = $this->internationalize(wp_title('', false));
    }
    else if (is_404())
    {
      $title_format = stripslashes( $fvseop_options['aiosp_404_title_format'] );

      $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
      $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
      $new_title = str_replace('%request_url%', esc_url($_SERVER['REQUEST_URI']), $new_title);
      $new_title = str_replace('%request_words%', $this->request_as_words(esc_url($_SERVER['REQUEST_URI'])), $new_title);
      
      $title = $new_title;
    }

    return trim($title);
  }
  
  function paged_title($title)
  {
    // the page number if paged
    global $paged;
    global $fvseop_options;
    // simple tagging support
    global $STagging;

    if (is_paged() || (isset($STagging) && $STagging->is_tag_view() && $paged))
    {
      $part = stripslashes( $this->internationalize($fvseop_options['aiosp_paged_format']) );

      if (isset($part) || !empty($part))
      {
        $part = " " . trim($part);
        $part = str_replace('%page%', $paged, $part);
        $title .= $part;
      }
    }

    return $title;
  }
  
  function is_custom_post_type( $post = NULL )
  {
      $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

      // there are no custom post types
      if ( empty ( $all_custom_post_types ) )
          return FALSE;

      $custom_types      = array_keys( $all_custom_post_types );
      $current_post_type = get_post_type( $post );

      // could not detect current type
      if ( ! $current_post_type )
          return FALSE;

      return in_array( $current_post_type, $custom_types );
  }

  function rewrite_title($header)
  {
    global $fvseop_options;
    global $wp_query;
    
    if (!$wp_query)
    {
      return $header; 
    }
    
    $post = $wp_query->get_queried_object();
    
    // the_search_query() is not suitable, it cannot just return
    global $s;
    
    global $STagging;

    //  change homepage title only if there is some in configuration. 
    if (is_home() && !$this->is_static_posts_page() && stripcslashes( $this->internationalize($fvseop_options['aiosp_home_title']) ) != '' /*&& $fvseop_options['aiosp_rewrite_titles']*/)
    {
      $title = stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_title'] ) );
      
      if (empty($title))
      {
        $title = $this->internationalize(get_option('blogname'));
      }

      $title = $this->paged_title($title);
      $header = $this->replace_title($header, $title);
    }
    else if (is_attachment()        && $fvseop_options['aiosp_rewrite_titles'])
    {
      $title = get_the_title($post->post_parent).' '.$post->post_title.' – '.get_option('blogname');
      $header = $this->replace_title($header,$title);
    }
    else if (is_single())
    {
      // we're not in the loop :(
      $authordata = get_userdata($post->post_author);
      $categories = get_the_category();
      $category = '';
      
      if (count($categories) > 0)
      {
        $category = $categories[0]->cat_name;
      }

      $title = $this->internationalize(get_post_meta($post->ID, "_aioseop_title", true));
                        
                        $post_type_obj = get_post_type_object( get_post_type( $post->ID ) );
                        $post_type_name = $post_type_obj->labels->name;
      
      if (!$title)
      {
        $title = $this->internationalize(get_post_meta($post->ID, "title_tag", true));
        
        if (!$title)
        {
          $title = $this->internationalize( /*wp_title('', false)*/ get_the_title() );
        }
      }

                        if( $fvseop_options['aiosp_rewrite_titles'] ) {
                            if( !is_singular( array('post')) )
                                $title_format = stripslashes( $fvseop_options['aiosp_custom_post_title_format'] );
                            else
                                $title_format = stripslashes( $fvseop_options['aiosp_post_title_format'] );
                                
                            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
                            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
                            $new_title = str_replace('%post_title%', $title, $new_title);
                            $new_title = str_replace('%post_type_name%', $post_type_name, $new_title);
                            $new_title = str_replace('%category%', $category, $new_title);
                            $new_title = str_replace('%category_title%', $category, $new_title);
                            $new_title = str_replace('%post_author_login%', $authordata->user_login, $new_title);
                            $new_title = str_replace('%post_author_nicename%', $authordata->user_nicename, $new_title);
                            $new_title = str_replace('%post_author_firstname%', ucwords($authordata->first_name), $new_title);
                            $new_title = str_replace('%post_author_lastname%', ucwords($authordata->last_name), $new_title);
                        }
                        /// Addition
                        else
                            $new_title = $title;
                        
      $title = $new_title;
      $title = trim($title);
      $title = apply_filters('fvseo_title_single',$title);

      $header = $this->replace_title($header, $title);
    }
    elseif (is_search() && isset($s) && !empty($s)      && $fvseop_options['aiosp_rewrite_titles'])
    {
      if (function_exists('attribute_escape'))
      {
        $search = attribute_escape(stripcslashes($s));
      }
      else
      {
        $search = wp_specialchars(stripcslashes($s), true);
      }

      $search = $this->capitalize($search);
      $title_format = stripslashes( $fvseop_options['aiosp_search_title_format'] );

      $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
      $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
      $title = str_replace('%search%', $search, $title);
      
      $header = $this->replace_title($header, $title);
    }
    elseif (is_category() && !is_feed()     && $fvseop_options['aiosp_rewrite_titles'])
    {
      global $cat;
      $category_titles = get_option('aioseop_category_titles');
      
      if( $category_titles !== false && isset($cat) && intval($cat) && isset($category_titles[$cat]) && !empty($category_titles[$cat]) ){
        $title = $category_titles[$cat];
      }
      else{
        $category_description = $this->internationalize(strip_tags(category_description()));
  
        if($fvseop_options['aiosp_cap_cats'])
        {
          $category_name = ucwords($this->internationalize(single_cat_title('', false)));
        }
        else
        {
          $category_name = $this->internationalize(single_cat_title('', false));
        }     
                          
        $title_format = stripslashes( $fvseop_options['aiosp_category_title_format'] );
        $title = str_replace('%category_title%', $category_name, $title_format);
      }
        
      $title = str_replace('%category_description%', $category_description, $title);
      $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title);
      $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
      $title = $this->paged_title($title);
      
      
      $header = $this->replace_title($header, $title);
    }
    /// Modification  2011/01/26  - possibly a bugfix
    elseif (is_page() || $this->is_static_front_page())
    //elseif (is_page() || $this->is_static_posts_page())
    /// End of modification
    {
      // we're not in the loop :(
      $authordata = get_userdata($post->post_author);

      if ($this->is_static_front_page())
      {
        if ( stripcslashes( $this->internationalize($fvseop_options['aiosp_home_title']) ) )
        {
          //home title filter
          $home_title = stripcslashes( $this->internationalize( $fvseop_options['aiosp_home_title'] ) );
          $home_title = apply_filters('fvseop_home_page_title',$home_title);
          
          $header = $this->replace_title($header, $home_title);
        }
      }
      else
      {
        $title = $this->internationalize(get_post_meta($post->ID, "_aioseop_title", true));
        
        if (!$title)
        {
          $title = $this->internationalize( /*wp_title('', false)*/ get_the_title($post->ID) );
        }
                                
                                if( $fvseop_options['aiosp_rewrite_titles'] ) {

                                    $title_format = stripslashes( $fvseop_options['aiosp_page_title_format'] );
    
                                    $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
                                    $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
                                    $new_title = str_replace('%page_title%', $title, $new_title);
                                    $new_title = str_replace('%page_author_login%', $authordata->user_login, $new_title);
                                    $new_title = str_replace('%page_author_nicename%', $authordata->user_nicename, $new_title);
                                    $new_title = str_replace('%page_author_firstname%', ucwords($authordata->first_name), $new_title);
                                    $new_title = str_replace('%page_author_lastname%', ucwords($authordata->last_name), $new_title);
                                
                                }
                                /// Addition
                                else
                                    $new_title = $title;

        $title = trim($new_title);
        $title = apply_filters('fvseop_title_page', $title);

        $header = $this->replace_title($header, $title);
      }
    }
    elseif (function_exists('is_tag') && is_tag()       && $fvseop_options['aiosp_rewrite_titles'])
    {
      $tag = single_term_title( '', false );

      if ($tag)
      {
        $tag = $this->capitalize($tag);
        $title_format = stripslashes( $fvseop_options['aiosp_tag_title_format'] );
              
        $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
        $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
        $title = str_replace('%tag%', $tag, $title);
        $title = $this->paged_title($title);
        
        $header = $this->replace_title($header, $title);
      }
    }
    elseif (isset($STagging) && $STagging->is_tag_view()        && $fvseop_options['aiosp_rewrite_titles']) // simple tagging support
    {
      $tag = $STagging->search_tag;
      
      if ($tag)
      {
        $tag = $this->capitalize($tag);
        $title_format = stripslashes( $fvseop_options['aiosp_tag_title_format'] );

        $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
        $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
        $title = str_replace('%tag%', $tag, $title);
        $title = $this->paged_title($title);

        $header = $this->replace_title($header, $title);
      }
    }
    else if (is_tax() && $fvseop_options['aiosp_rewrite_titles']) {
      $t_sep = ' ';
      $title_format = stripslashes( $fvseop_options['aiosp_custom_taxonomy_title_format'] );
      $term = get_queried_object();
      $tax = get_taxonomy( $term->taxonomy );
      $sCategoryName = $tax->labels->name;
      //$sCategoryTitle = single_term_title($tax->labels->name . $t_sep, false);
      //if ($this->is_custom_post_type()) {
        $sCategoryTitle = single_term_title('', false );
      //}
      $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
      $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
      $new_title = str_replace('%tax_type_title%', $sCategoryName, $new_title);
      $new_title = str_replace('%tax_title%', $sCategoryTitle, $new_title);

      $title = trim($new_title);
      $title = $this->paged_title($title);

      $header = $this->replace_title($header, $title);
    }
    else if (is_archive()       && $fvseop_options['aiosp_rewrite_titles'])
    {
      $title_format = stripslashes( $fvseop_options['aiosp_archive_title_format'] );
      $t_sep = ' ';
      if( is_date() ) {
        //  taken from wp_title()
        global $wp_locale;
        $m = get_query_var('m');
        $year = get_query_var('year');
        $monthnum = get_query_var('monthnum');
        $day = get_query_var('day');
        
        if( !empty($m) ) {
          $my_year = substr($m, 0, 4);
          $my_month = $wp_locale->get_month(substr($m, 4, 2));
          $my_day = intval(substr($m, 6, 2));
          $archive_title = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
        } 
        if( !empty($year) ) {
          $archive_title = $year;
          if ( !empty($monthnum) )
            $archive_title .= $t_sep . $wp_locale->get_month($monthnum);
          if ( !empty($day) )
            $archive_title .= $t_sep . zeroise($day, 2);
        }
      } else if (is_post_type_archive()) {
        $term = get_queried_object();
        $archive_title = $term->labels->name;
      }

      $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
      $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
      $new_title = str_replace('%date%', $archive_title, $new_title);

      $title = trim($new_title);
      $title = $this->paged_title($title);

      $header = $this->replace_title($header, $title);
    }
    else if (is_404()       && $fvseop_options['aiosp_rewrite_titles'])
    {
      $title_format = stripslashes( $fvseop_options['aiosp_404_title_format'] );

      $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
      $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
      $new_title = str_replace('%request_url%', esc_url($_SERVER['REQUEST_URI']), $new_title);
      $new_title = str_replace('%request_words%', $this->request_as_words(esc_url($_SERVER['REQUEST_URI'])), $new_title);
      $new_title = str_replace('%404_title%', $this->internationalize(wp_title('', false)), $new_title);

      $header = $this->replace_title($header, $new_title);
    }
    
    return $header;
  }
  
  /**
   * @return User-readable nice words for a given request.
   */
  function request_as_words($request)
  {
    $request = htmlspecialchars($request);
    $request = str_replace('.html', ' ', $request);
    $request = str_replace('.htm', ' ', $request);
    $request = str_replace('.', ' ', $request);
    $request = str_replace('/', ' ', $request);

    $request_a = explode(' ', $request);
    $request_new = array();

    foreach ($request_a as $token)
    {
      $request_new[] = ucwords(trim($token));
    }

    $request = implode(' ', $request_new);

    return $request;
  }
  
  function trim_excerpt_without_filters($text)
  {
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text);
    $text = strip_tags($text);

    $max = $this->maximum_description_length;

    if ($max < strlen($text))
    {
      while ($text[$max] != ' ' && $max > $this->minimum_description_length)
      {
        $max--;
      }
    }

    $text = substr($text, 0, $max);

    return trim(stripcslashes($text));
  }
  
  function trim_excerpt_without_filters_full_length($text)
  {
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text);
    $text = strip_tags($text);

    return trim(stripcslashes($text));
  }
  
  /**
   * @return comma-separated list of unique keywords
   */
  function get_all_keywords()
  {
    global $posts;
    global $fvseop_options;

    if (is_404())
    {
      return null;
    }
    
    // if we are on synthetic pages
    if (!is_home() && !is_page() && !is_single() &&!$this->is_static_front_page() && !$this->is_static_posts_page()) 
    {
      return null;
    }

    $keywords = array();
    
    if (is_array($posts))
    {
         /// optimalization HACKs by peter
         /// Pre-cache post meta and tags and categories if needed and if WP version permits it
         $aIDs = array();
         foreach( $posts as $objPost ) $aIDs[] = $objPost->ID;

         if( function_exists( 'update_meta_cache' ) ) update_meta_cache( 'post', $aIDs );
         if( ( $fvseop_options['aiosp_use_tags_as_keywords'] || ( $fvseop_options['aiosp_use_categories'] && !is_page() ) )
               && function_exists( 'wp_get_object_terms' )
               && function_exists( 'wp_cache_add' ) )
         {
            $aTax = array();
            if( $fvseop_options['aiosp_use_tags_as_keywords'] ) $aTax[] = 'post_tag';
            if( $fvseop_options['aiosp_use_categories'] && !is_page() ) $aTax[] = 'category';

            $aRawTerms = array();
            if( 0 < count( $aIDs ) && 0 < count( $aTax ) )
               $aRawTerms = wp_get_object_terms( $aIDs, $aTax, array( 'orderby' => 'count', 'order' => 'DESC', 'fields' => 'all_with_object_id' ) );
            $aTags = array();
            $aCats = array();


            foreach( $aRawTerms as $objTerm ){
               if( !isset( $aTags[$objTerm->object_id] ) ) $aTags[$objTerm->object_id] = array();
               if( !isset( $aCats[$objTerm->object_id] ) ) $aCats[$objTerm->object_id] = array();

               if( 'category' == $objTerm->taxonomy ) $aCats[$objTerm->object_id][] = $objTerm;
               if( 'post_tag' == $objTerm->taxonomy ) $aTags[$objTerm->object_id][] = $objTerm;
            }

            if( $fvseop_options['aiosp_use_categories'] && !is_page() )
               foreach( $aCats as $id => $aPostCats )
                  wp_cache_add( $id, $aPostCats, 'category_relationships');
            if( $fvseop_options['aiosp_use_tags_as_keywords'] )
               foreach( $aTags as $id => $aPostTags )
                  wp_cache_add( $id, $aPostTags, 'post_tag_relationships');
         }


      foreach ($posts as $post)
      {
        if ($post)
        {
          // custom field keywords
          $keywords_a = $keywords_i = null;
          $description_a = $description_i = null;

          $id = is_attachment() ? $post->post_parent : $post->ID; // if attachment then use parent post id

          $keywords_i = stripcslashes($this->internationalize(get_post_meta($id, "_aioseop_keywords", true)));
          $keywords_i = str_replace('"', '', $keywords_i);
                  
          if (isset($keywords_i) && !empty($keywords_i))
          {
            $traverse = explode(',', $keywords_i);
                    
            foreach ($traverse as $keyword) 
            {
              $keywords[] = $keyword;
            }
          }
                  
          if ($fvseop_options['aiosp_use_tags_as_keywords'])
          {
            if (function_exists('get_the_tags'))
            {
              $tags = get_the_tags($id);

              if ($tags && is_array($tags))
              {
                foreach ($tags as $tag)
                {
                  $keywords[] = $this->internationalize($tag->name);
                }
              }
            }
          }

          // autometa
          $autometa = stripcslashes(get_post_meta($id, 'autometa', true));

          if (isset($autometa) && !empty($autometa))
          {
            $autometa_array = explode(' ', $autometa);
            
            foreach ($autometa_array as $e) 
            {
              $keywords[] = $e;
            }
          }

          if ($fvseop_options['aiosp_use_categories'] && !is_page())
          {
            $categories = get_the_category($id); 

            foreach ($categories as $category)
            {
              $keywords[] = $this->internationalize($category->cat_name);
            }
          }
        }
      }
    }

    return $this->get_unique_keywords($keywords);
  }

  function get_unique_keywords($keywords)
  {
    $small_keywords = array();
    
    foreach ($keywords as $word)
    {
      if (function_exists('mb_strtolower'))     
        $small_keywords[] = mb_strtolower($word, get_bloginfo('charset'));
      else 
        $small_keywords[] = $this->strtolower($word);
    }
    
    $keywords_ar = array_unique($small_keywords);
    
    return implode(',', $keywords_ar);
  }

  /** crude approximization of whether current user is an admin */
  function is_admin()
  {
    return current_user_can('level_8');
  }

  function post_meta_tags($id)
  {
    if( isset( $_POST['fvseo_edit'] ) ) {
      $awmp_edit = $_POST['fvseo_edit'];
    }
    if( isset( $_POST['nonce-fvseopedit'] ) ) {
      $nonce = $_POST['nonce-fvseopedit'];
    }

    if (isset($awmp_edit) && !empty($awmp_edit) && wp_verify_nonce($nonce, 'edit-fvseopnonce'))
    {
      $keywords = isset( $_POST["fvseo_keywords"] ) ? $_POST["fvseo_keywords"] : NULL;
      if (function_exists('qtrans_getSortedLanguages')) {        
        $languages = qtrans_getSortedLanguages();          
        $title = '';
        foreach($languages as $language) {
          if ($_POST['fvseo_title_' . $language] != '') {
            $title .= '<!--:' . $language . '-->' . $_POST['fvseo_title_' . $language] . '<!--:-->';
          }
        }                                                  
        $description = '';
        foreach($languages as $language) {
          if ($_POST['fvseo_description_' . $language] != '')  {
            $description .= '<!--:' . $language . '-->' . $_POST['fvseo_description_' . $language] . '<!--:-->';
          }
        }                    
      }
      else {        
        $description = ( isset( $_POST["fvseo_description"] ) && $_POST["fvseo_description"] != 'Using post excerpt, type your SEO meta description here.' ) ? $_POST["fvseo_description"] : NULL;
        $title = isset( $_POST["fvseo_title"] ) ? $_POST["fvseo_title"] : NULL;
      }
      $fvseo_meta = isset( $_POST["fvseo_meta"] ) ? trim($_POST["fvseo_meta"]) : NULL;
      $fvseo_disable = isset( $_POST["fvseo_disable"] ) ? $_POST["fvseo_disable"] : NULL;
      $fvseo_titleatr = isset( $_POST["fvseo_titleatr"] ) ? trim($_POST["fvseo_titleatr"]) : NULL;
      $fvseo_menulabel = isset( $_POST["fvseo_menulabel"] ) ? trim($_POST["fvseo_menulabel"]) : NULL;
      $fvseo_event_date = isset( $_POST["fvseo_event_date"] ) ? $_POST["fvseo_event_date"] : NULL;
      $custom_canonical = isset( $_POST["fvseo_custom_canonical"] ) ? trim($_POST["fvseo_custom_canonical"]) : NULL;  
      $noindex = isset( $_POST["fvseo_noindex"] ) ? true : false;       
      $nofollow = isset( $_POST["fvseo_nofollow"] ) ? true : false;             
        
      delete_post_meta($id, '_aioseop_keywords');
      delete_post_meta($id, '_aioseop_description');
      delete_post_meta($id, '_aioseop_title');
      delete_post_meta($id, '_aioseop_titleatr');
      delete_post_meta($id, '_aioseop_menulabel');
      delete_post_meta($id, '_aioseop_custom_canonical');   
      delete_post_meta($id, '_aioseop_noindex');    
      delete_post_meta($id, '_aioseop_nofollow');         
    
      if ($this->is_admin())
      {
        delete_post_meta($id, '_aioseop_disable');
      }

      if (isset($keywords) && !empty($keywords))
      {
        add_post_meta($id, '_aioseop_keywords', $keywords);
      }

      if (isset($description) && !empty($description))
      {
        add_post_meta($id, '_aioseop_description', $description);
      }

      if (isset($title) && !empty($title) && $title != get_the_title( $id ) )
      {
        add_post_meta($id, '_aioseop_title', $title);
      }
        
      if (isset($fvseo_titleatr) && !empty($fvseo_titleatr))
      {
        add_post_meta($id, '_aioseop_titleatr', $fvseo_titleatr);
      }

      if (isset($fvseo_menulabel) && !empty($fvseo_menulabel))
      {
        add_post_meta($id, '_aioseop_menulabel', $fvseo_menulabel);
      }
      
      if( isset($fvseo_event_date) ) {
        update_post_meta($id, '_fv_event_date', $fvseo_event_date);
      }             

      if (isset($fvseo_disable) && !empty($fvseo_disable) && $this->is_admin())
      {
        add_post_meta($id, '_aioseop_disable', $fvseo_disable);
      }

      if (isset($custom_canonical) && !empty($custom_canonical))
      {
        add_post_meta($id, '_aioseop_custom_canonical', str_replace(" ","%20", $custom_canonical ) );
      }     
      if (isset($noindex) && !empty($noindex))
      {
        add_post_meta($id, '_aioseop_noindex', true );
      }   
      if (isset($nofollow) && !empty($nofollow))
      {
        add_post_meta($id, '_aioseop_nofollow', true );
      }         
    }
  }

  /**
   * Defines the sub-menu admin page using the add_submenu_page function.
   */
  function admin_menu()
  {
    add_submenu_page('options-general.php', __('FV Simpler SEO', 'fv_seo'), __('FV Simpler SEO', 'fv_seo'), 'manage_options', $this->plugin_slug, array($this, 'options_panel'));
  }
  
  
  function admin_settings_basic() {
    global $fvseop_options;
  ?>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_title_tip');">
          <?php _e('Home Title:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="fvseo_home_title" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_title']))?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_title_tip">
          <?php _e('As the name implies, this will be the title of your homepage. This is independent of any other option. If not set, the default blog title will get used.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_description_tip');">
          <?php _e('Home Description:', 'fv_seo')?>
        </a><br />
        <textarea cols="57" rows="2" name="fvseo_home_description"><?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_description']))?></textarea>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_description_tip">
          <?php _e('The META description for your homepage. Independent of any other options, the default is no META description at all if this is not set.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_keywords_tip');">
          <?php _e('Home Keywords (comma separated):', 'fv_seo')?>
        </a><br />
        <textarea cols="57" rows="2" name="fvseo_home_keywords"><?php echo esc_attr(stripcslashes($fvseop_options['aiosp_home_keywords'])); ?></textarea>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_keywords_tip">
          <?php _e("A comma separated list of your most important keywords for your site that will be written as META keywords on your homepage. Don't stuff everything in here.", 'fv_seo')?>
        </div>
    </p>
    <p>
       <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_warnings_tip');">
          <?php _e('Warn me when publishing without a title or description:', 'fv_seo')?>
       </a>
  
       <label for="fvseo_publ_warnings">&nbsp;&nbsp;</label>            
       <input type="checkbox" name="fvseo_publ_warnings" id="fvseo_publ_warnings" <?php if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) echo 'checked="yes"'; ?> value="1">
       <label for="fvseo_publ_warnings">&nbsp;&nbsp;</label>
  
       <div style="max-width:500px; text-align:left; display:none" id="fvseo_warnings_tip">
          <?php _e("Uncheck this if you don't want to be warned in case you are publishing without a title or description. Default: checked.", 'fv_seo')?>
       </div>
    </p>  
  <?php
  }
  
  
  function admin_settings_calendar() {
    global $fvseop_options;
  ?>
    <p>
       <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_events_tip');">
          <?php _e('Enable Events functionality:', 'fv_seo')?>
       </a>
            
       <input type="checkbox" name="fvseo_events" id="fvseo_events" <?php if ( $fvseop_options['fvseo_events'] == 1 ) echo 'checked="yes"'; ?> value="1">
  
       <div style="max-width:500px; text-align:left; display:none" id="fvseo_events_tip">
          <?php _e("Check this and an event date field will appear in FV Simpler SEO box. Then use query args like <code>array( 'fv_events_start' => '2013-12-12 12:12:12', 'fv_events_end' => '2013-12-13 13:13:13' )</code> in your WP_Query.", 'fv_seo')?>
       </div>
    </p>  
  <?php
  }
  
  function admin_settings_print_import( $name_of_plugin, $title_meta, $description_meta ){
    global $wpdb;
    
    $titles = $wpdb->get_var(
      "SELECT count(*) FROM {$wpdb->postmeta}
      WHERE meta_key = '$title_meta'
      AND post_id NOT IN ( SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_aioseop_title' )"
    );
    $metadesc = $wpdb->get_var(
      "SELECT count(*) FROM {$wpdb->postmeta}
      WHERE meta_key = '$description_meta'
      AND post_id NOT IN ( SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_aioseop_description' )"
    );
    $import_sum = $metadesc + $titles;
    
    if( $import_sum ){
      ?>
        <p>
          <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_import_tip');">
              <?php echo $name_of_plugin.' - <strong>'. $import_sum . '</strong>', _e(' SEO fields (post titles and descriptions) can be imported!', 'fv_seo'); ?>
          </a>
          <br/>
          <br/>
          <input class="button" type="submit" name="fvseo_import_desc_<?php echo sanitize_title($name_of_plugin); ?>" value="Import" />
        </p>  
      <?php
    
      return true;
    }
  
    return false;
  }
  
  
  function admin_settings_import(){
    $yoast_import = $this->admin_settings_print_import("WordPress SEO by Yoast","_yoast_wpseo_title","_yoast_wpseo_metadesc");
    $genesis_import = $this->admin_settings_print_import("Genesis SEO","_genesis_title","_genesis_description");
  
    if( !$yoast_import && !$genesis_import ){
    ?>
      <p>
            <?php _e('Nothing to import.', 'fv_seo'); ?>
      </p>
    <?php
    }
  }
  
  
  function admin_settings_interface() {
    global $fvseop_options;
  ?>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_keywords_tip');">
        <?php _e('Add keywords field to post editing screen:', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_keywords" <?php if ($fvseop_options['aiosp_show_keywords']) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_keywords_tip">
        <?php
        _e("You don't need this field at all if you are using tags properly. It makes the FV Simpler SEO box in the editing screen more complicated too.", 'fv_seo');
         ?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_noindex_tip');">
        <?php _e('Add no index checkbox to post editing screen:', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_noindex" <?php if( isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex'] ) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_noindex_tip">
        <?php
        _e("Adds a powerful checkbox to post editing screens which let's you exclude the post from search engine indexing. <strong>Warning:</strong> only use if you really know what you are doing.", 'fv_seo');
         ?>
        </div>
    </p>                              
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_custom_canonical_tip');">
        <?php _e('Experimental - Use Custom Canonical URL field:', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_custom_canonical" <?php if( isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical'] ) echo "checked=\"1\""; ?>/>
        <script type="text/javascript">
        jQuery("input[name='fvseo_show_custom_canonical']").change( function() {
          if( jQuery(this).is(':checked') ) {
            if (confirm(" <?php _e('Are you sure you want to turn on this feature? Using wrong custom canonical URLs can damage your site SEO rankings.\n\n If you are not sure, then leave this off and Wordpress will take care of it on its own.', 'fv_seo'); ?> ")) {
            } else {
              jQuery(this).removeAttr('checked');
            }
          }
        });
        </script>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_custom_canonical_tip">
        <?php
        _e("Use this feature only if you are sure you want to enter custom canonical URLs. This is not affected by the \"Canonical URLs\" Advanced Option (bellow).", 'fv_seo');
         ?>
        </div>
    </p>                              
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_titleattribute_tip');">
        <?php _e('Add Title Attribute field to page editing screen (deprecated):', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_titleattribute" <?php if ($fvseop_options['aiosp_show_titleattribute']) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_titleattribute_tip">
        <?php
        _e("Allows you to set the anchor title for pages in menus. You don't need this field at all because post title or Long Title will be used instead.", 'fv_seo');
         ?>
        </div>
    </p>    
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_short_title_post_tip');">
        <?php _e('Add Short Title Attribute field to post editing screen:', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_short_title_post" <?php if( isset($fvseop_options['aiosp_show_short_title_post']) && $fvseop_options['aiosp_show_short_title_post'] ) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_short_title_post_tip">
        <?php
        _e("Stored as _aioseop_menulabel postmeta.", 'fv_seo');
         ?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_sidebar_short_title_tip');">
        <?php _e('Enable using short titles in sidebars:', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_sidebar_short_title" <?php if( isset($fvseop_options['aiosp_sidebar_short_title']) && $fvseop_options['aiosp_sidebar_short_title'] ) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_sidebar_short_title_tip">
        <?php
        _e("Use short titles instead on sidebar post titles. Add Short Title Attribute field to post editing screen option have to be enabled", 'fv_seo');
         ?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_show_disable_tip');">
        <?php _e('Add "Disable on this post/page" checkbox to post editing screen (deprecated):', 'fv_seo')?>
        </a>
        <input type="checkbox" name="fvseo_show_disable" <?php if ($fvseop_options['aiosp_show_disable']) echo "checked=\"1\""; ?>/>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_show_disable_tip">
        <?php
        _e("Let's you disable the plugin for a specific post or page.", 'fv_seo');
         ?>
        </div>
    </p>  
  <?php
  }
  
  
  function admin_settings_advanced() {
    global $fvseop_options;
  ?>
            <p>
               <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_shorten_slugs');">
                  <?php _e('Shorten Page URL / Post Slug:', 'fv_seo')?>
               </a>
               <input type="checkbox" name="fvseo_shorten_slugs" <?php if( isset($fvseop_options['aiosp_shorten_slugs']) && $fvseop_options['aiosp_shorten_slugs'] ) echo 'checked="checked"'; ?>/>
               <div style="max-width:500px; text-align:left; display:none" id="fvseo_shorten_slugs">
                  <?php _e("This option will automatically shorten the page URL or post slug on first save to the three longest words to avoid accidentally posting really long URLs. You can put in a handwritten URL later which will not change.", 'fv_seo')?>
               </div>
            </p>  
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_can_tip');">
                  <?php _e('Canonical URLs:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_can" <?php if ($fvseop_options['aiosp_can']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_can_tip">
                  <?php _e("This option will automatically generate Canonical URLS for your entire WordPress installation.  This will help to prevent duplicate content penalties by <a href='http://googlewebmastercentral.blogspot.com/2009/02/specify-your-canonical.html' target='_blank'>Google</a>.", 'fv_seo')?>
                </div>
            </p>
            <p id="fvseo_attachments">
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_attachments_tip');">
                  <?php _e('Redirect attachment links to the file URLs:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_attachments" <?php if ($fvseop_options['fvseo_attachments']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_attachments_tip">
                  <?php _e("Get rid of /?attachment_id={attachment_id} and /year/month/post-name/attachment-name kind of pages. Creates 301 redirections and replaces such links in content. Recommended.", 'fv_seo')?>
                </div>
            </p>                 
            <p id="fvseo_shortlinks">
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_shortlinks_tip');">
                  <?php _e('Enable shortlinks in header:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_shortlinks" <?php if ($fvseop_options['fvseo_shortlinks']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_shortlinks_tip">
                  <?php _e("We don't recommend using the Wordpress <a href='http://microformats.org/wiki/rel-shortlink'>shortlinks</a> as they are bit against the concept of permalinks where the link doesn't change. Shortlinks can change as they are using post ID, so then you loose the link to your blog. Twitter has its own link shortening service.", 'fv_seo')?>
                </div>
            </p>
            <p id="fvseo_hentry">
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_hentry_tip');">
                  <?php _e('Enable hAtom microformat classes:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_hentry" <?php if ($fvseop_options['fvseo_hentry']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_hentry_tip">
                  <?php _e("hAtom is a microformat declaration which makes sure Google reads your post tags better, but we turn it off by default to keep the site structured data clean - only add what you really need. We removed hfeed, hentry and vcard classes. We also strip rel=\"cateogry tag\" from category links.", 'fv_seo')?>
                </div>
            </p>             
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_rewrite_titles_tip');">
                  <?php _e('Rewrite Titles:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_rewrite_titles" <?php if ($fvseop_options['aiosp_rewrite_titles']) echo 'checked="checked"'; ?> onclick="toggleVisibility('fvseo_rewrite_titles_options');" /> <abbr title="Not required for most modern templates. Enable to see more options.">(?)</a>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_rewrite_titles_tip">
                  <?php _e("Note that this is all about the title tag. This is what you see in your browser's window title bar. This is NOT visible on a page, only in the window title bar and of course in the source. If set, all page, post, category, search and archive page titles get rewritten. You can specify the format for most of them. For example: The default templates puts the title tag of posts like this: Blog Archive >> Blog Name >> Post Title (maybe I've overdone slightly). This is far from optimal. With the default post title format, Rewrite Title rewrites this to Post Title | Blog Name. If you have manually defined a title (in one of the text fields for All in One SEO Plugin input) this will become the title of your post in the format string.", 'fv_seo')?>
                </div>
            </p>
            
            <div style="width: 470px; background: #f0f0f0; padding: 10px; margin-left: 20px; text-align:left; display:<?php if ($fvseop_options['aiosp_rewrite_titles']) echo 'block'; else echo 'none'; ?>" id="fvseo_rewrite_titles_options">
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_post_title_format_tip');">
                        <?php _e('Post Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_post_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_post_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_post_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%post_title% - The original title of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_title% - The (main) category of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category% - Alias for %category_title%', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_login% - This post's author' login", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_nicename% - This post's author' nicename", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_firstname% - This post's author' first name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_lastname% - This post's author' last name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_custom_post_title_format');">
                        <?php _e('Custom Post Type Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_custom_post_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_custom_post_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_custom_post_title_format">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%post_title% - The original title of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%post_type_name% - The name of custom post type', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_title% - The (main) category of the post', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category% - Alias for %category_title%', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_login% - This post's author' login", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_nicename% - This post's author' nicename", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_firstname% - This post's author' first name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%post_author_lastname% - This post's author' last name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_page_title_format_tip');">
                      <?php _e('Page Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_page_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_page_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_page_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%page_title% - The original title of the page', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_login% - This page's author' login", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_nicename% - This page's author' nicename", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_firstname% - This page's author' first name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('<li>'); _e("%page_author_lastname% - This page's author' last name (capitalized)", 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_category_title_format_tip');">
                      <?php _e('Category Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_category_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_category_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_category_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_title% - The original title of the category', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%category_description% - The description of the category', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_archive_title_format_tip');">
                      <?php _e('Archive Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_archive_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_archive_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_archive_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%date% - The original archive title given by wordpress, e.g. "2007" or "2007 August"', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_tag_title_format_tip');">
                      <?php _e('Tag Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_tag_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_tag_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_tag_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tag% - The name of the tag', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_custom_taxonomy_title_format_tip');">
                      <?php _e('Custom taxonomy Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_custom_taxonomy_title_format" value="<?php if (isset($fvseop_options['aiosp_custom_taxonomy_title_format'])) echo esc_attr(stripcslashes($fvseop_options['aiosp_custom_taxonomy_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_custom_taxonomy_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tax_title% - Your actual taxonomy category title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%tax_type_title% - Your taxonomy title', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>          
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_search_title_format_tip');">
                      <?php _e('Search Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_search_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_search_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_search_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%search% - What was searched for', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>   
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_description_format_tip');">
                      <?php _e('Description Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_description_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_description_format'])); ?>" />
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_description_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%description% - The original description as determined by the plugin, e.g. the excerpt if one is set or an auto-generated one if that option is set', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%wp_title% - The original wordpress title, e.g. post_title for posts', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%page% - Page number for paged category archives', 'fv_seo'); echo('</li>');                        
                        echo('</ul>');
                        ?>
                    </div>
                </p>    
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_404_title_format_tip');">
                      <?php _e('404 Title Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_404_title_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_404_title_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_404_title_format_tip">
                        <?php
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%blog_title% - Your blog title', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%blog_description% - Your blog description', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%request_url% - The original URL path, like "/url-that-does-not-exist/"', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%request_words% - The URL path in human readable form, like "Url That Does Not Exist"', 'fv_seo'); echo('</li>');
                        echo('<li>'); _e('%404_title% - Additional 404 title input"', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
                <p>
                    <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_paged_format_tip');">
                      <?php _e('Paged Format:', 'fv_seo')?>
                    </a><br />
                    <input size="59" style="width: 100%;" name="fvseo_paged_format" value="<?php echo esc_attr(stripcslashes($fvseop_options['aiosp_paged_format'])); ?>"/>
                    <div style="max-width:500px; text-align:left; display:none" id="fvseo_paged_format_tip">
                        <?php
                        _e('This string gets appended/prepended to titles when they are for paged index pages (like home or archive pages).', 'fv_seo');
                        _e('The following macros are supported:', 'fv_seo');
                        echo('<ul>');
                        echo('<li>'); _e('%page% - The page number', 'fv_seo'); echo('</li>');
                        echo('</ul>');
                        ?>
                    </div>
                </p>
            </div>

            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_use_categories_tip');">
                  <?php _e('Use Categories for META keywords:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_use_categories" <?php if ($fvseop_options['aiosp_use_categories']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_use_categories_tip">
                  <?php _e('Check this if you want your categories for a given post used as the META keywords for this post (in addition to any keywords and tags you specify on the post edit page).', 'fv_seo')?>
                </div>
            </p>

            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_use_tags_as_keywords_tip');">
                  <?php _e('Use Tags for META keywords:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_use_tags_as_keywords" <?php if ($fvseop_options['aiosp_use_tags_as_keywords']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_use_tags_as_keywords_tip">
                  <?php _e('Check this if you want your tags for a given post used as the META keywords for this post (in addition to any keywords you specify on the post edit page).', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_dynamic_postspage_keywords_tip');">
                  <?php _e('Dynamically Generate Keywords for Posts Page:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_dynamic_postspage_keywords" <?php if ($fvseop_options['aiosp_dynamic_postspage_keywords']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_dynamic_postspage_keywords_tip">
                  <?php _e('Check this if you want your keywords on a custom posts page (set it in options->reading) to be dynamically generated from the keywords of the posts showing on that page.  If unchecked, it will use the keywords set in the edit page screen for the posts page.', 'fv_seo') ?>
                </div>
            </p>          
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_remove_category_rel_tip');">
                  <?php _e('Remove Category rel attribute for validation:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_remove_category_rel" <?php if ($fvseop_options['aiosp_remove_category_rel']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_remove_category_rel_tip">
                  <?php _e('Check this if you want to remove attribute rel from links to categories. Useful for validation.', 'fv_seo') ?>
                </div>
            </p>            
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_category_noindex_tip');">
                  <?php _e('Use noindex for Categories:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_category_noindex" <?php if ($fvseop_options['aiosp_category_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_category_noindex_tip">
                  <?php _e('Check this for excluding category pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_archive_noindex_tip');">
                  <?php _e('Use noindex for Archives:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_archive_noindex" <?php if ($fvseop_options['aiosp_archive_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_archive_noindex_tip">
                  <?php _e('Check this for excluding archive pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_tags_noindex_tip');">
                  <?php _e('Use noindex for Tag Archives:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_tags_noindex" <?php if ($fvseop_options['aiosp_tags_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_tags_noindex_tip">
                  <?php _e('Check this for excluding tag pages from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_search_noindex_tip');">
                  <?php _e('Use noindex for Search Results:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_search_noindex" <?php if ($fvseop_options['aiosp_search_noindex']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_search_noindex_tip">
                  <?php _e('Check this for excluding search results from being crawled. Useful for avoiding duplicate content.', 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_generate_descriptions_tip');">
                  <?php _e('Autogenerate Descriptions:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_generate_descriptions" <?php if ($fvseop_options['aiosp_generate_descriptions']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_generate_descriptions_tip">
                  <?php _e("Check this and your META descriptions will get autogenerated if there's no excerpt.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_cap_cats_tip');">
                  <?php _e('Capitalize Category Titles:', 'fv_seo')?>
                </a>
                <input type="checkbox" name="fvseo_cap_cats" <?php if ($fvseop_options['aiosp_cap_cats']) echo 'checked="checked"'; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_cap_cats_tip">
                  <?php _e("Check this and Category Titles will have the first letter of each word capitalized.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_ex_pages_tip');">
                  <?php _e('Exclude Pages:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_ex_pages"><?php if( isset( $fvseop_options['aiosp_ex_pages'] ) ) echo esc_attr(stripcslashes($fvseop_options['aiosp_ex_pages']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_ex_pages_tip">
                  <?php _e("Enter any comma separated pages here to be excluded by All in One SEO Pack.  This is helpful when using plugins which generate their own non-WordPress dynamic pages.  Ex: <em>/forum/,/contact/</em>  For instance, if you want to exclude the virtual pages generated by a forum plugin, all you have to do is give forum or /forum or /forum/ or and any URL with the word \"forum\" in it, such as http://mysite.com/forum or http://mysite.com/forum/someforumpage will be excluded from FV Simpler SEO.", 'fv_seo')?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_post_meta_tags_tip');">
                  <?php _e('Additional Post Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_post_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_post_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_post_meta_tags_tip">
                  <?php
                  _e('What you enter here will be copied verbatim to your header on post pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
                  echo '<br/>';
                  _e('NOTE: This field currently only support meta tags.', 'fv_seo');
                  ?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_page_meta_tags_tip');">
                  <?php _e('Additional Page Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_page_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_page_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_page_meta_tags_tip">
                  <?php
                  _e('What you enter here will be copied verbatim to your header on pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
                  echo '<br/>';
                  _e('NOTE: This field currently only support meta tags.', 'fv_seo');
                  ?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_meta_tags_tip');">
                  <?php _e('Additional Home Headers:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="2" name="fvseo_home_meta_tags"><?php echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_meta_tags']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_meta_tags_tip">
                  <?php
                  _e('What you enter here will be copied verbatim to your header on the home page. You can enter whatever additional headers you want here, even references to stylesheets.', 'fv_seo');
                  echo '<br/>';
                  _e('NOTE: This field currently only support meta tags.', 'fv_seo');
                  ?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_google_site_verification_meta_tag_tip');">
                  <?php _e('Google Verification Meta Tag:', 'fv_seo')?>
                </a> <abbr title="We recommend you to use a single file instead for Google verification">(?)</abbr><br />
                <textarea cols="57" rows="1" name="fvseo_home_google_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_google_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_google_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_google_site_verification_meta_tag_tip">
                  <?php
                  _e('What you enter here will be copied verbatim to your header on the home page. Webmaster Tools provides the meta tag in XHTML syntax.', 'fv_seo');
                  echo('<br/>');
                  echo('1. '); _e('On the Webmaster Tools Home page, click Verify this site next to the site you want.', 'fv_seo');
                  echo('<br/>');
                  echo('2. '); _e('In the Verification method list, select Meta tag, and follow the steps on your screen.', 'fv_seo');
                  echo('<br/>');
                  _e('Once you have added the tag to your home page, click Verify.', 'fv_seo');
                  ?>
                </div>
            </p>         
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_yahoo_site_verification_meta_tag');">
                  <?php _e('Yahoo Verification Meta Tag:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="1" name="fvseo_home_yahoo_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_yahoo_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_yahoo_site_verification_meta_tag">
                  <?php _e('Put your Yahoo site verification tag for your homepage here.', 'fv_seo'); ?>
                </div>
            </p>        
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_home_bing_site_verification_meta_tag');">
                  <?php _e('Bing Verification Meta Tag:', 'fv_seo')?>
                </a><br />
                <textarea cols="57" rows="1" name="fvseo_home_bing_site_verification_meta_tag"><?php if( isset( $fvseop_options['aiosp_home_bing_site_verification_meta_tag'] ) ) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_home_bing_site_verification_meta_tag']))?></textarea>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_home_bing_site_verification_meta_tag">
                  <?php _e('Put your Bing site verification tag for your homepage here.', 'fv_seo'); ?>
                </div>
            </p>
            <p>
                <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_dont_use_excerpt_tip');">
                <?php _e('Turn off excerpts for descriptions:', 'fv_seo')?>
                </a>
            
                <input type="checkbox" name="fvseo_dont_use_excerpt" <?php if ($fvseop_options['aiosp_dont_use_excerpt']) echo "checked=\"1\""; ?>/>
                <div style="max-width:500px; text-align:left; display:none" id="fvseo_dont_use_excerpt_tip">
                  <?php _e("Since Typepad export is containing auto generated excerpts for the most of the time we use this option a lot.", 'fv_seo'); ?>
                </div>
            </p>  
  <?php
  }
  
  
  function admin_settings_tracking_codes(){
    global $fvseop_options;
    
  ?>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_custom_header_tip');">
          <?php _e('Header tracking code:', 'fv_seo')?>
        </a><br />
        <textarea cols="57" rows="1" name="fvseo_custom_header"><?php if (isset($fvseop_options['aiosp_custom_header'])) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_custom_header']))?></textarea>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_custom_header_tip">
          <?php _e('Insert any tracking code which should be in the &lt;head&gt; section of the site.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_custom_footer_tip');">
          <?php _e('Footer tracking code:', 'fv_seo')?>
        </a><br />
        <textarea cols="57" rows="1" name="fvseo_custom_footer"><?php if (isset($fvseop_options['aiosp_custom_footer'])) echo htmlspecialchars(stripcslashes($fvseop_options['aiosp_custom_footer']))?></textarea>
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_custom_footer_tip">
          <?php _e('Insert any tracking code which should be right before the closing &lt;/body&gt; tag on the site.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_ganalytics_tip');">
          <?php _e('Google Analytics ID:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="fvseo_ganalytics_ID" value="<?php if (isset($fvseop_options['aiosp_ganalytics_ID'])) echo esc_attr(stripcslashes($fvseop_options['aiosp_ganalytics_ID']))?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_ganalytics_tip">
          <?php _e('Enter your google analytics ID. Example: UA-12345678-9', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_statcounter_tip');">
          <?php _e('Statcounter Project ID and Security ID:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="fvseo_statcounter_project" placeholder="sc_project" value="<?php if (isset($fvseop_options['aiosp_statcounter_project'])) echo esc_attr(stripcslashes($fvseop_options['aiosp_statcounter_project']))?>" />
        <input type="text" class="regular-text" size="63" name="fvseo_statcounter_security" placeholder="sc_security" value="<?php if (isset($fvseop_options['aiosp_statcounter_security'])) echo esc_attr(stripcslashes($fvseop_options['aiosp_statcounter_security']))?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_statcounter_tip">
          <?php _e('Enter your project ID and security ID. You can obtain them from Statcounter administation > Project > Reinstall Code > Default Guide. Look for <i>sc_project</i> and <i>sc_security</i> variables in code.', 'fv_seo')?>
        </div>
    </p>
  <?php
  }
  
        
  function admin_settings_sitemap(){
            
      if ( !is_plugin_active( 'xml-sitemap-feed/xml-sitemap.php' ) ) {
        echo '<p>Would you like to add Google XML Sitemap and Google News Sitemap? We recommend <a href="'.admin_url().'plugin-install.php?tab=search&type=term&s=%22XML+Sitemaps+%26+Google+News+feed%22&plugin-search-input=Search+Plugins">XML Sitemaps & Google News feed</a> plugin.</p>';
      }
      else{
        global $fvseop_options;
        
        $categories = get_categories();
        $users =  get_users( array( 'who' => 'authors' ) );
        $sitemap_option = get_option('xmlsf_sitemaps');
        
        $xml_sitemap = ( $sitemap_option === FALSE || ( isset( $sitemap_option['sitemap'] ) && !empty( $sitemap_option['sitemap'] ) ) ) ? true : false;
        $news_sitemap = ( $sitemap_option !== FALSE && isset( $sitemap_option['sitemap-news'] ) && !empty( $sitemap_option['sitemap-news'] ) ) ? true : false;
        // $xml_sitemap is TRUE if plugin is on and there are no option xmlsf_sitemaps - this happens if plugin is activated without settings, it is default value
        
        if( $xml_sitemap )
            echo '<input type="hidden" name="xml_sitemap" value=1>';
        if( $news_sitemap )
            echo '<input type="hidden" name="news_sitemap" value=1>';
        ?>
            <p> <?php _e("To customize more sitemap preferences (post types included) visit your <a href=\"".admin_url()."options-reading.php\">Reading Settings</a>.", 'fv_seo'); ?></p>
        <?php
        if( ( $xml_sitemap || $news_sitemap ) ){
        ?>
      
          <p id="fvseo_sitemap_exclude_tip" style="display:none"> <?php _e("You can include almost anything in a <strong>Google Sitemap</strong>. We are excluding your \"noindex\" posts and pages already. If you would like to exclude any other categories or authors, now is your change.", 'fv_seo'); ?></p>
          <p id="fvseo_sitemap_news_include_tip" style="display:none"><?php _e("<strong>Google News</strong> has scrict requirements (\"Journalistic standards: Original reporting and honest attribution are longstanding journalistic values. If your site publishes aggregated content, you will need to separate it from your original work, or restrict our access to those aggregated articles.\" -- <a target=\"_blank\" href=\"https://support.google.com/news/publisher/answer/40787?hl=en\">https://support.google.com/news/publisher/answer/40787?hl=en</a>). Please decide what you would like to include in your Google News Sitemap.", 'fv_seo'); ?></p>
              
          <table id="sitemap_table">
          <tr valign="top" class="head">
              <td><br/><u><?php _e("Category name", 'fv_seo'); ?></u></td>
        <?php   if( $xml_sitemap ){ ?>
            <td scope="row"><a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_sitemap_exclude_tip','fvseo_sitemap_news_include_tip');"><?php _e("Exclude<br />from Sitemap:", 'fv_seo'); ?></a></td>
        <?php   }
                if( $news_sitemap ){ ?>
            <td scope="row"><a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_sitemap_news_include_tip','fvseo_sitemap_exclude_tip');"><?php _e("Include in<br />News Sitemap:", 'fv_seo'); ?></a></td>
        <?php   } ?>
          </tr>
          <?php
              foreach( $categories as $category ){
                  echo '<tr valign="top">' . "\n";
                  
                  echo '<td>'.$category->cat_name.'</td>'. "\n";
                  
                  if( $xml_sitemap ){
                      echo '<td align="center"><input type="checkbox" name="sitemap_exclude[]" value="'.$category->term_id.'" ';
                      if( isset( $fvseop_options['sitemap_exclude'] ) && in_array( $category->term_id, $fvseop_options['sitemap_exclude'] ) ) echo 'checked="1"';
                      echo '></td>'. "\n";
                  }
                  
                  if( $news_sitemap ){
                      echo '<td align="center"><input type="checkbox" name="sitemap_news_include[]" value="'.$category->term_id.'" ';
                      if( isset( $fvseop_options['sitemap_news_include'] ) && in_array( $category->term_id, $fvseop_options['sitemap_news_include'] ) ) echo 'checked="1"';
                      echo '></td>'. "\n";
                  }
                      
                  echo '</tr>'. "\n";
              }
            ?>
          </table>
          
          <table id="sitemap_table_authors">
          <tr valign="top" class="head">
              <td><br/><u><?php _e("Author", 'fv_seo'); ?></p></u></td>
              <?php   if( $xml_sitemap ){ ?>
                      <td scope="row"><a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_sitemap_exclude_tip','fvseo_sitemap_news_include_tip');"><?php _e("Exclude<br />from Sitemap:", 'fv_seo'); ?></p></a></td>
              <?php   }
                      if( $news_sitemap ){ ?>
                      <td scope="row"><a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_sitemap_news_include_tip','fvseo_sitemap_exclude_tip');"><?php _e("Include in<br />News Sitemap:", 'fv_seo'); ?></p></a></td>
              <?php   } ?>
          </tr>
          <?php
              foreach( $users as $user ){
                  echo '<tr valign="top">' . "\n";
                  
                      echo '<td>'.$user->data->user_nicename.'</td>'. "\n";
                      if( $xml_sitemap ){
                          echo '<td align="center"><input type="checkbox" name="sitemap_exclude_author[]" value="'.$user->data->ID.'" ';
                          if( isset( $fvseop_options['sitemap_exclude_author'] ) && in_array( $user->data->ID, $fvseop_options['sitemap_exclude_author'] ) ) echo 'checked="1"';
                          echo '></td>'. "\n";
                      }
                  
                      if( $news_sitemap ){
                          echo '<td align="center"><input type="checkbox" name="sitemap_news_include_author[]" value="'.$user->data->ID.'" ';
                          if( isset( $fvseop_options['sitemap_news_include_author'] ) && in_array( $user->data->ID, $fvseop_options['sitemap_news_include_author'] ) ) echo 'checked="1"';
                          echo '></td>'. "\n";
                      }
                      
                  echo '</tr>'. "\n";
              }
            ?>
          </table>
          
          <div class="clear"></div>
          <br/>
          <span class="sub">
          When adjusting the category properties, make sure you clear your browser cache (or wait until you edit a post) to be able to see the changes in sitemaps.
          </span>
            
          <style>
          #sitemap_table, #sitemap_table_authors{ display: block; float: left }
          #sitemap_table .head td, #sitemap_table_authors .head td{ text-align: center; font-weight: bold; padding: 0 20px 0 20px }
          #sitemap_table tr:hover, #sitemap_table_authors tr:hover{ background-color: #EEE }
          #sitemap_table_authors{ margin-left: 50px }
          .sub { color: #666; font-size: 0.9em; font-weight: normal }
          </style>
                  
        <?php
        }
    }
  }
  
  function admin_settings_social() {
    global $fvseop_options;
  ?>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_google_publisher_tip');">
          <?php _e('Google +1 Site Publisher:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="social_google_publisher" value="<?php if (isset($fvseop_options['social_google_publisher'])) { echo esc_attr(stripcslashes($fvseop_options['social_google_publisher'])); }?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_social_google_publisher_tip">
          <?php _e('This will be used across the whole site.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_google_author_tip');">
          <?php _e('Google +1 Default Author:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="social_google_author" value="<?php if (isset($fvseop_options['social_google_author'])) echo esc_attr(stripcslashes($fvseop_options['social_google_author']))?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_social_google_author_tip">
          <?php _e('This will be used across the whole site, however user\'s Google +1 links will be used for their posts (if filled in).', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_twitter_site_tip');">
          <?php _e('Twitter site:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="social_twitter_site" value="<?php if (isset($fvseop_options['social_twitter_site'])) { echo esc_attr(stripcslashes($fvseop_options['social_twitter_site'])); }?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_social_twitter_site_tip">
          <?php _e('This will be used across the whole site. Enter @site_username.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('fvseo_social_twitter_creator_tip');">
          <?php _e('Tiwtter creator:', 'fv_seo')?>
        </a><br />
        <input type="text" class="regular-text" size="63" name="social_twitter_creator" value="<?php if (isset($fvseop_options['social_twitter_creator'])) echo esc_attr(stripcslashes($fvseop_options['social_twitter_creator']))?>" />
        <div style="max-width:500px; text-align:left; display:none" id="fvseo_social_twitter_creator_tip">
          <?php _e('This will be used across the whole site, enter @your_username.', 'fv_seo')?>
        </div>
    </p>    
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('social_meta_facebook');">
          <?php _e('Insert Facebook Open Graph tags:', 'fv_seo')?>
        </a> 
        <input type="checkbox" name="social_meta_facebook" <?php if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] ) echo 'checked="checked"'; ?>" />
        <div style="max-width:500px; text-align:left; display:none" id="social_meta_facebook">
          <?php _e('Automatically inserts Facebook Open Graph tags with your post meta description and featured image.', 'fv_seo')?>
        </div>
    </p>
    <p>
        <a style="cursor:pointer;" title="<?php _e('Click for Help!', 'fv_seo')?>" onclick="toggleVisibility('social_meta_twitter');">
          <?php _e('Insert Twitter Card meta tags:', 'fv_seo')?>
        </a> 
        <input type="checkbox" name="social_meta_twitter" <?php if( !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) echo 'checked="checked"'; ?>" />
        <div style="max-width:500px; text-align:left; display:none" id="social_meta_twitter">
          <?php _e('Automatically inserts Twitter Card meta tags with your post meta description and featured image.', 'fv_seo')?>
        </div>
    </p>        
  <?php
  } 
  

  function options_panel()
  {
    $message = null;

    global $fvseop_options;   
    
    if (!$fvseop_options['aiosp_cap_cats'])
      $fvseop_options['aiosp_cap_cats'] = '1';
    
    if( isset($_POST['action']) && $_POST['action'] == 'fvseo_update'){
      
      if( isset( $_POST['Submit_Default'] ) && $_POST['Submit_Default'] != '')
      {
        $nonce = $_POST['nonce-fvseop'];
        
        if (!wp_verify_nonce($nonce, 'fvseopnonce'))
          die ( 'Security Check - If you receive this in error, log out and back in to WordPress');
        
        $message = __("FV Simpler SEO Options Reset.", 'fv_seo');

        delete_option('aioseop_options');

        global $fvseop_default_options;
        $res_fvseop_options = $fvseop_default_options;
          
        update_option('aioseop_options', $res_fvseop_options);
      }
      
      // update options
      if( isset( $_POST['Submit'] ) && $_POST['Submit'] != '')
      {
        $nonce = $_POST['nonce-fvseop'];
      
        if (!wp_verify_nonce($nonce, 'fvseopnonce'))
          die ( 'Security Check - If you receive this in error, log out and back in to WordPress');
          
        $message = __("FV Simpler SEO Options Updated.", 'fv_seo');
        
        $fvseop_options['aiosp_can'] = isset( $_POST['fvseo_can'] ) ? $_POST['fvseo_can'] : NULL;
        $fvseop_options['fvseo_shortlinks'] = isset( $_POST['fvseo_shortlinks'] ) ? $_POST['fvseo_shortlinks'] : NULL;
        $fvseop_options['fvseo_hentry'] = isset( $_POST['fvseo_hentry'] ) ? $_POST['fvseo_hentry'] : NULL;
        $fvseop_options['aiosp_home_title'] = isset( $_POST['fvseo_home_title'] ) ? $_POST['fvseo_home_title'] : NULL;
        $fvseop_options['aiosp_home_description'] = isset( $_POST['fvseo_home_description'] ) ? $_POST['fvseo_home_description'] : NULL;
        $fvseop_options['aiosp_home_keywords'] = isset( $_POST['fvseo_home_keywords'] ) ? $_POST['fvseo_home_keywords'] : NULL;
        $fvseop_options['aiosp_max_words_excerpt'] = isset( $_POST['fvseo_max_words_excerpt'] ) ? $_POST['fvseo_max_words_excerpt'] : NULL;
        $fvseop_options['aiosp_rewrite_titles'] = isset( $_POST['fvseo_rewrite_titles'] ) ? $_POST['fvseo_rewrite_titles'] : NULL;
        $fvseop_options['aiosp_post_title_format'] = isset( $_POST['fvseo_post_title_format'] ) ? $_POST['fvseo_post_title_format'] : NULL;
        $fvseop_options['aiosp_custom_post_title_format'] = isset( $_POST['fvseo_custom_post_title_format'] ) ? $_POST['fvseo_custom_post_title_format'] : NULL;
        $fvseop_options['aiosp_page_title_format'] = isset( $_POST['fvseo_page_title_format'] ) ? $_POST['fvseo_page_title_format'] : NULL;
        $fvseop_options['aiosp_category_title_format'] = isset( $_POST['fvseo_category_title_format'] ) ? $_POST['fvseo_category_title_format'] : NULL;
        $fvseop_options['aiosp_archive_title_format'] = isset( $_POST['fvseo_archive_title_format'] ) ? $_POST['fvseo_archive_title_format'] : NULL;
        $fvseop_options['aiosp_custom_taxonomy_title_format'] = isset( $_POST['fvseo_custom_taxonomy_title_format'] ) ? $_POST['fvseo_custom_taxonomy_title_format'] : NULL;
        $fvseop_options['aiosp_tag_title_format'] = isset( $_POST['fvseo_tag_title_format'] ) ? $_POST['fvseo_tag_title_format'] : NULL;
        $fvseop_options['aiosp_search_title_format'] = isset( $_POST['fvseo_search_title_format'] ) ? $_POST['fvseo_search_title_format'] : NULL;
        $fvseop_options['aiosp_description_format'] = isset( $_POST['fvseo_description_format'] ) ? $_POST['fvseo_description_format'] : NULL;
        $fvseop_options['aiosp_404_title_format'] = isset( $_POST['fvseo_404_title_format'] ) ? $_POST['fvseo_404_title_format'] : NULL;
        $fvseop_options['aiosp_paged_format'] = isset( $_POST['fvseo_paged_format'] ) ? $_POST['fvseo_paged_format'] : NULL;
        $fvseop_options['aiosp_use_categories'] = isset( $_POST['fvseo_use_categories'] ) ? $_POST['fvseo_use_categories'] : NULL;
        $fvseop_options['aiosp_dynamic_postspage_keywords'] = $_POST['fvseo_dynamic_postspage_keywords'];
        $fvseop_options['aiosp_remove_category_rel'] = $_POST['fvseo_remove_category_rel'];
        $fvseop_options['aiosp_category_noindex'] = isset( $_POST['fvseo_category_noindex'] ) ? $_POST['fvseo_category_noindex'] : NULL;
        $fvseop_options['aiosp_archive_noindex'] = isset( $_POST['fvseo_archive_noindex'] ) ? $_POST['fvseo_archive_noindex'] : NULL;
        $fvseop_options['aiosp_tags_noindex'] = isset( $_POST['fvseo_tags_noindex'] ) ? $_POST['fvseo_tags_noindex'] : NULL;
        $fvseop_options['aiosp_generate_descriptions'] = isset( $_POST['fvseo_generate_descriptions'] ) ? $_POST['fvseo_generate_descriptions'] : NULL;
        $fvseop_options['aiosp_cap_cats'] = isset( $_POST['fvseo_cap_cats'] ) ? $_POST['fvseo_cap_cats'] : NULL;
        $fvseop_options['aiosp_debug_info'] = isset( $_POST['fvseo_debug_info'] ) ? $_POST['fvseo_debug_info'] : NULL;
        $fvseop_options['aiosp_post_meta_tags'] = isset( $_POST['fvseo_post_meta_tags'] ) ? $_POST['fvseo_post_meta_tags'] : NULL;
        $fvseop_options['aiosp_page_meta_tags'] = isset( $_POST['fvseo_page_meta_tags'] ) ? $_POST['fvseo_page_meta_tags'] : NULL;
        $fvseop_options['aiosp_home_meta_tags'] = isset( $_POST['fvseo_home_meta_tags'] ) ? $_POST['fvseo_home_meta_tags'] : NULL;
        $fvseop_options['aiosp_home_google_site_verification_meta_tag'] = isset( $_POST['fvseo_home_google_site_verification_meta_tag'] ) ? $_POST['fvseo_home_google_site_verification_meta_tag'] : NULL;
        $fvseop_options['aiosp_home_bing_site_verification_meta_tag'] = isset( $_POST['fvseo_home_bing_site_verification_meta_tag'] ) ? $_POST['fvseo_home_bing_site_verification_meta_tag'] : NULL;
        $fvseop_options['aiosp_home_yahoo_site_verification_meta_tag'] = isset( $_POST['fvseo_home_yahoo_site_verification_meta_tag'] ) ? $_POST['fvseo_home_yahoo_site_verification_meta_tag'] : NULL;

        $fvseop_options['aiosp_custom_header'] = isset( $_POST['fvseo_custom_header'] ) ? $_POST['fvseo_custom_header'] : NULL;
        $fvseop_options['aiosp_custom_footer'] = isset( $_POST['fvseo_custom_footer'] ) ? $_POST['fvseo_custom_footer'] : NULL;
        $fvseop_options['aiosp_ganalytics_ID'] = isset( $_POST['fvseo_ganalytics_ID'] ) ? $_POST['fvseo_ganalytics_ID'] : NULL;
        $fvseop_options['aiosp_statcounter_security'] = isset( $_POST['fvseo_statcounter_security'] ) ? $_POST['fvseo_statcounter_security'] : NULL;
        $fvseop_options['aiosp_statcounter_project'] = isset( $_POST['fvseo_statcounter_project'] ) ? $_POST['fvseo_statcounter_project'] : NULL;


        $fvseop_options['aiosp_ex_pages'] = isset( $_POST['fvseo_ex_pages'] ) ? $_POST['fvseo_ex_pages'] : NULL;
        $fvseop_options['aiosp_use_tags_as_keywords'] = isset( $_POST['fvseo_use_tags_as_keywords'] ) ? $_POST['fvseo_use_tags_as_keywords'] : NULL;

        $fvseop_options['aiosp_search_noindex'] = isset( $_POST['fvseo_search_noindex'] ) ? $_POST['fvseo_search_noindex'] : NULL;
        $fvseop_options['aiosp_dont_use_excerpt'] = isset( $_POST['fvseo_dont_use_excerpt'] ) ? $_POST['fvseo_dont_use_excerpt'] : NULL;
        $fvseop_options['aiosp_show_keywords'] = isset( $_POST['fvseo_show_keywords'] ) ? $_POST['fvseo_show_keywords'] : NULL;
        $fvseop_options['aiosp_show_noindex'] = isset( $_POST['fvseo_show_noindex'] ) ? $_POST['fvseo_show_noindex'] : NULL;      
        $fvseop_options['aiosp_show_custom_canonical'] = isset( $_POST['fvseo_show_custom_canonical'] ) ? $_POST['fvseo_show_custom_canonical'] : NULL;
        $fvseop_options['aiosp_show_titleattribute'] = isset( $_POST['fvseo_show_titleattribute'] ) ? $_POST['fvseo_show_titleattribute'] : NULL;
        $fvseop_options['aiosp_show_short_title_post'] = isset( $_POST['fvseo_show_short_title_post'] ) ? $_POST['fvseo_show_short_title_post'] : NULL;
        $fvseop_options['aiosp_sidebar_short_title'] = isset( $_POST['fvseo_sidebar_short_title'] ) ? $_POST['fvseo_sidebar_short_title'] : NULL;
        $fvseop_options['aiosp_show_disable'] = isset( $_POST['fvseo_show_disable'] ) ? $_POST['fvseo_show_disable'] : NULL;
        $fvseop_options['aiosp_shorten_slugs'] = isset( $_POST['fvseo_shorten_slugs'] ) ? true : false;
        $fvseop_options['fvseo_attachments'] = isset( $_POST['fvseo_attachments'] ) ? true : false;
        $fvseop_options['fvseo_publ_warnings'] = isset( $_POST['fvseo_publ_warnings'] ) ? $_POST['fvseo_publ_warnings'] : 0;
        $fvseop_options['fvseo_events'] = isset( $_POST['fvseo_events'] ) ? $_POST['fvseo_events'] : 0;

        $fvseop_options['social_google_publisher'] = isset( $_POST['social_google_publisher'] ) ? trim($_POST['social_google_publisher']) : NULL;
        $fvseop_options['social_google_author'] = isset( $_POST['social_google_author'] ) ? trim($_POST['social_google_author']) : NULL;
        $fvseop_options['social_twitter_creator'] = isset( $_POST['social_twitter_creator'] ) ? trim($_POST['social_twitter_creator']) : NULL;
        $fvseop_options['social_twitter_site'] = isset( $_POST['social_twitter_site'] ) ? trim($_POST['social_twitter_site']) : NULL;
        $fvseop_options['social_meta_facebook'] = isset( $_POST['social_meta_facebook'] ) ? true : false;
        $fvseop_options['social_meta_twitter'] = isset( $_POST['social_meta_twitter'] ) ? true : false;
        
        $fvseop_options['remove_hentry'] = isset( $_POST['remove_hentry'] ) ? true : false;
        
        if( isset( $_POST['xml_sitemap'] ) ){
            $fvseop_options['sitemap_exclude'] = ( isset( $_POST['sitemap_exclude'] ) ) ? $_POST['sitemap_exclude'] : NULL;
            $fvseop_options['sitemap_exclude_author'] = ( isset( $_POST['sitemap_exclude_author'] ) ) ? $_POST['sitemap_exclude_author'] : NULL;
        }
        
        if( isset( $_POST['news_sitemap'] ) ){
            $fvseop_options['sitemap_news_include'] = ( isset( $_POST['sitemap_news_include'] ) ) ? $_POST['sitemap_news_include'] : NULL;
            $fvseop_options['sitemap_news_include_author'] = ( isset( $_POST['sitemap_news_include_author'] ) ) ? $_POST['sitemap_news_include_author'] : NULL;
        }
        
        update_option('aioseop_options', $fvseop_options);

        if (function_exists('wp_cache_flush'))
        {
          wp_cache_flush();
        }
      }
      
      if( isset( $_POST['fvseo_import_desc_wordpress-seo-by-yoast'] ) || isset( $_POST['fvseo_import_desc_genesis-seo'] ) )
      {
        $nonce = $_POST['nonce-fvseop'];
        
        if (!wp_verify_nonce($nonce, 'fvseopnonce'))
          die ( 'Security Check - If you receive this in error, log out and back in to WordPress');
        
        global $wpdb;
        $max_execution_time = ini_get('max_execution_time') - 5;
        $start_time = time();
        
        if( isset( $_POST['fvseo_import_desc_wordpress-seo-by-yoast'] ) ){
          $title_meta_value = '_yoast_wpseo_title';
          $desc_meta_value = '_yoast_wpseo_metadesc';
        }
        else if( isset( $_POST['fvseo_import_desc_genesis-seo'] ) ){
          $title_meta_value = '_genesis_title';
          $desc_meta_value = '_genesis_description';
        }
        else{
          return;
        }
        
        $seo_titles = $wpdb->get_results(
          "SELECT post_id, meta_value FROM {$wpdb->postmeta}
          WHERE meta_key = '$title_meta_value'
          AND post_id NOT IN ( SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_aioseop_title' )"
        );
        
        $titles_updated = 0;
        foreach( $seo_titles as $stitle ){
          if( ( $start_time - time() ) > $max_execution_time ){
            break;
          }
          
          update_post_meta( $stitle->post_id, '_aioseop_title', $stitle->meta_value);
          $titles_updated++;
        }
        
        $meta_desc = $wpdb->get_results(
          "SELECT post_id, meta_value FROM {$wpdb->postmeta}
          WHERE meta_key = '$desc_meta_value'
          AND post_id NOT IN ( SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_aioseop_description' )"
        );

        $description_updated = 0;
        foreach( $meta_desc as $mdesc ){
          if( ( $start_time - time() ) > $max_execution_time ){
            break;
          }
          
          update_post_meta( $mdesc->post_id, '_aioseop_description', $mdesc->meta_value);
          $description_updated++;
        }
        
        $message = $titles_updated . __(" seo titles and ", 'fv_seo') . $description_updated . __(" meta description have been imported.", 'fv_seo');
        
        $continue_message = '';
        //remaining?
        if( count($seo_titles) > $titles_updated ){
          $continue_message .= count($seo_titles) - $titles_updated . __(" titles", 'fv_seo');
        }
        
        if( count($meta_desc) > $description_updated ){
          $continue_message .= ( !empty($continue_message) ) ? ' and ' : '';
          $continue_message .= count($meta_desc) - $description_updated . __(" descriptions", 'fv_seo');
        }
        
        if( !empty($continue_message) ){
          $message .= '<br/>' . $continue_message . __(" remaining. Please run this import again.", 'fv_seo');
        }
        
      }
    }
    
    // TODO: Important, I can't change the four textareas for the additional headers until I change the whole concept in this fields. I need to do it.
?>
<?php if ($message) : ?>
  <div id="message" class="updated fade">
    <p>
      <?php echo $message; ?>
    </p>
  </div>
<?php endif; ?>
  <div id="dropmessage" class="updated" style="display:none;"></div>
    <style type="text/css">
    .postbox-container { min-width: 100% !important; }
  </style>
  <div class="wrap">
      <div style="position: absolute; top: 10px; right: 10px;">
          <a href="https://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack" target="_blank" title="Documentation"><img alt="visit foliovision" src="//foliovision.com/shared/fv-logo.png" /></a>
      </div>
      <div>
          <div id="icon-options-general" class="icon32"><br /></div>
          <h2>
          <?php _e('FV Simpler SEO Options', 'fv_seo'); ?>
          </h2>
      </div>
    <div style="clear:both;"></div>
<script type="text/javascript">
function toggleVisibility( id, hide )
{

  var e = document.getElementById(id);

  if(e.style.display == 'block')
    e.style.display = 'none';
  else
    e.style.display = 'block';
    
  if ( hide !== undefined ) {
    document.getElementById(hide).style.display = 'none';
  }
}
</script>
    <form name="dofollow" action="" method="post">

<?php

$fvseop_options = get_option('aioseop_options');

add_meta_box( 'fv_simpler_seo_basic', 'Basic Options', array( $this, 'admin_settings_basic' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_social', 'Social Networks', array( $this, 'admin_settings_social' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_interface_options', 'Extra Interface Options', array( $this, 'admin_settings_interface' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_advanced', 'Advanced Options', array( $this, 'admin_settings_advanced' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'admin_settings_tracking_codes', 'Tracking codes', array( $this, 'admin_settings_tracking_codes' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_sitemap', 'XML Sitemaps & Google News feed', array( $this, 'admin_settings_sitemap' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_calendar', 'Basic Events Functions', array( $this, 'admin_settings_calendar' ), 'fv_simpler_seo_settings', 'normal' );
add_meta_box( 'fv_simpler_seo_import', 'Import', array( $this, 'admin_settings_import' ), 'fv_simpler_seo_settings', 'normal' );

?>            

    <div id="dashboard-widgets" class="metabox-holder columns-1">
      <div id='postbox-container-1' class='postbox-container'>    
        <?php
        do_meta_boxes( 'fv_simpler_seo_settings', 'normal', false );
        wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
        wp_nonce_field( 'meta-box-order-nonce', 'meta-box-order-nonce', false );
        ?>
      </div>
    </div>  
    
                <div style="border-left: 1px solid #ddd; padding-left: 10px; margin-left: 20px; text-align:left; 
                <?php if( !$fvseop_options['aiosp_show_keywords'] && !$fvseop_options['aiosp_show_custom_canonical'] && !$fvseop_options['aiosp_show_titleattribute'] && !$fvseop_options['aiosp_show_disable'] && !$fvseop_options['aiosp_show_short_title_post'] ) echo 'display: none;' ?>" id="fvseo_user_interface_options">
                            
                </div>

            


      <p class="submit">        
        <input type="hidden" name="action" value="fvseo_update" />
        <input type="hidden" name="nonce-fvseop" value="<?php echo esc_attr(wp_create_nonce('fvseopnonce')); ?>" />
        <input type="hidden" name="page_options" value="fvseo_home_description" />
        <input type="submit" class='button-primary' name="Submit" value="<?php _e('Update Options', 'fv_seo')?> &raquo;" />
        <input type="submit" class='button-primary' name="Submit_Default" value="<?php _e('Reset Settings to Defaults', 'fv_seo')?> &raquo;" />        
      </p>
    </form>
    <script type="text/javascript">
      //<![CDATA[
      jQuery(document).ready( function($) {
        // close postboxes that should be closed
        $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
        // postboxes setup
        postboxes.add_postbox_toggles('fv_simpler_seo_settings');
        
        var match;
        if( match = window.location.hash.match(/fvseo\S+/) ){
          $('#'+match[0]).parents('.postbox').removeClass('closed');
          $('#'+match[0]+'_tip').show();
        }
      });
      //]]>
    </script>    
  </div>
  <?php
  } // options_panel
  
  
  
  function get_adjacent_post_where( $sql ) {
    global $post;
    
    $affected_post_types = apply_filters( 'fv_get_adjacent_post_where_post_types', array( 'page' ) );
    
    if( array_search( $post->post_type, $affected_post_types ) !== FALSE && $ids = $this->get_noindex_posts() ) {
      $ids = implode( ',', $ids );
      $sql .= ' AND p.ID NOT IN ('.$ids.')';
    }
    
    return $sql;
  }
  
  
  
  function get_noindex_posts() {
    global $wpdb;
    $res = $wpdb->get_col( "SELECT ID FROM $wpdb->posts AS p JOIN $wpdb->postmeta AS m ON p.ID = m.post_id WHERE meta_key = '_aioseop_noindex' AND meta_value = '1' " );
    //echo '<!--res '.var_export($res, true).'-->';
    return $res;
  }
  
  

  function pre_get_posts($query) {
    if ( !$query->is_admin && $query->is_search) {      
        if( $ids = $this->get_noindex_posts() ) {
          $query->set('post__not_in', $ids ); // id of page or post
        }
    }
    return $query;
  }
  
  
  
  
  function initiate_the_title_change() {
    global $fvseop_options;
    if( isset($fvseop_options['aiosp_sidebar_short_title']) && $fvseop_options['aiosp_sidebar_short_title'] ) {
        add_filter( 'the_title', array( $this, 'the_title' ) );
    }
  }
  
  
    
  function the_title( $title ) {
    global $fvseop_options;
    if( $fvseop_options['aiosp_show_short_title_post'] ) {
      global $post;
      if( $short_title = get_post_meta( $post->ID, '_aioseop_menulabel', true ) ) {
        return __( $short_title );
      }
    } 
    return $title;    
  }
  
    function filter_request_sitemap($request){

        if( !isset($request['feed']) )
            return $request;
        
        global $fvseop_options;
  $noIndexPosts = $this->get_noindex_posts();
        
        
        if ( strpos($request['feed'],'sitemap') == 0 ) 
            $request['post__not_in'] = $noIndexPosts;
            
            
        if( $request['feed'] == 'sitemap-news' ){
            
            if( isset($fvseop_options['sitemap_news_include']) && !empty($fvseop_options['sitemap_news_include']) ){
                $include_categ = implode(',', $fvseop_options['sitemap_news_include']);
                $request['cat'] = $include_categ;
            }
            
            if( isset($fvseop_options['sitemap_news_include_author']) && !empty($fvseop_options['sitemap_news_include_author']) ){
                $include_author = implode(',', $fvseop_options['sitemap_news_include_author']);
                $request['author'] = $include_author;
            }
            
        }
        else if( strpos($request['feed'],'sitemap-posttype') == 0 ){
            
            if( isset($fvseop_options['sitemap_exclude']) && !empty($fvseop_options['sitemap_exclude']) ){
                $exlude_categ = preg_replace('~^~','-',$fvseop_options['sitemap_exclude']);
                $exlude_categ = implode(',', $exlude_categ);
                $request['cat'] = $exlude_categ;
            }
            
            if( isset($fvseop_options['sitemap_exclude_author']) && !empty($fvseop_options['sitemap_exclude_author']) ){
                $exlude_categ_author = preg_replace('~^~','-',$fvseop_options['sitemap_exclude_author']);
                $exlude_categ_author = implode(',', $exlude_categ_author);
                $request['author'] = $exlude_categ_author;
            }
            
        }
        
        return $request;
    }
  
  

  function wp_list_pages_excludes( $exclude_array ) {
    if( $ids = $this->get_noindex_posts() ) {
      $exclude_array = array_merge( $exclude_array, $ids );
    }
    return $exclude_array;
  }
  
  
  function yarpp_results( $posts ) {  
    
    if( !function_exists( 'yarpp_related' ) ) {
      return $posts;
    }
    
    global $fvseop_options;
    if( !$fvseop_options['aiosp_show_noindex'] ) {      
      return $posts;
    }
        
    global $wpdb;
    $no_index = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_aioseop_noindex' " );
    if( $no_index ) {
      $new_posts = array();
         if ( !empty($posts) ) {
            foreach( $posts AS $key => $item ) {
               $found = false;
               foreach( $no_index AS $id ) {
                  if( $id == $item->ID ) {
                     $found = true;
                     break;
                  }
               }
               if( !$found ) {
                  $new_posts[] = $item;
               }
            }
         }         
      
      global $wp_query;
      $wp_query->post_count = count( $new_posts );      
      $posts = $new_posts;
    }
    
    return $posts;
  } 
  
  
  
  
  function google_authorship() {
    $strGooglePlusLink = false;
    
    global $fvseop_options;
    if( isset($fvseop_options['social_google_author']) && strlen(trim($fvseop_options['social_google_author'])) > 0 ) {
      $strGooglePlusLink = $fvseop_options['social_google_author'];
    }

    if ( is_singular() ) {
      global $post;
      if( $post->post_type == 'post' ) {
        $meta = get_the_author_meta( 'googleplus', $post->post_author );
        if( strlen(trim($meta)) > 0 ) {
          $strGooglePlusLink = $meta;
        }
      }
    }

    $strGooglePlusLink = apply_filters( 'fvseo_googlepluslink', $strGooglePlusLink );
    if( $strGooglePlusLink ) {
      echo '<link rel="author" href="'.esc_attr($strGooglePlusLink).'" />' . "\n";
    }
    
    if( isset($fvseop_options['social_google_publisher']) && strlen(trim($fvseop_options['social_google_publisher'])) > 0 ) {
      echo '<link rel="publisher" href="'.esc_attr($fvseop_options['social_google_publisher']).'" />' . "\n";
    }
  }
  
  
  //return "Front-Street-Entrance" from "/images/2014/07/790/Front-Street-Entrance.jpg"
  function get_name_from_path( $path ){
    if( !preg_match('~^.*\/([^\/]+\.[A-Za-z]+)$~',$path, $aFile) )
      return false;
    
    $img_name = preg_replace( '~^/?([^/]+)\.[A-Za-z]+$~', '$1', $aFile[1] );
    $img_name = preg_replace( '~^/?([^/]+)-[0-9]{1,4}x[0-9]{1,4}$~', '$1', $img_name );
    
    return $img_name;
  }
  
  
  function social_meta_tags() {
    $strGooglePlusLink = false;
    
    global $fvseop_options;

    if ( is_singular() ) {
      global $post;
      if( !$description = stripcslashes( get_post_meta($post->ID, '_aioseop_description', true) ) ) {
        $description = wp_trim_words(strip_shortcodes(strip_tags($post->post_content)), 20, ' &hellip;');
      }
      
      
      $description = __($this->internationalize($description));
      $description = htmlspecialchars(strip_tags($description));
          
      
      if( !$title = stripcslashes( get_post_meta($post->ID, '_aioseop_title', true) ) ) {
        $title = get_the_title();
      }
      
      $title = esc_attr( __($this->internationalize($title)) );
            
      
      $aImage = array();
      if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] || !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) {
            if( $thumb = get_the_post_thumbnail($post->ID,'large') ) {
                $sTwitterCard = 'summary_large_image';
              } else {
                $thumb = get_the_post_thumbnail($post->ID,'thumbnail');
                $sTwitterCard = 'summary';
              }
              
              //take thumb name for comparing
              if( !empty($thumb) && preg_match( '~^[\s\S]*src=["\']([^"\']+)["\'][\s\S]*$~', $thumb, $thumb_src ) ){
                $thumb_name = $this->get_name_from_path( $thumb_src[1] );
                $aImage[] = ( preg_match('~^/[^/]~', $thumb_src[1]) ) ? home_url($thumb_src[1]) : $thumb_src[1];
              }
              else
                $thumb_name = false;
               
               //begin parsing images from content
              $contentImages = array();
              if( 0 != preg_match_all( '~<img[^>]*>~', $post->post_content, $parsedImages ) ) {
               foreach( $parsedImages[0] as $singleImg ){
                    
                preg_match( '~^[\s\S]*src=["\']([^"\']+)["\'][\s\S]*$~', $singleImg, $img_src );
                if( !isset($img_src[1]) || empty($img_src[1]) ) continue;
                
                preg_match( '~^[\s\S]*width=["\']([0-9]+)["\'][\s\S]*$~', $singleImg, $img_width );
                preg_match( '~^[\s\S]*height=["\']([0-9]+)["\'][\s\S]*$~', $singleImg, $img_height );
                
                $img_url = ( preg_match('~^/[^/]~', $img_src[1]) ) ? home_url($img_src[1]) : $img_src[1];

                //test this
                //img tag doesn't have width parameter, get it from url
                if( !isset($img_width[1]) || empty($img_width[1]) ){
                  preg_match( '~.*/([0-9]{1,4})/?[^/]+\.[A-Za-z]+$~', $img_src[1], $img_width );
                  //try it again
                  if( !isset($img_width[1]) || empty($img_width[1]) )
                    preg_match( '~.*/?[^/]+-([0-9]{1,4})x[0-9]{1,4}$~', $img_src[1], $img_width );
                }
                
                //compare with thumb name, don't include same images twice
                $img_name = $this->get_name_from_path($img_src[1]);
                if( !$img_name || ( $thumb_name != false && $thumb_name == $img_name ) ) continue;
                
                //var_dump( array( 'width' => $img_width[1], 'height' => $img_height[1], 'path'=> $img_url ));
                
                //pick 2 biggest images, image must be 200px +
                if( count($contentImages) < 2 ){
                  //if there are less than 2 images in array, save current, size doesn't matter
                  $contentImages[] = array( 'width' => $img_width[1], 'height' => $img_height[1], 'path'=> $img_url );
                }
                else if(intval($img_width[1]) > 200 && intval($img_height[1]) > 200){
                  
                  //if actual image is wider than img on postion 0, save to temp for later compare
                  if( $contentImages[0]['width'] < $img_width[1] ){
                    $temp = $contentImages[0];
                    $contentImages[0] = array( 'width' => $img_width[1], 'height' => $img_height[1], 'path'=> $img_url );
                    
                    if( $contentImages[1]['width'] < $temp['width'] )
                      $contentImages[1] = $temp;
                  }
                  else if( isset($contentImages[1]['width']) && $contentImages[1]['width'] < $img_width[1] ){
                    $contentImages[1] = array( 'width' => $img_width[1], 'height' => $img_height[1], 'path'=> $img_url );
                  }
                }
                
               }
              }
              
              foreach($contentImages as $img ){
                $aImage[] = $img['path'];
              }
            
      }
      
  if( !isset($fvseop_options['social_meta_facebook']) || $fvseop_options['social_meta_facebook'] ) :
?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="blog" />
  <meta property="og:description" content="<?php echo $description; ?>" />
  <?php
    foreach( $aImage as $singleImg )
      echo "\t" . '<meta property="og:image" content="' . $singleImg .'" />' . "\n";
  ?>
  <meta property="og:url" content="<?php the_permalink(); ?>" />
  <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
<?php
  endif;  //  social_meta_facebook
      
      if( !isset($fvseop_options['social_meta_twitter']) || $fvseop_options['social_meta_twitter'] ) :
?>
  <meta name="twitter:title" content="<?php echo $title; ?>" />
  <meta name="twitter:card" content="<?php echo $sTwitterCard; ?>" />
  <meta name="twitter:description" content="<?php echo $description; ?>" />
  <?php if( isset($aImage[0]) && !empty($aImage[0])) : ?><meta name="twitter:image" content="<?php echo $aImage[0]; ?>" />
<?php endif; ?>
  <meta name="twitter:url" content="<?php the_permalink(); ?>" />
  <?php if( isset($fvseop_options['social_twitter_creator']) && strlen(trim($fvseop_options['social_twitter_creator'])) > 0 ) : ?>
    <meta name="twitter:creator" content="<?php echo trim($fvseop_options['social_twitter_creator']); ?>" />
  <?php endif; ?>
  <?php if( isset($fvseop_options['social_twitter_site']) && strlen(trim($fvseop_options['social_twitter_site'])) > 0 ) : ?>
    <meta name="twitter:site" content="<?php echo trim($fvseop_options['social_twitter_site']); ?>" />
  <?php endif; ?>  
<?php
      endif;  //  social_meta_twitter
      
    }

  }
  
  
  
  
  function post_class( $classes ) {
    foreach( $classes AS $key => $item ) {
      if( $item == 'hentry' ) {
        unset( $classes[$key] );
      }
    }
    return $classes;  
  }
  
  
  
  
  function microdata_category_links( $sHTML ) {
    $sHTML = preg_replace( '~rel=[\'"].*?[\'"]~', '', $sHTML );
    return $sHTML;
  }
  
  
  
  
  function my_searchwp_exclude(  $exclude_array, $engine, $terms ){
    
    if( $ids = $this->get_noindex_posts() ) {
      $exclude_array = array_merge( $exclude_array, $ids );
    }
    
    return $exclude_array;
  }
  
  
  
  
  function update_contactmethods( $aContactMethods ) {
    $aContactMethods['googleplus'] = __( "Google+", 'fv_seo' );
    return $aContactMethods;
  }
  
  
  
  
  /*
   * Matches anchor rel="wp-att-{attachment id}" with image class="wp-image-{attachment id}" and replaces these links with full sizes images
   */
  function replace_attachment_links( $content ) {
    global $fvseop_options;
    if( isset($fvseop_options['fvseo_attachments']) && !$fvseop_options['fvseo_attachments'] ) {
      return $content;
    }
    
    global $wpdb;
    //$wpdb->queries[] = 'start';
    $content = preg_replace_callback( '~<a[^>]*?href="(.*?)"[^>]*?rel=".*?wp-att-(\d+).*?"[^>]*?>\s*?<img[^>]*?src="(.*?)"[^>]*?class=".*?wp-image-(\d+).*?"[^>]*?>\s*?</a>~', array( $this, 'replace_attachment_links_callback' ), $content );
    return $content;
  }
  
  
  
  
  function replace_attachment_links_callback( $aMatch ) {  
    if( $aMatch[4] == $aMatch[2] ) {
      $aMatch[0] = str_replace( $aMatch[1], preg_replace( '~-\d{3,4}x\d{3,4}(\.\S{3,4})$~', '$1', $aMatch[3]), $aMatch[0] );
    }
    
    return $aMatch[0];
  }




  function script_permalink_replacement( $data ){
    
    $permalink = $this->curPageURL();
    
    if( !empty($permalink) ){
      $data = str_replace('%permalink%', $permalink, $data );
    }
    
    return $data;
  }


  function script_header_content(){
    global $fvseop_options;
    
    if( isset( $fvseop_options['aiosp_custom_header'] ) && !empty( $fvseop_options['aiosp_custom_header'] ) ){
      
      $data = $this->script_permalink_replacement( $fvseop_options['aiosp_custom_header'] );
      echo stripcslashes( $data ) . "\n";
    } 
  }
  
  
  
  
  function script_footer_content(){
    global $fvseop_options;
  
    if( isset( $fvseop_options['aiosp_custom_footer'] ) && !empty( $fvseop_options['aiosp_custom_footer'] ) ){
    
      $data = $this->script_permalink_replacement( $fvseop_options['aiosp_custom_footer'] );
      echo stripcslashes($data) . "\n";
    }
    
    if( isset( $fvseop_options['aiosp_ganalytics_ID'] ) && !empty( $fvseop_options['aiosp_ganalytics_ID'] ) ){
      echo stripcslashes("<script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
              ga('create', '".$fvseop_options['aiosp_ganalytics_ID']."', 'auto');
              ga('send', 'pageview');
            
            </script>") . "\n";
      
    }
    
    if( isset( $fvseop_options['aiosp_statcounter_security'] ) && !empty( $fvseop_options['aiosp_statcounter_security'] )
        && isset( $fvseop_options['aiosp_statcounter_project'] ) && !empty( $fvseop_options['aiosp_statcounter_project'] )){
      echo stripcslashes('<!-- Start of StatCounter Code for Default Guide -->
            <script type="text/javascript">
            var sc_project='.$fvseop_options['aiosp_statcounter_project'].'; 
            var sc_invisible=1; 
            var sc_security="'.$fvseop_options['aiosp_statcounter_security'].'"; 
            var sc_https=1; 
            var scJsHost = (("https:" == document.location.protocol) ?
            "https://secure." : "http://www.");
            document.write("<sc"+"ript type=\'text/javascript\' src=\'" +
            scJsHost+
            "statcounter.com/counter/counter.js\'></"+"script>");
            </script>
            <noscript><div class="statcounter"><a title="free hit
            counter" href="http://statcounter.com/free-hit-counter/"
            target="_blank"><img class="statcounter"
            src="//c.statcounter.com/'.$fvseop_options['aiosp_statcounter_project'].'/0/'.$fvseop_options['aiosp_statcounter_security'].'/1/"
            alt="free hit counter"></a></div></noscript>
            <!-- End of StatCounter Code for Default Guide -->') . "\n";
    }
  }




  function manage_category_columns( $columns ){
    add_action('admin_footer', array($this,'manage_category_fvseo_title_js') );
    
    $new_columns  = array_slice($columns, 0, 2)
                  + array('fvseo_title' => "SEO Title")
                  + array_slice($columns, 2);
    
    return $new_columns;
  }




  function manage_category_custom_columns( $content, $column_name, $term_id ){
    if( $column_name != 'fvseo_title' ){
      return $content;
    }
    
    $category_titles = get_option('aioseop_category_titles');
    $value = ( isset($category_titles[$term_id]) && strlen(trim($category_titles[$term_id])) > 0 ) ? $category_titles[$term_id] : '';
    
    $content .= "<input class='fvseo_title' type='text' name='fvseo_title[$term_id]' value='$value'>";

    return $content;
  }
  
  
  
  
  function manage_category_process_action(){
    if( !isset( $_POST['fv_seo_category_update'] ) ){
      return;
    }
    
    $seo_titles = $_POST['fvseo_title'];
    if( isset($seo_titles) && !empty($seo_titles) ){
      $category_titles = get_option('aioseop_category_titles');
      
      if( !$category_titles){
        $category_titles = array();
      }
      
      foreach($seo_titles as $term_id => $title ){
        if(  strlen(trim($title)) > 0 ){
          $category_titles[$term_id] = $title;
        }
      }
      
      update_option('aioseop_category_titles',$category_titles);
    }
    
    //clear after process, 
    $_POST = array();
  }
  
  
  function manage_category_fvseo_title_js(){
  ?>
  <script type="text/javascript">
    function fvseo_show_update_button(){
      jQuery("input.fv_seo_category_update").show();
      
      jQuery(window).bind('beforeunload', function(){
        return 'Data you have entered are not be saved yet. Are you sure you want to leave?';
      });
    }  

    jQuery(document).ready( function(){
      
      var update_fvseo_title_button = "<input class='button button-primary fv_seo_category_update' type='submit' name='fv_seo_category_update' value='Save SEO Titles' style='display:none' />";
      jQuery("div.actions").append(update_fvseo_title_button);
      
      jQuery("input.fvseo_title").keydown( fvseo_show_update_button );                         
      jQuery("input.fvseo_title").change( fvseo_show_update_button );
      
      jQuery(".fv_seo_category_update").click( function() {
        jQuery(window).unbind('beforeunload');
      });
      
    
    });
    
  </script>
  
  <style>
    input.fvseo_title{
      width: 100%;
    }
  </style>
  
  <?php
  }




} // end fv_seo class

$fvseo = new FV_Simpler_SEO_Pack();