<?php
/**
 *
 *
 * @package 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! Pagina no encontrada.', 'switch' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php _e( 'Desea buscar de nuevo?', 'switch' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( switch_categorized_blog() ) :  ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php _e( 'Categorias mas usadas', 'switch' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div>
					<?php endif; ?>

					<?php
						
						$archive_content = '<p>' . sprintf( __( 'Intenta en el historial mensual. %1$s', 'switch' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div>
			</section>

		</main>
	</div>
	
<?php get_footer(); ?>
