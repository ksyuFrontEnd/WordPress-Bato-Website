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
            <div class="testimonials__wrapper">
                <?php

                if( have_rows( 'testimonials__cards') ): ?>
                    <div class="swiper testimonials__cards">
                        <div class="swiper-wrapper">
                            <?php

                            while( have_rows('testimonials__cards') ) : the_row();

                                $testimonials_text = get_sub_field('testimonials_text');
                                $testimonials_icon = get_sub_field('testimonials_icon');
                                $testimonials_name = get_sub_field('testimonials_name');
                                $testimonials_position = get_sub_field('testimonials_position');

                                ?>

                                <div class="swiper-slide testimonials__card">
                                    <div class="testimonials__card-text">
                                        <?php echo esc_html( $testimonials_text ); ?>
                                    </div>
                                    <div class="testimonials__card-person">
                                        <div class="person-image">
                                            <?php if ($testimonials_icon && is_array($testimonials_icon)) : ?>
                                                <img src="<?php echo esc_url($testimonials_icon['url']); ?>" alt="<?php echo esc_attr($testimonials_icon['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="person-info">
                                            <p class="person-info__name"><?php echo esc_html( $testimonials_name ); ?></p>
                                            <p class="person-info__position"><?php echo esc_html( $testimonials_position ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                    
                            <?php endwhile; ?>
                        </div> <!--./swiper-wrapper -->
                    </div> <!--./swiper testimonials__cards -->

                <?php else : ?>
                    <p>We can do nothing.</p>
                <?php endif; ?>
            </div> <!-- ./testimonials__wrapper -->
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
        <style>
            .contact-section {
                background-image: url("<?php the_field('contact-section__background') ?>"); 
            }
        </style>
        <div class="container">
            <div class="contact-section__wrapper">
                <h2 class="contact-section__title section-title"><?php the_field( 'contact-section__title' ); ?></h2>
                <button id="contactBtn" class="contact-button">Contact Us</button>
                <!-- Modal -->
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5969 2.69746L17.1725 0.273098L9.89941 7.5462L2.62632 0.273097L0.20195 2.69746L7.47505 9.97056L0.20195 17.2437L2.62632 19.668L9.89941 12.3949L17.1725 19.668L19.5969 17.2437L12.3238 9.97056L19.5969 2.69746Z" fill="white"/>
                            </svg>
                        </span>
                        <h2 class="contact-title">Contact Us</h2>
                        <form id="contactForm" class="contact-form">
                            <div class="contactForm__person">
                                <div class="input-wrapper">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required>
                                </div>

                                <div class="input-wrapper">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required>
                                </div>
                            </div>
                            
                                <label for="email">Your email</label>
                                <input type="email" id="email" name="email" required>
                            

                            <label for="company">Company name (optional)</label>
                            <input type="email" id="email" name="email">
                            
                            <label for="enqiry">Enqiry</label>
                            <input id="message" name="message" rows="1" required></input>

                            <div class="checkbox-container">
                                <input type="checkbox" id="agree" name="agree" required>
                                <label for="agree">
                                    I agree to the 
                                    <a href="#" target="_blank">Terms of Use</a> and 
                                    <a href="#" target="_blank">Privacy Policy</a>
                                </label>
                            </div>
                            
                            <button type="submit" class="submit-btn">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
