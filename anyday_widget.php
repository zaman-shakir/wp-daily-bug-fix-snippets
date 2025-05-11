<?php add_action('wp_head', function () { ?>
<script src="https://my.anyday.io/price-widget/anyday-price-widget.js" type="module" async></script>

<script>
jQuery(document).ready(function($) {

    var tok = '4fb221f5d0c44b70aa96b54933f69a47';
    var shop_name= 'sportyfit.dk';

    var anydayPriceWidget = $('<anyday-price-widget style="display: none;justify-content: flex-start;margin: 13px 0 -3px 0px;font-weight: 500;color:#000;" currency="DKK" price-selector=""  token="'+tok+'" price-format-locale="da-DK" locale="da-DK" theme="light" shop-name="'+shop_name+'" custom-css=""></anyday-price-widget>');

    function updateWidgets() {
        var isVariable = $('.variations select').length > 0;
        var isOnSale = $('#prisbox p.elementor-heading-title').has('del').length > 0;
        var isVariationOnSale = $('.single_variation_wrap .woocommerce-variation-price').has('del').length > 0;
        var hasVariationPrice = $('.single_variation_wrap .price').length > 0;

        var priceSelector;
        if (isVariable && hasVariationPrice) {
            if (isVariationOnSale) {
                priceSelector = '.single_variation_wrap .price ins .woocommerce-Price-amount.amount bdi';
            } else {
                priceSelector = '.single_variation_wrap .price .woocommerce-Price-amount.amount bdi';
            }
        } else {
            if (isOnSale) {
                priceSelector = '#prisbox p.elementor-heading-title ins .woocommerce-Price-amount.amount bdi';
            } else {
                priceSelector = '#prisbox p.elementor-heading-title .woocommerce-Price-amount.amount bdi';
            }
        }

        anydayPriceWidget.attr('price-selector', priceSelector);
        $('anyday-price-widget').remove();
        var clonedWidget = anydayPriceWidget.clone();
        clonedWidget.css('display', 'flex');
        $('#prisbox p.elementor-heading-title').after(clonedWidget);
    }

    function handleVariationUpdate() {
        setTimeout(updateWidgets, 100);
    }

    updateWidgets();
    $('.variations select').on('click', handleVariationUpdate);
    $(document.body).on('woocommerce_variation_select_change', handleVariationUpdate);
    $(document.body).on('woocommerce_variation_has_changed', handleVariationUpdate);

    var divcart = $('<anyday-price-widget style="display: flex;justify-content: center;margin: 0 0 5px 0;font-weight: 500;color:#000;" currency="DKK" price-selector=".order-total .woocommerce-Price-amount.amount bdi" token="'+tok+'" price-format-locale="da-DK" locale="da-DK" theme="light" shop-name="'+shop_name+'" custom-css=""></anyday-price-widget>');
    $(".wc-proceed-to-checkout").before($(divcart));
});
</script>

<?php });
