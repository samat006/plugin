<?php
/**
 * Plugin Name: Accès Membres
 * Description: Restreint l'accès à certains contenus selon que le visiteur est connecté et selon son rôle.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Le visiteur a-t-il accès ?
 * - $roles vide : il suffit d'être connecté.
 * - $roles rempli : il faut avoir au moins un de ces rôles.
 */
function acces_membres_autorise( $roles = array() ) {
	if ( ! is_user_logged_in() ) {
		return false;
	}

	if ( empty( $roles ) ) {
		return true;
	}

	$user = wp_get_current_user();

	return (bool) array_intersect( $roles, (array) $user->roles );
}

function acces_membres_shortcode( $atts, $content = '' ) {
	$atts  = shortcode_atts( array( 'role' => '' ), $atts );
	$roles = array_filter( array_map( 'trim', explode( ',', $atts['role'] ) ) );

	if ( acces_membres_autorise( $roles ) ) {
		return do_shortcode( $content );
	}

	if ( is_user_logged_in() ) {
		return '<p>Votre compte n\'a pas accès à ce contenu.</p>';
	}

	return '<p>Contenu réservé aux membres. <a href="' . esc_url( wp_login_url( get_permalink() ) ) . '">Se connecter</a></p>';
}
add_shortcode( 'membres', 'acces_membres_shortcode' );
