<?php

/**
 * Aggiunta personalizzazioni per Gutenberg
 *
 * @package WordPress
 * @subpackage SkillsAndMore
 *
 */

add_action( 'after_setup_theme', 'sam_add_gutenberg_support' );
/**
 * Implemento le funzionalita' di Gutenberg
 */
function sam_add_gutenberg_support() {

	// Importo gli stili di Gutenberg.
	add_theme_support( 'editor-styles' );

	// Dichiaro supporto per allineamenti wide e full.
	add_theme_support( 'align-wide' );

	// Dichiaro i colori da usare nel template.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name' => 'Verde SAM',
				'slug' => 'verde-sam',
				'color' => '#1ABC9C',
			),
			array(
				'name' => 'Arancione SAM',
				'slug' => 'arancione-sam',
				'color' => '#EF6C00',
			),
			array(
				'name' => 'Bianco',
				'slug' => 'white',
				'color' => '#FFF',
			),
			array(
				'name' => 'Grigio',
				'slug' => 'grigio',
				'color' => '#333',
			),
		)
	);

}
