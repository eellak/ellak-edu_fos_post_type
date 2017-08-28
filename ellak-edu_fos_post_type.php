<?php

/**
 * ellak - Post Type for mitroo_logismikou archive page.
 *
 * @package     none
 * @author      David Bromoiras
 * @copyright   2016 Your Name or Company Name
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Mitroo Logismikou Post Type.
 * Plugin URI:  Post Type for mitroo_logismikou archive page.
 * Description: .
 * Version:     0.1
 * Author:      David Bromoiras
 * Author URI:  https://www.anchor-web.gr
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txtd
 *
 **/

  /* PLUGIN DOCUMENTATION AT https://team.ellak.gr/projects/sites/wiki/Greek-github-contrs/ */
if (! post_type_exists('edu_fos')) {
    function add_edu_fos_post_type() {
        $labels = array(
            'name' => 'Educational FOS',
        );
        $description = 'Καταχωρήσεις ελλακ που χρησιμοποιείται στην εκπαίδευση';
        $args = array(
            'labels' => $labels, 
            'description' => $description, 
            'has_archive'=>true, 
            'public' => true, 
            'show_ui' => true, 
            'show_in_menu' => true, 
            'supports' => array('title', 'editor', 'custom-fields'), 
            'exclude_from_search'=>false, 
            'publicly_querable'=>true,
            );
        register_post_type('edu_fos', $args);
    }
    //register_activation_hook(__FILE__, 'add_greek_github_contributor_post_type');
    add_action('init', 'add_edu_fos_post_type');
    
    add_action('pre_get_posts', 'set_edu_fos_per_page_number');
    function set_edu_fos_per_page_number($query){
        if(is_post_type_archive('edu_fos')){
            $query->set('posts_per_page', 40);
            return $query;
        }
    }
    
    add_action('init', 'fos_taxonomies');
    function fos_taxonomies(){
        $labels=array('name'=>'Θεματική');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_thematiki', 'edu_fos', $args);
        
        $labels=array('name'=>'Γνωστικό Αντικείμενο');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_antikimeno', 'edu_fos', $args);
        
        $labels=array('name'=>'Εκπαιδευτική Βαθμίδα');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_vathmida', 'edu_fos', $args);
        
        $labels=array('name'=>'Άδεια');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_adia', 'edu_fos', $args);
        
        $labels=array('name'=>'Είδος');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_idos', 'edu_fos', $args);
        
        $labels=array('name'=>'Λειτουργικό');
        $args=array('labels'=>$labels);
        register_taxonomy('edu_fos_litourgiko', 'edu_fos', $args);
    }
    
//    add_action('pre_get_posts', 'ellak_set_contributors_order_by');
//    function ellak_set_contributors_order_by($query){
//        if(isset($query->query_vars['post_type']) && strcmp($query->query_vars['post_type'], 'github_contributor')){
//            $contr_order_string=get_query_var('contr_order');
//            if(isset($contr_order_string) && !strcmp($contr_order_string, "")){
//            error_log($contr_order_string.'blah');
////                switch($contr_order_string){
////                    case 'followers':
////                        break;
////                    case 'language':
////                        $query->set('meta_key', 'contributor_full_name');
////                        error_log('inside');
////                        break;
////                    default:
////                        $query->set('orderby', 'meta_value_num');
////                        $query->set('meta_key', 'contributions_number');
////                        $query->set('order', 'DESC');
////                        break;
////                }
//            }
//        }
//    }
}

