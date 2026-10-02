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

	$references = gaia_biblio_get_references( $atts['auteur'] );

		if ( empty( $references ) ) {
		return '<p>Aucune référence trouvée.</p>';
	}

	$html = '<ul class="gaia-biblio">';

	foreach ( $references as $reference ) {
		$html .= '<li>';
		$html .= '<strong>' . esc_html( $reference['annee'] ) . '</strong> — ';
		$html .= esc_html( $reference['titre'] ) . '<br>';
		$html .= esc_html( $reference['auteur'] );

		if ( '' !== $reference['journal'] ) {
			$html .= ', <em>' . esc_html( $reference['journal'] ) . '</em>';
		}
		if ( '' !== $reference['volume'] ) {
			$html .= ', n° ' . esc_html( $reference['volume'] );
		}
		if ( '' !== $reference['pages'] ) {
			$html .= ', p. ' . esc_html( $reference['pages'] );
		}

		$html .= '</li>';
	}

	$html .= '</ul>';

	return $html;

}
function gaia_biblio_get_references( $auteur ) {
	$url = add_query_arg(
		array(
			'do'     => 'get_biblio_inv',
			'key'    => 'fea9a667df9db40499ebf94e5b6a07f6',
			'auteur' => $auteur,
		),
		'https://gaia.oec.fr/getdata.php'
	);

	$response = wp_remote_get( $url, array( 'timeout' => 15 ) );
	if ( is_wp_error( $response ) ) {
		return array();
	}

	$body = json_decode( wp_remote_retrieve_body( $response ), true );
	if ( ! isset( $body['result']['data'] ) ) {
		return array();
	}

	return $body['result']['data'];
}


add_shortcode( 'gaia_biblio', 'gaia_biblio_shortcode' );
