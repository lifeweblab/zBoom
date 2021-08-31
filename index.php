<!--------------Header Area--------------->
<?php get_header(); ?>
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">
			<div class="col-2-3">
				<div class="wrap-col">

				<!-- Post WordPress Function Use Start -->
				<?php while (have_posts()) : the_post(); ?>

					<article>
						<?php  the_post_thumbnail();  ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="info">[By <?php the_author(); ?> on <?php the_time('F d, Y, G'); ?> with <?php comments_popup_link('comment nai','akta comment ase','% comments','classbosatechan','comments off'); ?>]</div>

						<?php read_more(30); ?>...<a href="<?php permalink_link(); ?>">read more</a>

					</article>
					<?php  endwhile ?>
					<!-- End of Post -->

					<!-- Pagination WordPress Function Use Start -->
					<?php /*
						the_post_navigation(array(
							'prev_text' => 'Ager Post',
							'next_text' => 'Porer Post',
							'screen_reader_text' => ''


						));
						*/
					?>
					<?php /*
						the_posts_pagination(array(
							'prev_text' => 'prev',
							'next_text' => 'next',
							'screen_reader_text' => ''
						)); */
					?>
					


					<ul id="pagi">
						<?php 
						the_posts_pagination(array(
							'prev_text' => 'prev',
							'next_text' => 'next',
							'screen_reader_text' => '',
							'prev_link' => '<li>',
							'next_link' => '</li>'
							
						));
						?>
					</ul>
					<!-- End of Pagination -->
				
				</div>
			</div>
			<div class="col-1-3">
				<!-- Sidebar Code -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php get_footer(); ?>