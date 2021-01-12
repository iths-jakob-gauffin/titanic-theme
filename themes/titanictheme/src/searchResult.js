const searchResult = () => {
    (function($) {
        $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
        $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');
    })(jQuery);
};

export default searchResult;
