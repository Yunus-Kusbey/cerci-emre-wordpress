<?php
/**
 * Search Results Template
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
			<h1 class="ce-page__title">
				<?php
				printf(
					esc_html__( '"%s" için arama sonuçları', 'cerci-emre' ),
					'<span style="color:var(--ce-gold);">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</div>
	</div>

	<div class="ce-container">
		<!-- Search Form -->
		<form role="search" method="get" class="ce-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" class="ce-search-form__input" placeholder="<?php esc_attr_e( 'Yeni bir arama yapın...', 'cerci-emre' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
			<button type="submit" class="ce-search-form__btn"><?php esc_html_e( 'Ara', 'cerci-emre' ); ?></button>
		</form>

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
				<p style="color:var(--ce-gray-light);font-size:1.1rem;"><?php esc_html_e( 'Aradığınız kriterlere uygun sonuç bulunamadı. Lütfen farklı anahtar kelimeler deneyin.', 'cerci-emre' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ce-btn ce-btn-outline" style="margin-top:var(--ce-space-xl);">
					<?php esc_html_e( 'Ana Sayfaya Dön', 'cerci-emre' ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
