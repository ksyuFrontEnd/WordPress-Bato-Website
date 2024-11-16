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
            <div class="faq-section__image">
            <?php 
                $faq_image = get_field('faq_image');
                if( !empty( $faq_image ) ): ?>
                    <img src="<?php echo esc_url($faq_image['url']); ?>" alt="<?php echo esc_attr($faq_image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="faq-section__wrapper">
                <h2 class="faq-section__title section-title"><?php the_field( 'faq_title' ); ?></h2>
                <p class="section-text"><?php the_field( 'faq_text' ); ?></p>
                
                <!-- Accordion -->
                <?php if (have_rows('faq_items')) : ?>
                    <div class="accordion">
                        <?php while (have_rows('faq_items')) : the_row(); ?>
                            <?php
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                            ?>
                            <div class="accordion-item">
                                <button class="accordion-header">
                                    <span><?php echo esc_html($question); ?></span>
                                    
                                    <span class="icon">
                                        <svg class="icon-plus" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5V19.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 12.5H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <svg class="icon-minus" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 12.5H19" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-content">
                                    <p><?php echo esc_html($answer); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
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
