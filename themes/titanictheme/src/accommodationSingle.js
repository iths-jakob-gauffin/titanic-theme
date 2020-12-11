const acommodationSingle = () => {
    (function($) {
        $(".mphb-details-title").wrap('<div class="leftWrapper"></div>');
        $(".mphb-single-room-type-attributes").wrap(
            '<div class="leftWrapper"></div>'
        );
        $(".mphb-regular-price").wrap('<div class="leftWrapper"></div>');
        $(".leftWrapper").wrapAll('<div class="halfWrapper"></div>');

        $(".mphb-calendar-title").wrap('<div class="rightWrapper"></div>');
        $(".mphb-calendar").wrap('<div class="rightWrapper"></div>');
        $(".rightWrapper").wrapAll('<div class="halfWrapper"></div>');

        $(".halfWrapper").wrapAll('<div class="fullWrapper"></div>');
    })(jQuery);
};

export default acommodationSingle;
