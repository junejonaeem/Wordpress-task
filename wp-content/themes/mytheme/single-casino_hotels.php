<?php
// single-casino_hotels.php



while (have_posts()) {
    the_post();
    ?>

    <article <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>

        <div class="casino-details">
            <?php
            // Get custom fields data
             $logo = get_post_meta(get_the_ID(), 'logo', true);
            $address = get_post_meta(get_the_ID(), 'address', true);
            $star_rating = get_post_meta(get_the_ID(), 'star_rating', true);
            $score = get_post_meta(get_the_ID(), 'score', true);
            $external_link = get_post_meta(get_the_ID(), 'external_link', true);
            ?>

            <?php if ($logo) : ?>
                <img src="<?php echo esc_url(wp_get_attachment_image_src($logo, 'full')[0]); ?>" alt="Casino Logo" />
            <?php endif; ?>

            <?php if ($address) : ?>
                <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
            <?php endif; ?>

            <?php if ($star_rating) : ?>
                <p><strong>Star Rating:</strong> <?php echo esc_html($star_rating); ?></p>
            <?php endif; ?>

            <?php if ($score) : ?>
                <p><strong>Score:</strong> <?php echo esc_html($score); ?></p>
            <?php endif; ?>

            <?php if ($external_link) : ?>
                <p><a href="<?php echo esc_url($external_link); ?>" target="_blank">Visit Website</a></p>
            <?php endif; ?>
        </div>

        <div class="casino-description">
            <?php the_content(); ?>
        </div>
    </article>

    <?php
}
?>