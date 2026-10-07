<?php
/**
 * Page Template
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ce-page">
	<div class="ce-page__header">
		<div class="ce-container">
			<h1 class="ce-page__title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="ce-container">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="ce-page__content entry-content">
				<?php the_content(); ?>
			</div>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Sayfalar:', 'cerci-emre' ),
				'after'  => '</div>',
			) );
			?>

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<div class="ce-comments">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>
