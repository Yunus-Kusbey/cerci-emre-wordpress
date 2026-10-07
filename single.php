<?php
/**
 * Single Post Template
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
			<span class="ce-post-card__date" style="display:block;margin-bottom:var(--ce-space-sm);"><?php echo get_the_date(); ?></span>
			<h1 class="ce-page__title"><?php the_title(); ?></h1>
			<p style="color:var(--ce-gray);font-size:0.9rem;margin-top:var(--ce-space-sm);">
				<?php
				printf(
					esc_html__( 'Yazar: %s', 'cerci-emre' ),
					'<span style="color:var(--ce-gold);">' . get_the_author() . '</span>'
				);
				?>
			</p>
		</div>
	</div>

	<div class="ce-container" style="max-width:800px;">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div style="margin-bottom:var(--ce-space-2xl);border-radius:var(--ce-radius-lg);overflow:hidden;">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			<?php endif; ?>

			<div class="ce-page__content entry-content">
				<?php the_content(); ?>
			</div>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Sayfalar:', 'cerci-emre' ),
				'after'  => '</div>',
			) );
			?>

			<!-- Tags -->
			<?php
			$tags = get_the_tags();
			if ( $tags ) : ?>
				<div style="margin-top:var(--ce-space-2xl);padding-top:var(--ce-space-xl);border-top:1px solid rgba(200,164,92,0.1);">
					<span style="color:var(--ce-gold);font-size:0.85rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;"><?php esc_html_e( 'Etiketler:', 'cerci-emre' ); ?></span>
					<?php foreach ( $tags as $tag ) : ?>
						<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
						   style="display:inline-block;padding:4px 12px;margin:4px;background:var(--ce-dark);border:1px solid rgba(200,164,92,0.2);border-radius:var(--ce-radius-sm);color:var(--ce-gray-light);font-size:0.8rem;transition:all 0.3s;">
							<?php echo esc_html( $tag->name ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<!-- Post Navigation -->
			<div style="margin-top:var(--ce-space-2xl);display:grid;grid-template-columns:1fr 1fr;gap:var(--ce-space-xl);">
				<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				?>
				<?php if ( $prev_post ) : ?>
					<a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" style="padding:var(--ce-space-lg);background:var(--ce-dark);border:1px solid rgba(200,164,92,0.1);border-radius:var(--ce-radius-md);text-decoration:none;">
						<span style="color:var(--ce-gold);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;">← <?php esc_html_e( 'Önceki Yazı', 'cerci-emre' ); ?></span>
						<p style="color:var(--ce-white);font-size:0.9rem;margin-top:var(--ce-space-sm);margin-bottom:0;"><?php echo esc_html( $prev_post->post_title ); ?></p>
					</a>
				<?php else : ?>
					<div></div>
				<?php endif; ?>

				<?php if ( $next_post ) : ?>
					<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" style="padding:var(--ce-space-lg);background:var(--ce-dark);border:1px solid rgba(200,164,92,0.1);border-radius:var(--ce-radius-md);text-decoration:none;text-align:right;">
						<span style="color:var(--ce-gold);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;"><?php esc_html_e( 'Sonraki Yazı', 'cerci-emre' ); ?> →</span>
						<p style="color:var(--ce-white);font-size:0.9rem;margin-top:var(--ce-space-sm);margin-bottom:0;"><?php echo esc_html( $next_post->post_title ); ?></p>
					</a>
				<?php endif; ?>
			</div>

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<div class="ce-comments">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>
