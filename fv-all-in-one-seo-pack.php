<?php
/*
Plugin Name: FV Simpler SEO
Plugin URI: http://foliovision.com/seo-tools/wordpress/plugins/fv-all-in-one-seo-pack
Description: Simple and effective SEO. Non-invasive, elegant. Ideal for client facing projects. | <a href="options-general.php?page=fv_simpler_seo">Options configuration panel</a>
Version: 1.9.6
Author: Foliovision
Author URI: http://foliovision.com
*/

$fv_simpler_seo_version = '1.9.6';
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
  "aiosp_author_title_format"=>'%author% | %blog_title%',
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
  'aiosp_dont_use_desc_for_excerpt'=>0,
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
	global $post, $fvseo, $fvseop_options;

	if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) {
		// Enqueue Block Editor styles for the meta description modal
		wp_enqueue_style('wp-components');
		wp_enqueue_style('wp-block-editor');
	}
	
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
  if( typeof field.value.length == "undefined" ) return;

  var el_description_length = jQuery('#fvseo_description_length'),
    el_description_length_lang = jQuery('#fvseo_description_length_' + lang),
    el_title_length = jQuery('#fvseo_title_length'),
    el_title_length_lang = jQuery('#fvseo_title_length_' + lang);
  
  if ( 'SPAN' === cntfield.tagName ) {
    cntfield.innerHTML = field.value.length;
  } else {
    cntfield.value = field.value.length;
  }

  if( field.name == 'fvseo_description' || field.name == 'fvseo_description' + '_' + lang ) {
    var background = 'red',
      color = 'white';

	  if( field.value.length > <?php echo $fvseo->maximum_description_length; ?> ) {
	  	background = 'red';
	  } else if( field.value.length >= <?php echo $fvseo->maximum_description_length_green; ?> ) {
	  	background = 'green';
	  } else if( field.value.length >= <?php echo $fvseo->maximum_description_length_yellow; ?> ) {
	  	background = 'yellow';
      color = 'black';
	  }

    if (lang == 'default') {
      el_description_length.css('background', background).css('color', color);
    }

    jQuery( cntfield ).css('background', background).css('color', color);
  }
  else if( field.name == 'fvseo_title' || field.name == 'fvseo_title' + '_' + lang ) {
    var background = 'white',
      color = 'black';

	  if( field.value.length > <?php echo $fvseo->maximum_title_length; ?> ) {
	  	background = 'red';
      color = 'white';
	  }

    if (lang == 'default') {
      el_title_length.css('background', background).css('color', color);
    }

    jQuery( cntfield ).css('background', background).css('color', color);
  }
}
function fvseo_timeout() {
  FVSimplerSEO_updateTitle();
  FVSimplerSEO_updateTitleFromWPTitle();
  FVSimplerSEO_updateMeta();
  FVSimplerSEO_updateLink();
  window.setTimeout("fvseo_timeout();", 1000);
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
#fv-simpler-seo th { font-size: 90%; } 
#fv-simpler-seo .inputcounter { font-size: 85%; padding: 0px; text-align: center; background: white; color: #000;  }
#fv-simpler-seo .input { width: 99%; }
#fv-simpler-seo .input::placeholder { color: rgb(187, 187, 187) }
#fv-simpler-seo .input[type=checkbox] { width: auto; }
#fv-simpler-seo small { color: #999; }
#fv-simpler-seo abbr { color: #999; margin-right: 10px;}
#fv-simpler-seo small.link {color:#36C;font-size:13px;cursor:pointer;}
#fv-simpler-seo small#fvseo_href { color: #0E774A !important; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;}
#fv-simpler-seo small.link:hover {text-decoration:underline;}
#fv-simpler-seo p#fvseo_meta {margin:0;padding:0; margin-left:15px; font-family:arial, sans-serif;font-style:normal;font-size:13px;max-width:546px;}
#fv-simpler-seo h2#fvseo_title {margin:0;padding:0; color:#2200c1; font-family:arial, sans-serif; font-style:normal; font-size:16px; text-decoration:underline; margin-left:15px; display:inline; padding-bottom:0px; cursor:pointer; line-height: 18px; }
#fv-simpler-seo h2#fvseo_title a { color:#2200c1; }
#fv-simpler-seo .fvseo_disabled { color:#aaa; }

.fv_simpler_seo_warning {
  border-left: 2px solid #d63638;
  border-top: 1px solid #dcdcde;
  font-weight: bold;
  color: #b32d2e;
  display: block;
  padding: 1em;
  text-decoration: none;
}
.fv_simpler_seo_warning span {
  color: red;
}
.editor-header__settings .fv_simpler_seo_warning {
  width: 19em;
}
/* Modal styles are now using WordPress Block Editor classes */
.fv-seo-modal .components-modal__frame {
  max-width: 600px;
  width: 100%;
}
.fv-seo-modal p.help-text {
  margin-top: 0;
}
.fv-seo-modal #fv-seo-modal-character-count span {
  padding: .5em;
}
/* Styles which are not included in the WP Components CSS are added inline by their JS code */
.fv-seo-modal .components-textarea-control__input {
  width: 100%; line-height: 20px; padding: 9px 11px; border-radius: 2px; border: 1px solid
}
.fv-seo-modal .items-justified-right {
  display: flex;
  justify-content: flex-end;
}
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
                <input id="fvseo_title_input_<?php echo $language; ?>" class="input" value="<?php echo $localized_title ?>" type="text" name="fvseo_title_<?php echo $language; ?>"
                  onkeydown="countChars( this, document.getElementById('fvseo_title_length_<?php echo $language; ?>'), '<?php echo $language ?>');"
                  onkeyup="countChars( this, document.getElementById('fvseo_title_length_<?php echo $language; ?>'), '<?php echo $language ?>');" />
                <br />
                <input id="fvseo_title_length_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="fvseo_title_length_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_title);?>" />
                <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the title.', 'fv_seo'), intval($fvseo->maximum_title_length)) ?></small>
            </p>
                    
        <?php } ?>
        <?php
          $languages = qtrans_getSortedLanguages();
          ?>
          <div id="fv-seo-description-input-container">
            <?php foreach($languages as $language) { ?>
              <?php            
                $localized_description = fvseo_get_localized_string($description, $language);
              ?>
              <p>
                  <?php _e('Meta Description:', 'fv_seo') ?> (<?php echo qtrans_getLanguageName($language); ?>) <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?>&lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>
                  <textarea id="fvseo_description_input_<?php echo $language; ?>" class="input" name="fvseo_description_<?php echo $language; ?>" rows="2" 
                    onkeydown="countChars( this, document.getElementById('fvseo_description_length_<?php echo $language; ?>'), '<?php echo $language ?>')" 
                    onkeyup="countChars( this, document.getElementById('fvseo_description_length_<?php echo $language; ?>'), '<?php echo $language ?>');"><?php echo $localized_description ?></textarea>
                  <br />
                  <input id="fvseo_description_length_<?php echo $language; ?>" class="inputcounter" readonly="readonly" type="text" name="fvseo_description_length_<?php echo $language; ?>" size="3" maxlength="3" value="<?php echo strlen($localized_description);?>" />
                  <small><?php printf(__(' characters. Most search engines use a maximum of %s chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
              </p>
            <?php } ?>
          </div>
        <?php } else { ?>
        <p>
            <?php _e('Long Title:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in browser toolbar and search engine results. It will replace your post title format defined by your template on this single post/page. For advanced customization use Rewrite Titles in Advanced Options.', 'fv_seo') ?>">(?)</abbr>
            <input id="fvseo_title_input" class="input" value="<?php echo $title ?>" type="text" name="fvseo_title" onkeydown="countChars( this, document.getElementById('fvseo_title_length'), 'default');" onkeyup="countChars( this, document.getElementById('fvseo_title_length'), 'default');" />
            <br />
            <input id="fvseo_title_length" class="inputcounter" readonly="readonly" type="text" name="fvseo_title_length" size="3" maxlength="3" value="<?php echo strlen($title);?>" />
            <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the title.', 'fv_seo'), $fvseo->maximum_title_length) ?></small>
        </p>
        <p>
            <?php
            if( strlen( trim($post->post_excerpt) ) > 0 && strlen( trim($description) ) == 0 && !$fvseop_options['aiosp_dont_use_excerpt'] ) {
            	$meta_description_excerpt = 'Using post excerpt, type your SEO meta description here.';
            } else {
                $meta_description_excerpt = 'Type a one sentence introduction to your article.';
            }
            $fvseo_description_input_description = $description;
            ?>
            <?php _e('Meta Description:', 'fv_seo') ?> <abbr title="<?php _e('Displayed in search engine results. Can be called inside of template file with', 'fv_seo') ?> &lt;?php echo get_post_meta('_aioseop_description',$post->ID); ?&gt;">(?)</abbr>

            <div id="fv-seo-description-input-container">
              <textarea id="fvseo_description_input" class="input" name="fvseo_description" rows="2" onkeydown="countChars( this, document.getElementById('fvseo_description_length'), 'default')"
                onkeyup="countChars( this, document.getElementById('fvseo_description_length'), 'default');" placeholder="<?php echo $meta_description_excerpt; ?>"><?php echo $fvseo_description_input_description ?></textarea>
              <br />
              <input id="fvseo_description_length" class="inputcounter" readonly="readonly" type="text" name="fvseo_description_length" size="3" maxlength="3" value="<?php echo strlen($description);?>" />
              <small><?php printf(__(' characters. Most search engines use a maximum of %d chars for the description.', 'fv_seo'), $fvseo->maximum_description_length) ?></small>
            </div>
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
      countChars( document.getElementById('fvseo_description_input'), document.getElementById('fvseo_description_length'), 'default');
      countChars( document.getElementById('fvseo_title_input'), document.getElementById('fvseo_title_length'), 'default');
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
  add_meta_box('fv-simpler-seo',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'post', 'normal', 'high');
  add_meta_box('fv-simpler-seo',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'page', 'normal', 'high');
  add_meta_box('fv-simpler-seo',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'download', 'normal', 'high');
  add_meta_box('fv-simpler-seo',__('FV Simpler SEO', 'fv_seo'), 'fvseo_meta', 'product', 'normal', 'high');
  
  add_action('admin_head', 'fvseo_check_empty_clientside', 1);

  if( false === get_option( 'aiosp-shorten-link-install' ) ) {
    add_option( 'aiosp-shorten-link-install', date( 'Y-m-d H:i:s' ) );
  }
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
add_action('wp_head', array($fvseo, 'remove_canonical_for_custom_canonical'), 0 );
add_action('wp_head', array($fvseo, 'google_authorship') );
add_action('wp_head', array($fvseo, 'social_meta_tags') );
add_action('wp_head', array($fvseo, 'script_header_content') );
add_action('wp_footer', array($fvseo, 'script_footer_content'), 999999 );
add_action('amp_post_template_analytics', array($fvseo, 'amp_post_template_analytics') );
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

// Genesis puts up canonical URL for paged archive and while doing so it accepts any kind of query argument for it. We remove that here.
add_filter( 'genesis_canonical', array( $fvseo, 'fix_genesis_paged_archive_canonical_url' ) );

add_action( 'wp_ajax_fv_foliopress_ajax_pointers',  array($fvseo,'ajax__pointers' ) );

add_filter( 'get_canonical_url', array( $fvseo, 'fix_get_canonical_url_comment_page' ), 10, 2 );

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
  global $fvseo, $fvseop_options;
?>
<script language="javascript" type="text/javascript">
jQuery( function($) {
  var target = null;
  jQuery('#post :input, #post-preview').on( 'focus', function() {
    target = this;
  });

  <?php // Prevent post saving if meta description is empty and fvseo_publ_warnings is enabled ?>
  jQuery("#post").on( 'submit', function(){
    if ( jQuery(target).is(':input') && ( jQuery(target).val() == 'Publish' || jQuery(target).val() == 'Update' ) && jQuery("#fvseo_description_input").val().length < <?php echo absint( $fvseo->maximum_description_length_yellow ); ?> ) {
      if ( jQuery( '#fvseo_noindex' ).prop( 'checked' ) ) {
        $( '.fv_simpler_seo_warning' ).remove();
        return;
      }

      <?php if ( $fvseop_options['fvseo_publ_warnings'] == 1 ) : ?>
        // Check if modal already exists to prevent multiple modals
        if ($('.fv-seo-modal').length > 0) {
          return false;
        }

        // Show the meta description field in a modal
        var $modal = $('\
<div class="components-modal__screen-overlay fv-seo-modal">\
  <div class="components-modal__frame" role="dialog" aria-labelledby="fv-seo-modal-header" tabindex="-1">\
    <div class="components-modal__content" role="document">\
      <div class="components-modal__header">\
        <div class="components-modal__header-heading-container">\
          <h1 id="fv-seo-modal-header" class="components-modal__header-heading"><?php _e("Meta Description Required", "fv_seo"); ?></h1>\
        </div>\
        <div class="components-spacer"></div>\
        <button type="button" class="components-button is-small has-icon fv-seo-modal-close" aria-label="<?php _e("Close", "fv_seo"); ?>">\
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false">\
            <path d="m13.06 12 6.47-6.47-1.06-1.06L12 10.94 5.53 4.47 4.47 5.53 10.94 12l-6.47 6.47 1.06 1.06L12 13.06l6.47 6.47 1.06-1.06L13.06 12Z"></path>\
          </svg>\
        </button>\
      </div>\
      <div class="components-modal__body">\
        <p class="help-text"><?php _e("Please write a meta-description.", "fv_seo"); ?> <span class="dashicons dashicons-info" title="<?php _e("The metadescription is often used by search engines as a default summary of the page. It should be between 120 and 145 characters.", "fv_seo"); ?>"></span></p>\
        <div class="components-tools-panel-item">\
          <div class="components-base-control">\
            <div class="components-base-control__field">\
              <textarea name="fvseo_description" class="components-textarea-control__input" rows="4"></textarea>\
            </div>\
            <p id="fv-seo-modal-character-count"><span>0</span> / 145 characters</p>\
          </div>\
        </div>\
      </div>\
      <div class="components-modal__footer">\
        <div class="components-flex components-h-stack items-justified-right">\
          <button type="button" id="fv-seo-modal-publish" class="components-button is-next-40px-default-size is-primary"><?php _e("Publish", "fv_seo"); ?></button>\
        </div>\
      </div>\
    </div>\
  </div>\
</div>');

        // Add the modal to the page
        $('body').append($modal);

        // Close modal when clicking outside of it or on the close button
        $modal.on('click', function(e) {
          if ($(e.target).is('.fv-seo-modal') || $(e.target).closest('.fv-seo-modal-close').length) {
            $(this).remove();
          }
        });

        // Set up the publish button click handler
        $('#fv-seo-modal-publish').on('click', function() {
          $('#publish').trigger('click');
        });
        
        countChars( $modal.find('textarea')[0], $( '#fv-seo-modal-character-count span')[0], 'default');

        // Sync the modal field with the main field
        $modal.find('textarea')
          .on('keydown keyup', function() {
            $('#fvseo_description_input')
              .val( $(this).val() )
              .trigger('keyup');

            countChars( this, $( '#fv-seo-modal-character-count span')[0], 'default');
          })
          .val( $('#fvseo_description_input').val() )
          .trigger('keyup');

        // Focus on the meta description field
        $('#fvseo_description_input_modal').focus();
        
        // Prevent form submission
        jQuery('#ajax-loading').removeAttr('style');
        jQuery('#save-post').removeClass('button-disabled');
        jQuery('#publish').removeClass('button-primary-disabled');
        return false;
      <?php endif; ?>
    } 
  });

  function show_missing_seo_warnings() {
    if ( jQuery( '#fvseo_noindex' ).prop( 'checked' ) ) {
      $( '.fv_simpler_seo_warning' ).remove();
      return;
    }

    <?php // Selectors for: Classic Editor, Block Editor ?>
    let where = $( '#major-publishing-actions, .editor-header__settings .is-primary' );

    <?php // When using Gutenberg .editor-post-save-draft might not be there yet, so try again later ?>
    if ( 0 === where.length ) {
      setTimeout( show_missing_seo_warnings, 1000 );
      return;
    }

    $( '.fv_simpler_seo_warning' ).remove();

    if ( $("#fvseo_description_input").val() == '') {
      let warning = '<a href="#" onclick="document.getElementById(\'fv-simpler-seo\').scrollIntoView({behavior: \'smooth\'}); document.getElementById(\'fvseo_description_input\').focus(); return false" class="fv_simpler_seo_warning"><?php _e('Please add a meta description', 'fv_seo') ?></a>';

      <?php // Alternative placement for Block Editor ?>
      if ( where.hasClass( 'is-primary' ) ) {
        where.before( warning );
      } else {
        where.after( warning );
      }
    }
  }

  $( "#title, #fvseo_description_input, #fvseo_noindex" ).on( 'change keyup', function() {
    show_missing_seo_warnings();
  });

  <?php // Show instantly if editing a post ?>
  if ( location.href.match( /post\.php/ ) ) {
    show_missing_seo_warnings();

  <?php // If it's a new post wait until user is going to save it ?>
  } else {
    function show_missing_seo_warnings_init() {
      <?php // Selectors for: Classic Editor, Block Editor ?>
      let where = $( '#submitdiv, .edit-post-header' );

      <?php // When using Gutenberg .edit-post-header might not be there yet, so try again later ?>
      if ( 0 === where.length ) {
        setTimeout( show_missing_seo_warnings_init, 1000 );
        return;
      }

      where.on( 'mouseenter', show_missing_seo_warnings );
    }

    show_missing_seo_warnings_init();
  }

});
</script>
<?php
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
  if( ! function_exists( 'genesis_disable_seo' ) ) {
    return;
  }
  
  if( isset( $_GET['page'] ) && $_GET['page'] == 'seo-settings' ){
    add_action( 'admin_notices', 'fvseo_genesis_waring' );
  }

  genesis_disable_seo();
}

function fvseo_genesis_waring(){
  echo "\n<div class='error'><p>";
  echo "<strong>Genesis SEO is disabled:</strong> ";

  $simpler_seo_link = get_admin_url( null, 'options-general.php?page=fv_simpler_seo' );
  _e( 'These settings won\'t be applied on frontend. Use <a href="'.$simpler_seo_link.'">FV Simpler SEO</a> instead.', 'fv_seo' );
  echo "</p></div>";
}

/**
 * Register the important post meta field to make sure they can be updated using XML-RCP tools
 */
foreach(
  array(
    '_aioseop_title' => 'FV Long Title',
    '_aioseop_description' => 'FV Meta Description',
  ) as $meta_key => $description
) {
  register_meta( 'post', $meta_key, array(
    'auth_callback' => 'fv_simpler_seo_meta_fields_auth_always_allow',
    'default' => '',
    'description' => $description,
    'sanitize_callback' => 'fv_simpler_seo_meta_fields_no_sanitization', 
    'show_in_rest' => true,
    'single' => true,
    'type' => 'string'
  ) );  
}

function fv_simpler_seo_meta_fields_no_sanitization( $meta_value, $meta_key, $meta_type ) {
  return $meta_value;
}

function fv_simpler_seo_meta_fields_auth_always_allow( $allowed, $meta_key, $post_id, $user_id, $cap, $caps ) {
  return true;
}
