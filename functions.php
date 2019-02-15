<?php
/**
 * Lista funzioni dichiarate e richiamate in altre pagine
 *
 * @package WordPress
 * @subpackage SkillsAndMore
 *
 * 1 - Mostro le testimonianze sam_testimonials()
 * 2 - Mostro l'archivio dei corsi sam_display_post_course_archive()
 * 3 - Mostro tabella dei prezzi sam_price_table()
 * 4 - Mostro sistemi di pagamento accettati sam_accepted_payments()
 * 5 - Modifico il footer sam_footer_info()
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Informazioni Child Theme.
define( 'CHILD_THEME_NAME', 'SkillsAndMore Gutenberg 2019' );
define( 'CHILD_THEME_URL', 'https://skillsandmore.org' );
define( 'CHILD_THEME_VERSION', '0.1.0' );

// Aggiungo struttura HTML5.
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));

//* Aggiungo meta tag viewport
add_theme_support('genesis-responsive-viewport');

//* Aggiungo colonne footer
add_theme_support('genesis-footer-widgets', 4);

//* Aggiungo page script agli abbonamenti
add_post_type_support('llms_membership', 'genesis-scripts');

//* Enqueue Google Fonts
add_action('wp_enqueue_scripts', 'genesis_script_styles');
function genesis_script_styles() {
	wp_enqueue_script( 'mobile-first-sass-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic|Bree+Serif', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	if ( is_singular( 'lesson' ) ) {
		wp_enqueue_script( 'fix-sidebar', get_bloginfo( 'stylesheet_directory' ) . '/js/lesson-fixed-sidebar.js', array( 'jquery' ), CHILD_THEME_VERSION );
	}

	if ( is_front_page() || is_singular( 'course' ) || is_archive( 'corsi' ) || is_singular( 'llms_membership' ) || is_page_template( 'template-faq.php' ) || is_singular( 'glossary' ) ) {
		wp_enqueue_script( 'slick-slider', get_bloginfo( 'stylesheet_directory' ) . '/js/slick.min.js', array( 'jquery' ), CHILD_THEME_VERSION );
		wp_enqueue_script( 'testimonial-slider', get_bloginfo( 'stylesheet_directory' ) . '/js/skam-slick.js', array( 'jquery', 'slick-slider' ), CHILD_THEME_VERSION );
	}

}

// Rimuovo la classica domanda di Genesis per usare titolo o immagine dalla pagina opzioni di Genesis.
add_action( 'genesis_theme_settings_metaboxes', 'sam_remove_metaboxes' );
function sam_remove_metaboxes( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
}

// Rimuovo la classica domanda di Genesis per usare titolo o immagine dal Customizer.
add_action( 'customize_register', 'sam_customize_register', 99 );
function sam_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'blog_title' );

}

// Aggiungo il modo di default per caricare il logo/
add_theme_support( 'custom-logo', array(
	'height' => 68,
	'width' => 230,
	'flex-height' => true,
	'flex-width' => true,
));

/**
 * Aggiunta del logo e del codice per migliorare la SEO
 *
 * Il logo deve essere aggiunto con il Customizer
 *
 * @param string $title All the mark up title.
 * @param string $inside Mark up inside the title.
 * @param string $wrap Mark up on the title.
 * @author @_AlphaBlossom
 * @author @_neilgee
 *
 */
function sam_custom_logo( $title, $inside, $wrap ) {
	// Check to see if the Custom Logo function exists and set what goes inside the wrapping tags.
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
		$logo = the_custom_logo();
	else :
		$logo = get_bloginfo( 'name' );
	endif;
	// Uso questo se non viene trovato alcun logo.
	$inside = sprintf( '<a href="%1$s" title="%2$s">%2$s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
	// Determino quale elemento sia meglio usare e con che classe.
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	// A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug.
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	// And finally, $wrap in h1 if HTML5 & semantic headings enabled.
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	$title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
	return $title;
}
add_filter( 'genesis_seo_title', 'sam_custom_logo', 10, 3 );

/**
 * Add class for screen readers to site description.
 * This will keep the site description mark up but will not have any visual presence on the page
 * This runs if their is a header image set in the Customiser.
 *
 * @param string $attributes Add screen reader class if custom logo is set.
 *
 * @author @_neilgee
 */
function genesischild_add_site_description_class( $attributes ) {
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$attributes['class'] .= ' screen-reader-text';
		return $attributes;
	} else {
		return $attributes;
	}
}
add_filter( 'genesis_attr_site-description', 'genesischild_add_site_description_class' );

// Sposto la navigazione.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav' );

// Rimuovo le date dai commenti.
add_filter( 'genesis_show_comment_date', '__return_false' );

//* Inserisco il Google Tag Manager
// add_action('genesis_before', 'sam_add_gtm');
// function sam_add_gtm() {

// 	if (current_filter() == 'genesis_before') {
// 		echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3SMML9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
// 	}

// }

// Inserisco menu solo per utenti loggati.
if ( is_user_logged_in() ) {
	add_action( 'genesis_before_header', 'sam_logged_menu' );
	function sam_logged_menu() {
		?>
		<div class="menu-loggato">
			<div class="flex wrap">
				<div class="f-1-5">
					<?php $current_user = wp_get_current_user(); ?>
					<div class="user">
						<?php echo get_avatar( $current_user->ID, 32 ); ?>
						Bentornato <span><?php echo $current_user->user_firstname; ?></span>
					</div>
				</div>
				<div class="f-1-2">
					<ul class="menu">
						<li class="llms-sd-item"><a rel="nofollow" href="<?php echo get_permalink(7); ?>">Bacheca</a></li>
						<li class="llms-sd-item"><a rel="nofollow" href="<?php echo get_permalink(7) . 'visualizza-corsi/'; ?>">Miei Corsi</a></li>
						<li class="llms-sd-item"><a rel="nofollow" href="<?php echo get_permalink(7) . 'edit-account/'; ?>">Modifica Account</a></li>
						<li class="llms-sd-item"><a rel="nofollow" href="<?php echo get_permalink(7) . 'orders/'; ?>">Ordini</a></li>
						<li class="llms-sd-item"><a rel="nofollow" href="<?php echo wp_logout_url(home_url()); ?>">Esci</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}
}

// Rimuovo info LifterLMS in bacheca studente.
remove_action( 'lifterlms_before_student_dashboard_content', 'lifterlms_template_student_dashboard_navigation', 10 );
remove_action( 'lifterlms_before_student_dashboard_content', 'lifterlms_template_student_dashboard_title', 20 );

// Aggiorno informazioni autore.
add_filter( 'user_contactmethods', 'sam_user_contactmethods' );
function sam_user_contactmethods( $fields ) {
	$fields['linkedin'] = __( 'LinkedIn' );
	return $fields;
}

// Creo un box author personalizzato.
add_action( 'genesis_entry_footer', 'sam_author_box', 13 );
function sam_author_box() {

	if ( is_singular( 'post' ) ) {
		$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 70 );
		$author_name = get_the_author_meta( 'display_name' );
		$author_desc = get_the_author_meta( 'description' );
		$facebook = get_the_author_meta( 'facebook' );
		$linkedin = get_the_author_meta( 'linkedin' );
		$googleplus = get_the_author_meta( 'googleplus' );
		$twitter = get_the_author_meta( 'twitter' );
		$website = get_the_author_meta( 'url' );
		?>
		<section class="author-box">
			<div class="author-box-avatar">
				<?php echo $author_avatar; ?>
			</div>
			<div class="author-box-content">
				<h4 class="author-box-title"><span itemsprop="author"><?php echo $author_name; ?></span></h4>
				<div class="author-box-description">
					<p itemprop="description"><?php echo $author_desc; ?></p>
				</div>
				<?php if ( $twitter || $facebook || $linkedin || $googleplus || $website ) : ?>
					<div class="author-box-socials">
						<span>Mi trovi anche su: </span>

						<?php if ( $facebook ) : ?>
							<a class="fa fa-facebook author-link" href="<?php echo $facebook; ?>" target="_blank" rel="nofollow"></a>
						<?php endif; ?>

						<?php if ( $linkedin ) : ?>
							<a class="fa fa-linkedin author-link" href="<?php echo $linkedin; ?>" target="_blank" rel="nofollow"></a>
						<?php endif; ?>

						<?php if ( $twitter ) : ?>
							<a class="fa fa-twitter author-link" href="<?php echo $twitter; ?>" target="_blank" rel="nofollow"></a>
						<?php endif; ?>

						<?php if ( $googleplus ) : ?>
							<a class="fa fa-google-plus author-link" href="<?php echo $googleplus; ?>" target="_blank" rel="nofollow"></a>
						<?php endif; ?>

						<?php if ( $website ) : ?>
							<a class="fa fa-globe author-link" href="<?php echo $website; ?>" target="_blank"></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}

// Aggiungo bottone login nel menu principale.
add_filter( 'wp_nav_menu_items', 'sam_login_button', 10, 2 );
function sam_login_button( $items, $args ) {
	if ( $args->theme_location == 'primary' && ! is_user_logged_in() ) {
		$items .= '<li class="menu-item">
						<a  rel="nofollow" href="/login/"><span itemprop="name">Entra</span></a>
				   </li>';
	}
	return $items;
}

// Cambio la dimensione delle immagini di Jetpack.
add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'sam_jetpack_image_size' );
function sam_jetpack_image_size( $thumbnail_size ) {
	$thumbnail_size['width'] = 260;
	$thumbnail_size['height'] = 70;
	return $thumbnail_size;
}

// Rimuovo le categorie da Jetpack.
add_filter( 'jetpack_relatedposts_filter_post_context', '__return_empty_string' );

// Rimuovo i relater post per mostrarli con shortcode.
add_filter( 'wp', 'sam_jetpack_remove_rp', 20 );
function sam_jetpack_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}

// Gestisco la costruzione del titolo per le pagine.
if ( is_page() ) {
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
}

// Dichiaro compatibilita con LifterLMS.
add_action( 'after_setup_theme', 'sam_llms_theme_support' );
function sam_llms_theme_support() {
	add_theme_support( 'lifterlms' );
	add_theme_support( 'lifterlms-quizzes' );
	add_theme_support( 'lifterlms-sidebars' );
}

// Permetto l'uso dell'attributo data-language nell'elemento pre.
add_filter( 'wp_kses_allowed_html', 'sam_allowed_data_language', 10, 2 );
function sam_allowed_data_language( $allowed, $context ) {
	if ( $context === 'post' || $context === 'lesson' ) {
		$allowed['pre']['data-language'] = true;
	}

	return $allowed;
}

// 1 - Mostro le testimonianze.
function sam_testimonials() {
	?>
<div class="testimonials">
	<h4>Le opinioni degli skillati</h4>
	<div class="wrap">
		<div class="testimonial">
			<h2>Grazie a SkillsAndMore ho finalmente imparato a modificare CSS e HTML in libertà! Sono quindi riuscita a creare un sito/MVP per la mia startup.</h2>
			<span class="avatar ludo"></span>
			<p>Ludovica Tartaglione</p>
		</div>
		<div class="testimonial">
			<h2>Un progetto che promette molto anche perché organizzato così ne esistono davvero pochi in Italia.<br>Sicuramente può dare ancora molto di più.</h2>
			<span class="avatar fran"></span>
			<p>Francesco Panaia</p>
		</div>
		<div class="testimonial">
			<h2>La migliore iniziativa che ho trovato in rete per imparare da autodidatta la programmazione.</h2>
			<span class="avatar robe"></span>
			<p>Roberto Francioso</p>
		</div>
	</div>
</div>
	<?php
}

// 2 - Mostro l'archivio dei corsi.
function sam_display_post_course_archive() {
	wp_reset_query();

	$ploop = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		'meta_query' => array(
			array(
				'key' => '_thumbnail_id',
				'compare' => 'EXISTS',
			),
		),
	);
	$posts_loop = new WP_Query( $ploop );

	?>

	<div class="archive-posts articles">
		<div class="site-inner">
			<h2>Non solo corsi!</h2>
			<p>Su SkillsAndMore pubblichiamo anche interessanti articoli.<br>Alcuni sono pubblici e disponibili, mentre altri, più approfonditi, richiedono la tua <a href="/registrami" title="Diventa uno skillato!">registrazione come skillato</a>!</p>
			<div class="flex">
				<?php while ( $posts_loop->have_posts() ) : $posts_loop->the_post(); ?>

					<div class="single-post f-1-2">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						<div class="overlay">
							<a class="btn cta" href="<?php the_permalink(); ?>">Leggi l'articolo</a>
							<div class="post-cat"><?php the_category( ', ' ); ?></div>
						</div>
					</div>

				<?php
					endwhile;
					wp_reset_query();
				?>
			</div>
		</div>
	</div>
	<?php
}

//* 3 - Funzione per la tabella dei prezzi
function sam_price_table() {
	if ( !is_user_logged_in() ) :
		if ( is_single() ) :
	?>
		</main></div></div>
	<?php endif; ?>
	<div class="prices">
		<h4>Piani di accesso</h4>
		<h2>Seleziona l'opzione pi&ugrave; idonea</h2>
		<div class="flex wrap">
			<div class="tab-price f-1-3">
				<h3>Singolo Corso</h3>
				<small>Per chi inizia</small>
				<p class="price">a partire da <small>&euro;</small>19</p>
				<ul>
					<li>singolo corso</li>
					<li class="barrato">accesso forum</li>
					<li class="barrato">appuntamenti dal vivo</li>
					<li class="barrato">Q&A settimanali</li>
					<li class="barrato">riunioni 1-to-1</li>
					<li class="barrato">mastermind group</li>
				</ul>
				<a href="/corsi" class="btn gray">Acquista un corso</a>
			</div>
			<div class="tab-price featured f-1-3">
				<h3>Skillato</h3>
				<small>Per chi fa sul serio</small>
				<p>
					<span class="price"><small>&euro;</small>49/mese</span> o <span class="price"><small>&euro;</small>450/anno</span>
				</p>
				<ul>
					<li>tutti i corsi</li>
					<li>accesso forum</li>
					<li>appuntamenti dal vivo</li>
					<li>Q&A settimanali</li>
					<li>riunioni 1-to-1</li>
					<li>mastermind group</li>
				</ul>
				<a href="/registrami" class="btn cta">Diventa uno Skillato</a>
			</div>
			<div class="tab-price lifetime f-1-3">
				<h3>Skillato Lifetime</h3>

				<p class="price"><small>&euro;</small>1199</p>

				<p class="desc">Segui tutti i corsi che pubblicheremo, partecipa alla community e ai nostri progetti interni <strong>senza preoccuparti del prossimo pagamento!</strong></p>
				<a href="/lifetime" class="btn gray">Accesso a vita</a>
			</div>
		</div>
		<div class="gateway"><?php sam_accepted_payments(); ?></div>
		<div class="faq"><small>Rimasto con qualche dubbio? Leggi le <a href="/faq">F.A.Q.</a></small></div>
	</div>

	<?php if ( is_single() ) : ?>
	<div class="site-inner"><div class="content-sidebar-wrap"><main class="content">
	<?php endif;
	endif;
}

/**
 * 4 - Mostro sistemi di pagamento accettati
 *
 * Creo un div .credit-cards che permette di elencare i sistemi di pagamento accettati utilizzando il font
 * delle carte di credito.
 */
function sam_accepted_payments() {
	echo '<div class="credit-cards"><i class="pf-visa"></i><i class="pf-american-express"></i><i class="pf-diners"></i><i class="pf-discover"></i><i class="pf-jcb"></i><i class="pf-mastercard-alt"></i><i class="pf-maestro-alt"></i><i class="pf-stripe"></i></div>';
}

/**
 * 5 - Modifico il footer
 *
 * Aggiungo il menu generale, i profili sociali del progetto e la pagina dei termini e condizioni affiancata alla privacy policy
 *
 * @author Andrea Barghigiani
 */
add_action( 'genesis_footer', 'sam_footer_info', 9 );
function sam_footer_info() {
	$html = '<div class="social-pages">
            <a rel="nofollow" href="https://www.facebook.com/skillsandmore/" target="_blank" title="SkillsAndMore su Facebook"><span class="dashicons dashicons-facebook"></span></a>
            <a rel="nofollow" href="http://twitter.com/skillandmore" target="_blank" title="SkillsAndMore su Twitter"><span class="dashicons dashicons-twitter"></span></a>
            <a rel="nofollow" href="https://www.youtube.com/channel/UCsmX3JyWeSS9bLogxLan6Dw" target="_blank" title="Il canale YouTube SkillsAndMore"><span class="dashicons dashicons-format-video"></span></a>
        </div>

        <div class="site-map">
            <a href="https://skillsandmore.org" title="Homepage di SkillsAndMore">Home</a> -
            <a href="/blog/" title="Il blog di SkillsAndMore">Blog</a> -
            <a href="/corsi/" title="I corsi di SkillsAndMore">Corsi</a> -
            <a href="/faq/" title="Le domande frequenti degli skillati">FAQ</a> -
            <a rel="nofollow" href="/contatti/" title="Il modo pi&ugrave; di contattare il team di SkillsAndMore">Contatti</a>
		</div>';
	echo $html;
}

add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon', 99999 );
function wpdocs_dequeue_dashicon() {
	if ( is_user_logged_in() ) {
		return;
	}
	wp_deregister_style( 'dashicons' );
}

// Modifico testo required da Contact Form Jetpack
add_filter( 'jetpack_required_field_text', 'sam_jetpackcom_custom_required' );
function sam_jetpackcom_custom_required() {
	return __( '*' );
}


// Rimuovo gli stili di Jetpack per il Contact Form.
add_action( 'wp_print_styles', 'remove_grunion_style' );
function remove_grunion_style() {
	wp_deregister_style( 'grunion.css' );
}

/**
 * 6 - Aggiunta compatibilità Gutenberg
 */
add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' );
