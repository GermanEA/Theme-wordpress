<?php
/*
    Plugin Name: Enseco - Post Types
    Plugin URI: 
    Description: Agrega post types al sitio
    Version: 1.0.0
    Author: Germán Estrade 
    Author URI: https://enseco.es
    Text Domain: enseco
    License: GPL2
    License URI: https://www.gnu.org/licences/gpl-2.0.html

*/

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type Conciertos
function enseco_conciertos_post_type() {

	$labels = array(
		'name'                  => _x( 'Conciertos', 'Post Type General Name', 'enseco' ),
		'singular_name'         => _x( 'Concierto', 'Post Type Singular Name', 'enseco' ),
		'menu_name'             => __( 'Conciertos', 'enseco' ),
		'name_admin_bar'        => __( 'Concierto', 'enseco' ),
		'archives'              => __( 'Archivo', 'enseco' ),
		'attributes'            => __( 'Atributos', 'enseco' ),
		'parent_item_colon'     => __( 'Concierto padre', 'enseco' ),
		'all_items'             => __( 'Todos los Conciertos', 'enseco' ),
		'add_new_item'          => __( 'Agregar Concierto', 'enseco' ),
		'add_new'               => __( 'Agregar Concierto', 'enseco' ),
		'new_item'              => __( 'Nueva Concierto', 'enseco' ),
		'edit_item'             => __( 'Editar Concierto', 'enseco' ),
		'update_item'           => __( 'Actualizar Concierto', 'enseco' ),
		'view_item'             => __( 'Ver Concierto', 'enseco' ),
		'view_items'            => __( 'Ver Concierto', 'enseco' ),
		'search_items'          => __( 'Buscar Concierto', 'enseco' ),
		'not_found'             => __( 'No encontrado', 'enseco' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'enseco' ),
		'featured_image'        => __( 'Imagen destacada', 'enseco' ),
		'set_featured_image'    => __( 'Guardar imagen destacada', 'enseco' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'enseco' ),
		'use_featured_image'    => __( 'Utilizar como imagen destacada', 'enseco' ),
		'insert_into_item'      => __( 'Insertar en Concierto', 'enseco' ),
		'uploaded_to_this_item' => __( 'Agregado en Concierto', 'enseco' ),
		'items_list'            => __( 'Lista de Concierto', 'enseco' ),
		'items_list_navigation' => __( 'Navegación de Concierto', 'enseco' ),
		'filter_items_list'     => __( 'Filtrar Concierto', 'enseco' ),
	);
	$args = array(
		'label'                 => __( 'Concierto', 'enseco' ),
		'description'           => __( 'Conciertos para el sitio', 'enseco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 1,
        'menu_icon'             => 'dashicons-playlist-audio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'enseco_concierto', $args );

}
add_action( 'init', 'enseco_conciertos_post_type', 0 );

// Registrar Custom Post Type Videos
function enseco_videos_post_type() {

	$labels = array(
		'name'                  => _x( 'Videos', 'Post Type General Name', 'enseco' ),
		'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'enseco' ),
		'menu_name'             => __( 'Videos', 'enseco' ),
		'name_admin_bar'        => __( 'Video', 'enseco' ),
		'archives'              => __( 'Archivo', 'enseco' ),
		'attributes'            => __( 'Atributos', 'enseco' ),
		'parent_item_colon'     => __( 'Video padre', 'enseco' ),
		'all_items'             => __( 'Todos los Videos', 'enseco' ),
		'add_new_item'          => __( 'Agregar Video', 'enseco' ),
		'add_new'               => __( 'Agregar Video', 'enseco' ),
		'new_item'              => __( 'Nueva Video', 'enseco' ),
		'edit_item'             => __( 'Editar Video', 'enseco' ),
		'update_item'           => __( 'Actualizar Video', 'enseco' ),
		'view_item'             => __( 'Ver Video', 'enseco' ),
		'view_items'            => __( 'Ver Video', 'enseco' ),
		'search_items'          => __( 'Buscar Video', 'enseco' ),
		'not_found'             => __( 'No encontrado', 'enseco' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'enseco' ),
		'featured_image'        => __( 'Imagen destacada', 'enseco' ),
		'set_featured_image'    => __( 'Guardar imagen destacada', 'enseco' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'enseco' ),
		'use_featured_image'    => __( 'Utilizar como imagen destacada', 'enseco' ),
		'insert_into_item'      => __( 'Insertar en Video', 'enseco' ),
		'uploaded_to_this_item' => __( 'Agregado en Video', 'enseco' ),
		'items_list'            => __( 'Lista de Video', 'enseco' ),
		'items_list_navigation' => __( 'Navegación de Video', 'enseco' ),
		'filter_items_list'     => __( 'Filtrar Video', 'enseco' ),
	);
	$args = array(
		'label'                 => __( 'Video', 'enseco' ),
		'description'           => __( 'Videos para el sitio', 'enseco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 2,
        'menu_icon'             => 'dashicons-playlist-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'enseco_video', $args );

}
add_action( 'init', 'enseco_videos_post_type', 0 );

// Registrar Custom Post Type Discos
function enseco_discos_post_type() {

	$labels = array(
		'name'                  => _x( 'Discos', 'Post Type General Name', 'enseco' ),
		'singular_name'         => _x( 'Disco', 'Post Type Singular Name', 'enseco' ),
		'menu_name'             => __( 'Discos', 'enseco' ),
		'name_admin_bar'        => __( 'Disco', 'enseco' ),
		'archives'              => __( 'Archivo', 'enseco' ),
		'attributes'            => __( 'Atributos', 'enseco' ),
		'parent_item_colon'     => __( 'Disco padre', 'enseco' ),
		'all_items'             => __( 'Todos los Discos', 'enseco' ),
		'add_new_item'          => __( 'Agregar Disco', 'enseco' ),
		'add_new'               => __( 'Agregar Disco', 'enseco' ),
		'new_item'              => __( 'Nueva Disco', 'enseco' ),
		'edit_item'             => __( 'Editar Disco', 'enseco' ),
		'update_item'           => __( 'Actualizar Disco', 'enseco' ),
		'view_item'             => __( 'Ver Disco', 'enseco' ),
		'view_items'            => __( 'Ver Disco', 'enseco' ),
		'search_items'          => __( 'Buscar Disco', 'enseco' ),
		'not_found'             => __( 'No encontrado', 'enseco' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'enseco' ),
		'featured_image'        => __( 'Imagen destacada', 'enseco' ),
		'set_featured_image'    => __( 'Guardar imagen destacada', 'enseco' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'enseco' ),
		'use_featured_image'    => __( 'Utilizar como imagen destacada', 'enseco' ),
		'insert_into_item'      => __( 'Insertar en Disco', 'enseco' ),
		'uploaded_to_this_item' => __( 'Agregado en Disco', 'enseco' ),
		'items_list'            => __( 'Lista de Disco', 'enseco' ),
		'items_list_navigation' => __( 'Navegación de Disco', 'enseco' ),
		'filter_items_list'     => __( 'Filtrar Disco', 'enseco' ),
	);
	$args = array(
		'label'                 => __( 'Disco', 'enseco' ),
		'description'           => __( 'Discos para el sitio', 'enseco' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 3,
        'menu_icon'             => 'dashicons-album',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'enseco_disco', $args );

}
add_action( 'init', 'enseco_discos_post_type', 0 );

?>