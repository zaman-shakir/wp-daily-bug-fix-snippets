<?php
?>
<div class="top-banner-slider" style="display: none;">
<?php
// Check if the ACF repeater field exists
if (have_rows('header_top_animation_texts', 'option')):
    while (have_rows('header_top_animation_texts', 'option')): the_row();
        if (get_sub_field('first_text')):
            $first_icon = get_sub_field('first_text_icon');
            $first_icon_url = '';
            if (is_array($first_icon) && isset($first_icon[0])) {
                $first_icon_url = $first_icon[0];
            }
            ?>
            <div class="banner-line" <?php if (!empty($first_icon_url)): ?>style="--icon-url: url('<?php echo esc_url($first_icon_url); ?>');"<?php endif; ?>>
                <?php echo esc_html(get_sub_field('first_text')); ?>
            </div>
        <?php endif;
        if (get_sub_field('second_text')):
            $second_icon = get_sub_field('second_text_icon');
            $second_icon_url = '';
            if (is_array($second_icon) && isset($second_icon[0])) {
                $second_icon_url = $second_icon[0];
            }
            ?>
            <div class="banner-line" <?php if (!empty($second_icon_url)): ?>style="--icon-url: url('<?php echo esc_url($second_icon_url); ?>');"<?php endif; ?>>
                <?php echo esc_html(get_sub_field('second_text')); ?>
            </div>
        <?php endif;
        if (get_sub_field('third_text')):
            $third_icon = get_sub_field('third_text_icon');
            $third_icon_url = '';
            if (is_array($third_icon) && isset($third_icon[0])) {
                $third_icon_url = $third_icon[0];
            }
            ?>
            <div class="banner-line" <?php if (!empty($third_icon_url)): ?>style="--icon-url: url('<?php echo esc_url($third_icon_url); ?>');"<?php endif; ?>>
                <?php echo esc_html(get_sub_field('third_text')); ?>
            </div>
        <?php endif;
    endwhile;
endif; ?>
</div>


<style>
@media (max-width: 768px) {
	.header__bar-aside, .header__bar-content, .header__bar-actions{
		display:none;
	}
  .top-banner-slider {
    position: relative;
    height: 32px;
    overflow: hidden;
    font-size: 12px;
    font-weight: 500;
    color: #000;
    padding-left: 1rem;
    display: flex !important;
    flex-direction: row;
    align-items: center;
    justify-content: center;
  }

  .banner-line {
    position: absolute;
    width: 100%;
    text-align: center;
    z-index: 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    animation: showLine 9s ease-in-out infinite;
  }

  /* Add icon before text if icon URL is provided */
  .banner-line[style*="--icon-url"]::before {
    content: '';
    display: inline-block;
    width: 1em;
    height: 1em;
    margin-right: 5px;
    vertical-align: middle;
    background-image: var(--icon-url);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
  }

  .banner-line:nth-child(1) { animation-delay: 0s; }
  .banner-line:nth-child(2) { animation-delay: 3s; }
  .banner-line:nth-child(3) { animation-delay: 6s; }

  @keyframes showLine {
    0% {
      opacity: 0;
      visibility: hidden;
      transform: translateY(20px);
      z-index: 0;
    }
    10% {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
      z-index: 1;
    }
    30% {
      opacity: 1;
      transform: translateY(0);
    }
    40% {
      opacity: 0;
      transform: translateY(-20px);
      visibility: hidden;
      z-index: 0;
    }
    100% {
      opacity: 0;
      transform: translateY(-20px);
      visibility: hidden;
      z-index: 0;
    }
  }
}

</style>
