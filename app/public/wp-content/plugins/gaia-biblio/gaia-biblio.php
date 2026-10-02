<?php
/**
 *Plugin Name: Gaia Biblio
 *Description: Affiche la bibliographie d'un auteur depuis la base Gaia (gaia.oec.fr), avec certaines références réservées aux membres.
 */


 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function gaia_biblio_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'auteur' => '' ), $atts );

	if ( '' === $atts['auteur'] ) {
		return '<p>Précisez un auteur : [gaia_biblio auteur="..."]</p>';
	}

	return '<p>Bibliographie de ' . esc_html( $atts['auteur'] ) . '</p>';
}

add_shortcode( 'gaia_biblio', 'gaia_biblio_shortcode' );
