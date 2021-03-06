<!--------------Header Area--------------->
<?php get_header(); ?>
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">
			<div class="col-2-3">
				<div class="wrap-col">
					<?php while(have_posts()) : the_post();  ?>
					<article>
					<?php  the_post_thumbnail();  ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
					</article>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="col-1-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php get_footer(); ?>


