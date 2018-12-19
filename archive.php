<?php
/**
 * @package WordPress
 * @subpackage Sunset_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle specialtitle">Archives</h2>
		<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_paged() ) {
			?> 

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<small class="queryBlog">For the <?php single_cat_title(''); ?> category.</small>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<small class="queryBlog">For the day <?php the_time('l, F jS, Y'); ?>.</small>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<small class="queryBlog">For <?php the_time('F, Y'); ?>.</small>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<small class="queryBlog">For the year <?php the_time('Y'); ?>.</small>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<small class="queryBlog">The blog archives.</small>

			<?php } ?>

			<?php }?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h2 id="post-<?php the_ID(); ?>"><span class="date"><?php echo strftime('%d %b',strtotime(get_the_time('m/d/Y'))); ?></span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<p class="postmetadata">
				Category(s): <?php the_category(', ') ?><br /><?php the_tags('Tag(s): ', ', ', '<br />'); ?>
				<?php edit_post_link('Edit this entry', '', ' | '); ?><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>