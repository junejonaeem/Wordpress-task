<?php /* Template Name: Custom Template */ 


?>
<link rel="stylesheet" href="<?php echo   get_stylesheet_uri();?>">

<style>
    .lazyload {
    opacity: 0;
    transition: opacity 300ms ease-in-out;
}
.lazyloaded {
    opacity: 1;
}
/* Hero Section */
#hero {
    background-color: #f1f1f1;
    padding: 50px;
    text-align: center;
    background-size: cover;
    background-position: center;
}

#hero .hero-content {
    color: #fff;
}

#hero h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

#hero p {
    font-size: 18px;
    margin-bottom: 30px;
}

#hero .scroll-button {
    display: inline-block;
    background-color: #ff5722;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

#hero .scroll-button:hover {
    background-color: #e64a19;
}

/* About Us Section */
#about-us {
    background-color: #fff;
    padding: 50px;
    text-align: center;
}

#about-us h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

#about-us p {
    font-size: 18px;
    margin-bottom: 30px;
}

#about-us .button {
    display: inline-block;
    background-color: #ff5722;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

#about-us .button:hover {
    background-color: #e64a19;
}

/* Table Section */
#table-section {
    background-color: #f1f1f1;
    padding: 50px;
    text-align: center;
}

#table-section h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

#table-section table {
    width: 100%;
    border-collapse: collapse;
}

#table-section th,
#table-section td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
}

#table-section th {
    background-color: #f5f5f5;
}

#table-section tbody tr:hover {
    background-color: #f9f9f9;
}

#table-section .button {
    display: inline-block;
    background-color: #ff5722;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

#table-section .button:hover {
    background-color: #e64a19;
}

#table-section .external-link {
    display: inline-block;
    margin-left: 10px;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

#table-section .external-link:hover {
    color: #ff5722;
}

/* Section Below Table */
.section-below-table {
    text-align: center;
    margin-top: 50px;
}

.section-below-table img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.section-below-table p {
    font-size: 18px;
    margin-bottom: 30px;
}

/* Footer Section */
footer {
    background-color: #333;
    padding: 50px;
    color: #fff;
    text-align: center;
}

footer h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

footer p {
    font-size: 18px;
    margin-bottom: 30px;
}

.footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu li {
    display: inline-block;
    margin: 0 10px;
}

.footer-menu li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-menu li a:hover {
    color: #ff5722;
}

</style>


<!-- Section 1: Hero -->
<section id="hero" style="background-image: url('<?php echo get_theme_mod('hero_background_image'); ?>');">
    <div class="hero-content">
        <h2><?php echo get_theme_mod('hero_title'); ?></h2>
        <p><?php echo get_theme_mod('hero_text'); ?></p>
        <a href="#table-section" class="scroll-button">Scroll Down</a>
    </div>
</section>

<!-- Section 2: About Us -->
<section id="about-us">
    <div class="about-content">
        <h2><?php echo get_theme_mod('about_title'); ?></h2>
        <p><?php echo get_theme_mod('about_text'); ?></p>
        <a href="#" class="button">Learn More</a>
    </div>
</section>

<!-- Section 3: Table Section -->
<!-- Section 3: Table Section -->
<section id="table-section">
    <h2><?php echo get_theme_mod('table_section_title'); ?></h2>
    <p><?php echo date('F j, Y'); ?></p>

    <table>
        <thead>
            <tr>
                <th>Logo</th>
                <th>Address</th>
                <th>Star Rating</th>
                <th>Score</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $args = array(
                    'post_type' => 'casino_hotels',
                    'posts_per_page' => -1,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'score',
                    'order' => 'DESC',
                );

                $hotels_query = new WP_Query($args);

                if ($hotels_query->have_posts()) {
                    while ($hotels_query->have_posts()) {
                        $hotels_query->the_post();
                        $logo = get_field('logo');
                        $address = get_field('address');
                        $star_rating = get_field('star_rating');
                        $score = get_field('score');
                        $external_link = get_field('external_link');
            ?>
                        <tr>
                            <td><img src="<?php echo $logo; ?>" alt="Logo"></td>
                            <td><?php echo $address; ?></td>
                            <td>
                                <?php
                                    for ($i = 0; $i < $star_rating; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                ?>
                            </td>
                            <td><?php echo $score; ?></td>
                            <td>
                                <a href="<?php the_permalink(); ?>" class="button">Read Review</a>
                                <a href="<?php echo $external_link; ?>" class="external-link">External Link</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    echo '<tr><td colspan="5">No casino hotels found.</td></tr>';
                }
                wp_reset_postdata();
            ?>
        </tbody>
    </table>
</section>
<div class="section-below-table">
<?php
$section_below_table_image = get_theme_mod('section_below_table_image');
$section_below_table_content = get_theme_mod('section_below_table_content');

if ($section_below_table_image) {
    echo '<img src="' . esc_url($section_below_table_image) . '" alt="Section Image">';
}

if ($section_below_table_content) {
    echo "<p>".wp_kses_post($section_below_table_content)."</p>";
}
?>
</div>
<?php
$footer_menu = get_theme_mod('footer_menu_setting');
?>
<footer>
    <div>
        <h1>About Us</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A vel expedita aspernatur quaerat doloremque totam assumenda facere necessitatibus sapiente dolor. Quae vel maxime doloribus distinctio voluptate, facere saepe tenetur eos.</p>
    </div>
    <div>
    <?php
if ($footer_menu) {
    wp_nav_menu(array(
        'theme_location' => $footer_menu,
        'menu_class' => 'footer-menu',
    ));
}

?>
    </div>
</footer>



