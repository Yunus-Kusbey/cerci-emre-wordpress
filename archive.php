<?php
/**
 * Archive Template
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
			<?php the_archive_title( '<h1 class="ce-page__title">', '</h1>' ); ?>
			<?php the_archive_description( '<p style="color:var(--ce-gray-light);margin-top:var(--ce-space-sm);">', '</p>' ); ?>
		</div>
	</div>

	<div class="ce-container">
		<?php if ( have_posts() ) : ?>
			<div class="ce-blog__grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="ce-post-card ce-animate">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="ce-post-card__image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'cerci-blog-thumb' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="ce-post-card__content">
							<span class="ce-post-card__date"><?php echo get_the_date(); ?></span>
							<h2 class="ce-post-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="ce-post-card__excerpt"><?php echo get_the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="ce-post-card__more">
								<?php esc_html_e( 'Devamını Oku', 'cerci-emre' ); ?> →
							</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div style="text-align:center;margin-top:var(--ce-space-3xl);">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => '←',
					'next_text' => '→',
				) );
				?>
			</div>
		<?php else : ?>
			<div style="text-align:center;padding:var(--ce-space-4xl) 0;">
				<p style="color:var(--ce-gray-light);font-size:1.1rem;"><?php esc_html_e( 'Bu kategoride henüz yazı bulunamadı.', 'cerci-emre' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
