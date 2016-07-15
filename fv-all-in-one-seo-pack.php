<?php
/*
Plugin Name: FV Simpler SEO
Plugin URI: http://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack
Description: Simple and effective SEO. Non-invasive, elegant. Ideal for client facing projects. | <a href="options-general.php?page=fv_simpler_seo">Options configuration panel</a>
Version: 1.6.32
Author: Foliovision
Author URI: http://foliovision.com
*/

$fv_simpler_seo_version = '1.6.32';
$fvseop_options = get_option('aioseop_options');

global $fvseop_default_options;
$fvseop_default_options = array(
  "aiosp_can"=>0,
  "fvseo_shortlinks"=>0,
  "fvseo_hentry"=>0,
  "fvseo_attachments"=>1,
  "aiosp_home_title"=>null,
  "aiosp_home_description"=>'',
  "aiosp_home_keywords"=>null,
  "aiosp_max_words_excerpt"=>'something',
  "aiosp_rewrite_titles"=>0,
  "aiosp_post_title_format"=>'%post_title% | %blog_title%',
  "aiosp_custom_post_title_format"=>'%post_title% | %post_type_name% | %blog_title%',
  "aiosp_page_title_format"=>'%page_title% | %blog_title%',
  "aiosp_category_title_format"=>'%category_title% | %blog_title%',
  "aiosp_archive_title_format"=>'%date% | %blog_title%',
  "aiosp_tag_title_format"=>'%tag% | %blog_title%',
  "aiosp_search_title_format"=>'%search% | %blog_title%',
  "aiosp_custom_taxonomy_title_format"=>'%tax_title% | %blog_title%',
  "aiosp_description_format"=>'%description%',
  "aiosp_404_title_format"=>'Nothing found for %request_words%',
  "aiosp_paged_format"=>' - Part %page%',
  "aiosp_use_categories"=>1,
  "aiosp_dynamic_postspage_keywords"=>1,
  "aiosp_remove_category_rel"=>1,
  "aiosp_category_noindex"=>0,
  "aiosp_archive_noindex"=>0,
  "aiosp_tags_noindex"=>0,
  "aiosp_cap_cats"=>0,
  "aiosp_generate_descriptions"=>0,
  "aiosp_debug_info"=>null,
  "aiosp_post_meta_tags"=>'',
  "aiosp_page_meta_tags"=>'',
  "aiosp_home_meta_tags"=>'',
  'home_google_site_verification_meta_tag' => '',
  'aiosp_use_tags_as_keywords' => 1,
  'aiosp_search_noindex'=>1,
  'aiosp_dont_use_excerpt'=>0,
  'aiosp_show_keywords'=>0,
  'aiosp_show_titleattribute'=>0,
  'aiosp_show_short_title_post'=>0,
  'aiosp_sidebar_short_title'=>0,
  'aiosp_show_disable'=>0,
  'aiosp_show_custom_canonical'=>0,
  'aiosp_shorten_slugs'=>1,
  'fvseo_publ_warnings'=>1,
  'fvseo_events'=>0,
  'social_google_publisher'=>'',
  'social_google_author'=>'',
  'social_twitter_site'=>'',
  'social_twitter_creator'=>'',
  'social_meta_facebook'=>true,
  'social_meta_twitter'=>true
);

if( !$fvseop_options ) fvseop_mrt_mkarry();

require( dirname(__FILE__).'/utf8_tables.php' );
require( dirname(__FILE__).'/fv_simpler_seo.class.php' );

function fvseop_mrt_mkarry()
{

  global $fvseop_default_options, $fvseop_options;
  $fvseop_options = $fvseop_default_options;
  
	if (get_option('aiosp_post_title_format'))
	{
		foreach ($fvseop_options as $fvseop_opt_name => $value )
		{
			if ($fvseop_oldval = get_option($fvseop_opt_name))
			{
				$fvseop_options[$fvseop_opt_name] = $fvseop_oldval;
			}
			
			if ($fvseop_oldval == '')
			{
				$fvseop_options[$fvseop_opt_name] = '';
			}
        
			delete_option($fvseop_opt_name);
		}
	}

	update_option('aioseop_options',$fvseop_options);

  /// this displays a warning message in WP 3.0
	//echo "<div class='updated fade' style='background-color:green;border-color:green;'><p><strong>Updating FV All in One SEO Pack configuration options in database</strong></p></div>";
}

function fvseop_nav_menu($content)
{
	$url = preg_replace(array('/\//', '/\./', '/\-/'), array('\/', '\.', '\-'), get_option('siteurl'));
	$pattern = '/<li id=\"menu-item-(\d+)\" class="menu-item(.*?)menu-item-(\d+)([^\"]*)"><a href=\"([^\"]+)"[^>]*?>([^<]+)<\/a>/i';
  
  /// db optimization, only process what's a menu item for post type
  preg_match_all( '~id=\"menu-item-(\d+)\" class=\"[^"]*?menu-item-type-post_type[^"]*?\"~', $content, $ids );
  if( function_exists( 'update_meta_cache' ) && count( $ids[1] ) > 0 ) { update_meta_cache( 'post', $ids[1] ); }
  
  $menu_ids = array();
  foreach ($ids[1] as $id) {    
    $menu_ids[] = get_post_meta($id, '_menu_item_object_id', true); 
  }
  if( function_exists( 'update_meta_cache' ) && count( $menu_ids ) > 0 ) { update_meta_cache( 'post', $menu_ids ); }
  
  return preg_replace_callback($pattern, "fvseop_filter_menu_callback", $content);  
}

function fvseop_filter_menu_callback($matches)
{      
  // only process menu items for pages!
  if( strpos( $matches[0], 'menu-item-type-post_type' ) === FALSE ) {
    return $matches[0];
  } 	
	
  $postID = get_post_meta($matches[1], '_menu_item_object_id', true);      
  $my_post = get_post( $postID );      
           	
	if (empty($postID))
		$postID = get_option("page_on_front");
				       
  if ( wptexturize($my_post->post_title) == $matches[6]) {
    $menulabel = stripslashes(get_post_meta($postID, '_aioseop_menulabel', true));
  }    
	
	if (empty($menulabel))
		$menulabel = $matches[6];    
                          
  $menulabel = __( $menulabel );  
  
  $filtered = '<li id="menu-item-' . $matches[1] . '" class="menu-item ' . $matches[2] . 'menu-item-' . $matches[1] . '"><a href="' . esc_attr($matches[5]) . '">' . esc_html($menulabel) . '</a>';	
	
	return $filtered;
}

function fvseop_list_pages($content)
{
	$url = preg_replace(array('/\//', '/\./', '/\-/'), array('\/', '\.', '\-'), get_option('siteurl'));
	$pattern = '/<li class="page_item page-item-(\d+)([^\"]*)"><a href=\"([^\"]+)"[^>]*?>([^<]+)<\/a>/i';
  /// db optimization
  preg_match_all( '~page-item-(\d+)~', $content, $ids );
  if( function_exists( 'update_meta_cache' ) && count( $ids[1] ) > 0 ) { update_meta_cache( 'post', $ids[1] ); }
  ///
	return preg_replace_callback($pattern, "fvseop_filter_callback", $content);
}

function fvseop_filter_callback($matches)
{
  preg_match( '~title="([^\"]+)"~', $matches[0], $match_title );
  if( $match_title ) {
    $matches[4] = $match_title[1];
  }
  
	if ($matches[1] && !empty($matches[1]))
		$postID = $matches[1];
		
	if (empty($postID))
		$postID = get_option("page_on_front");
		
	$title_attrib = stripslashes(get_post_meta($postID, '_aioseop_titleatr', true));
	$menulabel = stripslashes(get_post_meta($postID, '_aioseop_menulabel', true));
	
	if (empty($menulabel))
		$menulabel = $matches[4];
               
  /// Addition
  $longtitle = stripslashes(get_post_meta($postID, '_aioseop_title', true));
            
  $menulabel = __( $menulabel );  
  $longtitle = __( $longtitle );  
  $title_attrib = __( $title_attrib );       
  if( isset($matches[4]) ) {
    $matches[4] = __( $matches[4] );
  }
		
	if (!empty($title_attrib)){
		$filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($title_attrib) . '">' . esc_html($menulabel) . '</a>';
  /// Addition
  }elseif (!empty($longtitle)){
          $filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($longtitle) . '">' . esc_html($menulabel) . '</a>';
  /// End of addition
	}else{
    	$filtered = '<li class="page_item page-item-' . $postID.$matches[2] . '"><a href="' . esc_attr($matches[3]) . '" title="' . esc_attr($matches[4]) . '">' . esc_html($menulabel) . '</a>';
	}    
	
	return $filtered;
}

function fvseo_meta()
{
	global $post;
	global $fvseo;
	
	$post_id = $post;
	
	if (is_object($post_id))
	{
		$post_id = $post_id->ID;
	}
	$url = str_replace('http://','',get_permalink());
 	$keywords = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_keywords', true))));
	$title = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_title', true))));
	$custom_canonical = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_custom_canonical', true))));
	$description = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_description', true))));
	$fvseo_meta = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_meta', true))));
	$fvseo_disable = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_disable', true))));
	$fvseo_titleatr = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_titleatr', true))));
	$fvseo_menulabel = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_menulabel', true))));
	$noindex = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_noindex', true))));	
	$nofollow = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_aioseop_nofollow', true))));
  
  $event_date = esc_attr(htmlspecialchars(stripcslashes(get_post_meta($post_id, '_fv_event_date', true))));
	
	if( $title ) {
	  $title_preview = 	$title;
	} elseif( $title_preview = get_the_title( $post_id ) ) {
	} else {
	  $title_preview = __("Fill in your title", 'fv_seo');
	}
	
	$fvseop_options = get_option('aioseop_options');
	
?>
<script type="text/javascript">
var fvseop_language = '<?php if (function_exists("qtrans_getLanguage")) echo qtrans_getLanguage(); else echo "default"; ?>';
var fvseop_languages;
var fvseop_active_lang = fvseop_language;
<?php if (function_exists("qtrans_getSortedLanguages")) { ?>
fvseop_languages =  <?php echo json_encode(qtrans_getSortedLanguages()); ?>;
<?php } ?>

function countChars(field, cntfield, lang)
{
  if( !field.value ) return;
  
  cntfield.value = field.value.length;

  if( field.name == 'fvseo_description' || field.name == 'fvseo_description' + '_' + lang ) {
	  if( field.value.length > <?php echo $fvseo->maximum_description_length; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'red').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'red').css('color', 'black');
      }
	  }
	  else if( field.value.length > <?php echo $fvseo->maximum_description_length_yellow; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'yellow').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'yellow').css('color', 'black');
      }
	  }
	  else {
	  	if (lang == 'default') {
        jQuery('#lengthD').css('background', 'white').css('color', 'black');
      }
      else {
        jQuery('#lengthD' + '_' + lang).css('background', 'white').css('color', 'black');
      }
	  }
  }
  else if( field.name == 'fvseo_title' || field.name == 'fvseo_title' + '_' + lang ) {
	  if( field.value.length > <?php echo $fvseo->maximum_title_length; ?> ) {
	  	if (lang == 'default') {
        jQuery('#lengthT').css('background', 'red').css('color', 'black');
      }
      else {
        jQuery('#lengthT' + '_' + lang).css('background', 'red').css('color', 'black');
      }
	  }
	  else {
      if (lang == 'default') {
        jQuery('#lengthT').css('background', 'white').css('color', 'black');
      }
      else {
        jQuery('#lengthT' + '_' + lang).css('background', 'white').css('color', 'black');
      }
	  }
  }
}
function fvseo_timeout() {
  FVSimplerSEO_updateTitle();
  FVSimplerSEO_updateTitleFromWPTitle();
  FVSimplerSEO_updateMeta();
  FVSimplerSEO_updateLink();
  window.setTimeout("fvseo_timeout();", 100);
}
function FVSimplerSEO_noindex_toggle() {
	jQuery('.fvseo-noindex').toggle();
	return true;
}
function FVSimplerSEO_updateLink()
{
  if( jQuery( "#sample-permalink" ).length > 0 ) {
    url = jQuery("#sample-permalink").text();
    url = url.replace( 'http://', '' );
    jQuery("#fvseo_href").html(url);
  }
}
function FVSimplerSEO_updateTitleFromWPTitle()
{  
  if (fvseop_language == 'default') {
    if( jQuery( "#fvseo_title_input" ).hasClass( 'linked-to-wp-title' ) ) {
      jQuery( "#fvseo_title_input" ).val( jQuery( "#title" ).val() );
    }
  }
  else {
    for (i = 0; i < fvseop_languages.length; i++) {
      if (jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).hasClass( 'linked-to-wp-title') ) {
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).val( jQuery( "#qtrans_title_" + fvseop_languages[i] ).val() );
      }  
    }
  }
}
function FVSimplerSEO_updateMeta()
{
  meta = FVSimplerSEO_getLocalized('fvseo_description_input');
  <?php if( !$fvseop_options['aiosp_dont_use_excerpt'] ) : ?>
  if( meta.replace(/^\s\s*/, '').replace(/\s\s*$/, '').length == 0 && jQuery("#excerpt").length > 0 ) {
  	meta = jQuery("#excerpt").val().replace(/<\/?([a-z][a-z0-9]*)\b[^>]*>?/gi, '');  
  }
  <?php endif; ?>
  meta_add_dots = '';
  if( meta.length > <?php echo $fvseo->maximum_description_length; ?> ) {
    meta_add_dots = ' ...';
  }
  meta = meta.substr(0, <?php echo $fvseo->maximum_description_length; ?>) + meta_add_dots;
  if(meta == ''){
    meta = 'Fill in your meta description';
  }
  jQuery("p#fvseo_meta").html(meta);
}
function FVSimplerSEO_updateTitle()
{
  title = FVSimplerSEO_getLocalized('fvseo_title_input');
  title_add_dots = '';
  if( title.length > <?php echo $fvseo->maximum_title_length; ?> ) {
    title_add_dots = ' ...';
  }
  title = title.substr(0, <?php echo $fvseo->maximum_title_length; ?>) + title_add_dots;
  if (title == ''){
    if( jQuery("#title").val() ) {
      title = jQuery("#title").val();
    } else {
      title = '<?php echo __('Fill in your title', 'fv_seo'); ?>';
    }
  }
  url = jQuery("#sample-permalink").text();
  jQuery("h2#fvseo_title").html( '<a href="'+url+'">'+title+'</a>');
}
function FVSimplerSEO_getLocalized(input)
{
  if (fvseop_language == 'default') {
  	if( !jQuery("#" + input).hasClass('fvseo_disabled') ) {
    	string = jQuery("#" + input).val();    
    } else {
    	string = '';
    }
  }
  else {
  	if( !jQuery('#' + input + '_' + fvseop_active_lang).hasClass('fvseo_disabled') ) {
    	string = jQuery('#' + input + '_' + fvseop_active_lang).val();
    } else {
    	string = '';
    }
  }    
  return string;
}
jQuery(document).ready(function($) {
  window.setTimeout("fvseo_timeout();", 500);  
  if (fvseop_language == 'default') {
    <?php if( !$title ) : ?>
    if( jQuery( "#title" ).length > 0 ) {
      //jQuery( "#fvseo_title_input" ).val( jQuery( "#title" ).val() );
      jQuery( "#fvseo_title_input" ).css( 'color', '#bbb' );
      jQuery( "#fvseo_title_input" ).addClass( 'linked-to-wp-title' );
    }
    jQuery( "#fvseo_title_input" ).focus( function() {
      jQuery( this ).removeClass( 'linked-to-wp-title' );
      jQuery( this ).css( 'color', '#000' );
    } );
    <?php endif; ?>
  }
  else {
    for (i = 0; i < fvseop_languages.length; i++) {
      if( jQuery( "#qtrans_title_" + fvseop_languages[i] ).val() == jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).val() ) {
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).css( 'color', '#bbb' );
        jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).addClass( 'linked-to-wp-title' );
      }
      jQuery( "#fvseo_title_input_" + fvseop_languages[i] ).focus( function() {
        jQuery( this ).removeClass( 'linked-to-wp-title' ); jQuery( this ).css( 'color', '#000' );
        fvseop_active_lang = jQuery( this ).attr("id").substr('fvseo_title_input_'.length);
      } );
      jQuery( "#fvseo_description_input_" + fvseop_languages[i] ).focus( function() {
        fvseop_active_lang = jQuery( this ).attr("id").substr('fvseo_description_input_'.length);
      } );      
    }
  }  
});
</script>
<style type="text/css">
#fvsimplerseopack th { font-size: 90%; } 
#fvsimplerseopack .inputcounter { font-size: 85%; padding: 0px; text-align: center; background: white; color: #000;  }
#fvsimplerseopack .input { width: 99%; }
#fvsimplerseopack .input[type=checkbox] { width: auto; }
#fvsimplerseopack small { color: #999; }
#fvsimplerseopack abbr { color: #999; margin-right: 10px;}
#fvsimplerseopack small.link {color:#36C;font-size:13px;cursor:pointer;}
#fvsimplerseopack small#fvseo_href { color: #0E774A !important; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;}
#fvsimplerseopack small.link:hover {text-decoration:underline;}
#fvsimplerseopack p#fvseo_meta {margin:0;padding:0; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;max-width:546px;}
#fvsimplerseopack h2#fvseo_title {margin:0;padding:0; color:#2200c1; font-family:arial, sans-serif; font-style:normal; font-size:16px; text-decoration:underline; margin-left:15px; display:inline; padding-bottom:0px; cursor:pointer; line-height: 18px; }
#fvsimplerseopack h2#fvseo_title a { color:#2200c1; }
#fvsimplerseopack .fvseo_disabled { color:#aaa; }

</style>
  <input value="fvseo_edit" type="hidden" name="fvseo_edit" />
  <input type="hidden" name="nonce-fvseopedit" value="<?php echo esc_attr(wp_create_nonce('edit-fvseopnonce')) ?>" />

			<div class="fvseo-noindex" <?php if( $noindex ) echo 'style="display:none;"'; ?>>
        <?php if (function_exists('qtrans_getSortedLanguages')) { ?>
        <?php
          $languages = qtrans_getSortedLanguages();          
          foreach($languages as $language) { ?>
            <?php            
              $localized_title = fvseo_get_localized_string($title, $language); 
            ?>
            <p>
                <?php _e('Long Title:', 'fv_seo') ?> (<?php echo qtrans_getLanguageName($language); ?>) <abbr title="<?php _e('Displayed in browser toolbar and search engine results. It will replace your post title format defined by your template on this single post/page. For advanced customization use Rewrite Titles in Advanced Options.', 'fv_seo') ?> ">(?)</abbr>
                <input id="s<?php echo $language; ?>" class="input" value="<?php echo $localized_title ?>" type="text" name="fvseo_title_<?php echo $language; ?>" onkeydown="countChars(document.post.fvseo_title_<?php echo $language; ?>,document.post.lengthT_<?php echo $language; ?>, '<?php echo $language ?>');" onkeyup="countChars(document.post.fvseo_title_<?php echo $language; ?>,document.post.lengthT_<?php echo $language; ?>, '<?php echo $language ?>');" />
                <br />
                <input id="lengthT_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="lengthT_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_title);?>" />
                <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the title.', 'fv_seo'), intval($fvseo->maximum_title_length)) ?></small>
            </p>
                    
        <?php } ?>
        <?php
          $languages = qtrans_getSortedLanguages();
          foreach($languages as $language) { ?>
            <?php            
              $localized_description = fvseo_get_localized_string($description, $language);
            ?>
            <p>
                <?php _e('Meta Description:', 'fv_seo') ?> (<?php echo qtrans_getLanguageName($language); ?>) <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?>&lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>
                <textarea id="fvseo_description_input_<?php echo $language; ?>" class="input" name="fvseo_description_<?php echo $language; ?>" rows="2" onkeydown="countChars(document.post.fvseo_description_<?php echo $language; ?>,document.post.lengthD_<?php echo $language; ?>, '<?php echo $language ?>')" onkeyup="countChars(document.post.fvseo_description_<?php echo $language; ?>,document.post.lengthD_<?php echo $language; ?>, '<?php echo $language ?>');"><?php echo $localized_description ?></textarea>
                <br />
                <input id="lengthD_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="lengthD_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_description);?>" />
                <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
            </p>
        <?php } ?>
        <?php } else { ?>
        <p>
            <?php _e('Long Title:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in browser toolbar and search engine results. It will replace your post title format defined by your template on this single post/page. For advanced customization use Rewrite Titles in Advanced Options.', 'fv_seo') ?>">(?)</abbr>
            <input id="fvseo_title_input" class="input" value="<?php echo $title ?>" type="text" name="fvseo_title" onkeydown="countChars(document.post.fvseo_title,document.post.lengthT, 'default');" onkeyup="countChars(document.post.fvseo_title,document.post.lengthT, 'default');" />
            <br />
            <input id="lengthT" class="inputcounter" readonly="readonly" type="text" name="lengthT" size="3" maxlength="3" value="<?php echo strlen($title);?>" />
            <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the title.', 'fv_seo'), $fvseo->maximum_title_length) ?></small>
        </p>
        <p>
            <?php
            if( strlen( trim($post->post_excerpt) ) > 0 && strlen( trim($description) ) == 0 && !$fvseop_options['aiosp_dont_use_excerpt'] ) {
            	$meta_description_excerpt = 'Using post excerpt, type your SEO meta description here.';
            } else {
                $meta_description_excerpt = 'Type your SEO meta description here.';
            }
            $fvseo_description_input_description = $description;
            ?>
            <?php _e('Meta Description:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>
            <textarea id="fvseo_description_input" class="input" name="fvseo_description" rows="2" onkeydown="countChars(document.post.fvseo_description,document.post.lengthD, 'default')"
              onkeyup="countChars(document.post.fvseo_description,document.post.lengthD, 'default');" placeholder="<?php echo $meta_description_excerpt; ?>"><?php echo $fvseo_description_input_description ?></textarea>
            <br />
            <input id="lengthD" class="inputcounter" readonly="readonly" type="text" name="lengthD" size="3" maxlength="3" value="<?php echo strlen($description);?>" />
            <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
        </p>
        <?php } ?>
        <div>
            <p><?php _e('SERP Preview:', 'fv_seo') ?> <abbr title="<?php _e('Preview of Search Engine Results Page', 'fv_seo') ?> ">(?)</abbr></p>        
            <h2 id="fvseo_title"><a href="<?php the_permalink(); ?>" target="_blank"><?php echo $title_preview; ?></a></h2>
            <p id="fvseo_meta"><?php echo ($description) ? $description : __("Fill in your meta description", "fv_seo") ?></p>
            <small id="fvseo_href"><?php echo $url; ?></small> - <small class="link"><?php _e('Cached', 'fv_seo') ?></small> - <small class="link"><?php _e('Similar', 'fv_seo') ?></small>
            <br />
        </div>

    <?php if ($fvseop_options['aiosp_show_keywords']) : ?>
        <p>
            <?php _e('Keywords:', 'fv_seo') ?> <small>(comma separated)</small>
            <input class="input" value="<?php echo $keywords ?>" type="text" name="fvseo_keywords" />
        </p>    
    <?php endif; ?>

    
    <?php if (isset($fvseop_options['aiosp_show_custom_canonical']) && $fvseop_options['aiosp_show_custom_canonical']) : ?>
        <p>
            <?php _e('Custom Canonical URL:', 'fv_seo') ?> <abbr title="<?php _e('WARNING - Google will index the URL you enter here instead of the post. Leave empty if you don\'t want to use it.', 'fv_seo') ?>">(?)</abbr>
            <input class="input" value="<?php echo $custom_canonical ?>" type="text" name="fvseo_custom_canonical" />
        </p>    
    <?php endif; ?>    
    
    </div><!--	.fvseo-noindex	-->
		<?php if ( (isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex']) || $noindex ) : ?>
			<div class="fvseo-noindex" <?php if( $noindex ) { echo 'style="display:block;"'; } else { echo 'style="display:none;"'; } ?>>
				<strong>Post won't be indexed by Search Engines and it won't show up in internal site search.</strong>
			</div>
		<?php endif; ?>    

<?php if($post->post_type == 'page') { ?>
    
    <?php if ($fvseop_options['aiosp_show_titleattribute']) : ?>
        <p>
            <?php _e('Title Attribute:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in search engine results', 'fv_seo') ?>">(?)</abbr>
            <input class="input" value="<?php echo $fvseo_titleatr ?>" type="text" name="fvseo_titleatr" size="62"/>
        </p>
    <?php endif; ?>
    
<?php } ?>    

<?php if($post->post_type == 'page' || (isset($fvseop_options['aiosp_show_short_title_post']) && $fvseop_options['aiosp_show_short_title_post']) ) { ?>
        
        <p>
            <?php _e('Short title | Menu Label:', 'fv_seo') ?> 
            <?php if( $post->post_type == 'page' ) : ?> 
            <abbr title="<?php _e('Used in all your page menus. Long Title or Post Title will be used for mouse rollover. Can be called inside of template file with','fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_menulabel',$post->ID); ?&gt;">(?)</abbr>
            <?php else : ?>
            <abbr title="<?php _e('This will automatically replace post title in sidebar. Can be called inside of template file with', 'fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_menulabel',$post->ID); ?&gt;">(?)</abbr>
            <?php endif; ?>
            <input class="input" value="<?php echo $fvseo_menulabel ?>" type="text" name="fvseo_menulabel" size="62"/>
        </p>

<?php } ?>
    
    <?php if ($fvseop_options['aiosp_show_disable']) : ?>
        <p>
            <?php _e('Disable on this page/post:', 'fv_seo')?>
            <input type="checkbox" name="fvseo_disable" <?php if ($fvseo_disable) echo 'checked="checked"'; ?>/>
        </p>
    <?php endif; ?>
    
    
    <?php if ( (isset($fvseop_options['aiosp_show_noindex']) && $fvseop_options['aiosp_show_noindex']) || $noindex || $nofollow) : ?>
        <p>
            <?php _e('Disable post indexing:', 'fv_seo') ?> <abbr title="<?php _e('Only use if you are sure you don\'t want this post to be indexed in search engines!','fv_seo')?>">(<?php _e('Warning','fv_seo') ?>)</abbr><br />
            <input id="fvseo_noindex" class="input" value="1" <?php if( $noindex ) echo 'checked="checked"'; ?> type="checkbox" name="fvseo_noindex" onclick="FVSimplerSEO_noindex_toggle(); return true" />
            <label for="fvseo_noindex">Add noindex</label><br />
            <input id="fvseo_nofollow" class="input" value="1" <?php if( $nofollow ) echo 'checked="checked"'; ?> type="checkbox" name="fvseo_nofollow" />
            <label for="fvseo_nofollow">Add nofollow</label>
        </p>    
    <?php endif; ?>
    
    <?php if ($fvseop_options['fvseo_events']) : ?>
        <p>
            <?php _e('Event Date:', 'fv_seo') ?> <small>(YYYY-MM-DD hh:mm:ss)</small>
            <input class="input" value="<?php echo $event_date ?>" type="text" name="fvseo_event_date" />
        </p>    
    <?php endif; ?>    
    
    <?php if (!function_exists('qtrans_getSortedLanguages')) { ?>
      <script type="text/javascript">
      countChars(document.post.fvseo_description,document.post.lengthD, 'default');
      countChars(document.post.fvseo_title,document.post.lengthT, 'default');
      </script>
    <?php } ?>
<?php
}

function fvseo_get_localized_string($string, $language)
{
  $strings_array = explode('&lt;!--:--&gt;', $string);
  $language_code =  '&lt;!--:' . $language . '--&gt;';
  foreach($strings_array as $string) {
    if (substr($string, 0, strlen($language_code)) == $language_code) {
      return substr($string, strlen($language_code)); 
    }  
  }
}

function fvseo_meta_box_add()
{
	add_meta_box('fvsimplerseopack',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'post');
	add_meta_box('fvsimplerseopack',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'page');
   
   global $fvseop_options;
   if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) {
      add_action('admin_head', 'fvseo_check_empty_clientside', 1);
   } else {
      fvseo_removetitlechecker();
   }

if( false === get_option( 'aiosp-shorten-link-install' ) )
      add_option( 'aiosp-shorten-link-install', date( 'Y-m-d H:i:s' ) );
}

if( isset($fvseop_options['aiosp_can']) && ( $fvseop_options['aiosp_can'] == '1' || $fvseop_options['aiosp_can'] === 'on') ) {
	remove_action('wp_head', 'rel_canonical');
}

if( !isset($fvseop_options['fvseo_shortlinks']) || ( $fvseop_options['fvseo_shortlinks'] != '1' && strcmp($fvseop_options['fvseo_shortlinks'],'on') ) ) {
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}

add_action('admin_menu', 'fvseo_meta_box_add');
add_action('wp_list_pages', 'fvseop_list_pages');
add_action('wp_nav_menu', 'fvseop_nav_menu');

add_action('admin_init', array($fvseo, 'admin_init') );
add_action('init', array($fvseo, 'init'));
add_action('template_redirect', array($fvseo, 'template_redirect'));
add_action('wp_head', array($fvseo, 'wp_head'));
add_action('wp_head', array($fvseo, 'hatom_microformat_replace'));
add_action('wp_head', array($fvseo, 'remove_canonical'), 0 );
add_action('wp_head', array($fvseo, 'google_authorship') );
add_action('wp_head', array($fvseo, 'social_meta_tags') );
add_action('wp_head', array($fvseo, 'script_header_content') );
add_action('wp_footer', array($fvseo, 'script_footer_content'), 999999 );
add_action('edit_post', array($fvseo, 'post_meta_tags'));
add_action('publish_post', array($fvseo, 'post_meta_tags'));
add_action('save_post', array($fvseo, 'post_meta_tags'));
add_action('edit_page_form', array($fvseo, 'post_meta_tags'));
add_action('admin_menu', array($fvseo, 'admin_menu'));

add_filter( 'get_user_option_closedpostboxes_fv_simpler_seo_settings', array($fvseo, 'fv_simpler_seo_settings_closed_meta_boxes' ) );

add_filter( 'wp_unique_post_slug', array( $fvseo, 'fvseo_unique_post_slug' ), 99, 6 );
add_filter( 'searchwp_exclude', array( $fvseo , 'my_searchwp_exclude'), 10, 3 );
add_filter( 'get_previous_post_where', array( $fvseo, 'get_adjacent_post_where' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'get_next_post_where', array( $fvseo, 'get_adjacent_post_where' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'pre_get_posts', array( $fvseo, 'pre_get_posts' ) );	//	make sure noindex posts don't turn up in the search
add_filter( 'wp_list_pages_excludes', array( $fvseo, 'wp_list_pages_excludes' ) );	//	make sure noindex pages don't get into automated wp menus


add_filter( 'get_sidebar', array( $fvseo, 'initiate_the_title_change' ) );
add_filter( 'yarpp_results', array( $fvseo, 'yarpp_results' ), 10, 2 );
add_filter( 'the_content', array( $fvseo, 'replace_attachment_links' ), 999 );

add_filter( 'request', array($fvseo, 'filter_request_sitemap'), 0 );

add_filter( 'manage_edit-category_columns', array($fvseo,'manage_category_columns') );
add_filter( 'manage_category_custom_column', array($fvseo,'manage_category_custom_columns'), 10, 3 );
add_action( 'init', array($fvseo,'manage_category_process_action') );

add_action( 'wp_ajax_fv_foliopress_ajax_pointers',  array($fvseo,'ajax__pointers' ) );


//this function removes final periods from post slugs as such urls don't work with nginx; it only gets applied if the "Slugs with periods" plugin has replaced the original sanitize_title function
function sanitize_title_no_final_period ($title) {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        $title = remove_accents($title);
        if (seems_utf8($title)) {
                if (function_exists('mb_strtolower')) {
                        $title = mb_strtolower($title, 'UTF-8');
                }
                $title = utf8_uri_encode($title);
        }

        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = preg_replace('/[^%a-z0-9\. _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-\.');

        return $title;
}

function replace_title_sanitization() {
	if ( has_filter( 'sanitize_title', 'sanitize_title_with_dashes_and_period' ) ) {
		remove_filter ('sanitize_title', 'sanitize_title_with_dashes_and_period');
		add_filter ('sanitize_title', 'sanitize_title_no_final_period');
	}
}

replace_title_sanitization();
add_action( 'plugins_loaded', 'replace_title_sanitization' );

function fvseo_check_empty_clientside() {
?>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function() {
   var target = null;
    jQuery('#post :input, #post-preview').focus(function() {
        target = this;
        // console.log(target);
    });
      
   jQuery("#post").submit(function(){
    
      if(jQuery(target).is(':input') && ( jQuery(target).val() == 'Publish' || jQuery(target).val() == 'Update' ) && jQuery("#title").val() == '') {
         //console.log(target);
         alert("<?php _e('Your post\'s TITLE is empty, so it cannot be published!', 'fv_seo')  ?>");
         
         jQuery('#ajax-loading').removeAttr('style');
         jQuery('#save-post').removeClass('button-disabled');
         jQuery('#publish').removeClass('button-primary-disabled');
         return false;
      } 
   });
   
   jQuery("#publish").hover( function() {// Publish button
      if (jQuery("#title").val() == '') {
         jQuery("#major-publishing-actions").append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s TITLE is empty!', 'fv_seo') ?></b></div>"
         ));
      } 
      if (jQuery("#fvseo_description_input").val() == '') {
         jQuery("#major-publishing-actions").append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s DESCRIPTION is empty!', 'fv_seo') ?></b></div>"
         ));
      }
   }, function() {
      jQuery(".hovered-warning").remove();
   });
   
   jQuery("#minor-publishing-actions").hover( function() {// Draft, Preview
      if (jQuery("#title").val() == '') {
         jQuery(this).append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s TITLE is empty!', 'fv_seo') ?></b></div>"
         ));
      }
      if (jQuery("#fvseo_description_input").val() == '') {
         jQuery(this).append(jQuery(
            "<div class=\"hovered-warning\" style=\"text-align: left;\"><b><span style=\"color:red;\"><?php _e('Warning', 'fv_seo') ?></span>: <?php _e('Your post\'s DESCRIPTION is empty!', 'fv_seo') ?></b></div>"
         ));
      }
   }, function() {
      jQuery(".hovered-warning").remove();
   });
});
</script>
<?php
}

function fvseo_removetitlechecker() {
   if ( has_action( 'admin_head', 'fvseo_check_empty_clientside' ) ) {
      remove_action( 'admin_head', 'fvseo_check_empty_clientside' );
   }
}

if( is_admin() ){
   register_deactivation_hook( __FILE__, 'fvseo_removetitlechecker' );
}

function fvseo_remove_category_list_rel( $output ) {
    // Remove rel attribute from the category list
    return str_replace( ' rel="category tag"', '', $output );
}

add_filter('plugin_action_links', 'fvseo_plugin_action_links', 10, 2);

function fvseo_plugin_action_links($links, $file) {
  	$plugin_file = basename(__FILE__);
  	if (basename($file) == $plugin_file) {
      $settings_link =  '<a href="'.site_url('wp-admin/options-general.php?page=fv_simpler_seo').'"> '.__('Settings', 'fv_seo').'</a>';
  		array_unshift($links, $settings_link);
  	}
  	return $links;
}


function fvseo_check_search_engine_visibility(){
  if(!get_option('blog_public'))
        echo '<div class="error fade"><p> Warning: Search Engine Visibility is turned off. Your site is not visible to search engines and will loose traffic. <a href="'.get_bloginfo( 'wpurl' ).'/wp-admin/options-reading.php">(Search Engine Visibility)</a> . </p></div>';
}

add_action('admin_notices','fvseo_check_search_engine_visibility');

if( isset($fvseop_options['aiosp_remove_category_rel']) && $fvseop_options['aiosp_remove_category_rel'] ) {  
    add_filter( 'wp_list_categories', 'fvseo_remove_category_list_rel' );
    add_filter( 'the_category', 'fvseo_remove_category_list_rel' );
}

add_action( 'activate_' .plugin_basename(__FILE__), array( $fvseo, 'activate' ) );

if( !isset($fvseop_options['fvseo_hentry']) || ( $fvseop_options['fvseo_hentry'] != '1' && strcmp($fvseop_options['fvseo_hentry'],'on') ) ) {
    add_filter('post_class', array( $fvseo, 'post_class' ) );
    add_filter('the_category', array( $fvseo, 'microdata_category_links' ) );
}

if( isset($fvseop_options['fvseo_events']) && $fvseop_options['fvseo_events'] ) {
  include( dirname(__FILE__).'/fv-events.php' );
}

/* Disable Genesis SEO modules */
add_action( 'init', 'fvseo_genesis_disable_seo_functons' );

function fvseo_genesis_disable_seo_functons() {
  if( !defined("GENESIS_SEO_SETTINGS_FIELD") ){
    return;
  }
  
  if( isset( $_GET['page'] ) && $_GET['page'] == 'seo-settings' ){
    add_action( 'admin_notices', 'fvseo_genesis_waring' );
  }

  // remove_filter('wp_title', 'genesis_default_title', 10, 3); 
  remove_action('get_header', 'genesis_doc_head_control'); 
  remove_action('genesis_meta','genesis_seo_meta_description'); 
  remove_action('genesis_meta','genesis_seo_meta_keywords'); 
  remove_action('genesis_meta','genesis_robots_meta'); 
  remove_action('wp_head','genesis_canonical'); 
  add_action('wp_head', 'rel_canonical'); 

  remove_action('admin_menu', 'genesis_add_inpost_seo_box'); 
  remove_action('save_post', 'genesis_inpost_seo_save', 1, 2); 

  remove_action('admin_init', 'genesis_add_taxonomy_seo_options'); 
  remove_action('edit_term', 'genesis_term_meta_save', 10, 2); 

  remove_action('show_user_profile', 'genesis_user_seo_fields'); 
  remove_action('edit_user_profile', 'genesis_user_seo_fields'); 
  remove_action('personal_options_update', 'genesis_user_meta_save'); 
  remove_action('edit_user_profile_update', 'genesis_user_meta_save'); 

  remove_theme_support('genesis-seo-settings-menu'); 
  add_filter('pre_option_' . GENESIS_SEO_SETTINGS_FIELD, '__return_empty_array'); 
}

function fvseo_genesis_waring(){
  echo "\n<div class='error'><p>";
  echo "<strong>Genesis SEO is disabled:</strong> ";

  $simpler_seo_link = get_admin_url( null, 'options-general.php?page=fv_simpler_seo' );
  _e( 'These settings won\'t be applied on frontend. Use <a href="'.$simpler_seo_link.'">FV Simpler SEO</a> instead.', 'fv_seo' );
  echo "</p></div>";
}