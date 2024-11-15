<?php get_header(); ?>

<main class="main">

    <section class="what-section first-section section" id="what">
        <div class="container">
            <h2 class="section-title"><?php the_field( 'what_we_can_do_title' ); ?></h2>
            <p class="section-text"><?php the_field( 'what_we_can_do_text' ); ?></p>
            <div class="what__wrapper">
            <?php

            if( have_rows('what__cards') ): ?>
                <div class="what__cards">
                   <?php
                    while( have_rows('what__cards') ) : the_row();

                        $card_icon = get_sub_field('card_icon');
                        $card_title = get_sub_field('card_title');
                        $card_description = get_sub_field('card_description');

                        ?>

                        <div class="what__card">
                            <div class="what__card-icon">
                                <?php if ($card_icon && is_array($card_icon)) : ?>
                                    <img src="<?php echo esc_url($card_icon['url']); ?>" alt="<?php echo esc_attr($card_icon['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="what__card-content">
                                <div class="what__card-title"><?php echo esc_html( $card_title ); ?></div>
                                <div class="what__card-description"><?php echo esc_html( $card_description ); ?></div>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>

                    </div>

                <?php else : ?>
                    <p>We can do nothing.</p>
            <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="testimonials-section section" id="testimonials">
        <div class="container">
        <h2 class="section-title"><?php the_field( 'testimonials_title' ); ?></h2>
        <p class="section-text"><?php the_field( 'testimonials_text' ); ?></p>
        </div>
    </section>
    <section class="faq-section section" id="faq">
        <div class="faq-section__container">
        <h2 class="section-title"><?php the_field( 'faq_title' ); ?></h2>
        <p class="section-text"><?php the_field( 'faq_text' ); ?></p>
        </div>
    </section>
    <section class="contact-section section" id="contact">
        <div class="contact-section__container">
            <h2 class="section-title">Grow Your Company Faster
            Than Ever Before</h2>
        </div>
    </section>

</main>

<?php get_footer(); ?>