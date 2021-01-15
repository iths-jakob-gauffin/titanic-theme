const accommodationSingle = () => {
    (function($) {
        $(".mphb-calendar-title").wrap('<div class="leftWrapper"></div>');
        $(".mphb-calendar").wrap('<div class="leftWrapper"></div>');
        $(".mphb-reservation-form-title").wrap('<div class="leftWrapper"></div>');
        $(".mphb-booking-form").wrap('<div class="leftWrapper" id="special"></div>');
        
        $(".leftWrapper").wrapAll('<div class="bookingWrapper"></div>');
        
        $(".mphb-check-in-date-wrapper").wrap('<div class="checkWrapper"></div>');
        $(".mphb-check-out-date-wrapper").wrap('<div class="checkWrapper"></div>');
        $(".checkWrapper").wrapAll('<div class="dateWrapper"></div>');
        
        $(".mphb-capacity-wrapper").wrapAll('<div class="capacityWrapper"></div>');
        $(".dateWrapper").wrapAll('<div class="confirmWrapper"></div>');
        
        $(".mphb-reserve-btn-wrapper").wrap('<div class="rightConfirmWrapper"></div>');
        $(".mphb-errors-wrapper").wrap('<div class="rightConfirmWrapper"></div>');
        $(".mphb-reserve-room-section").wrap('<div class="rightConfirmWrapper"></div>');
        $(".rightConfirmWrapper").wrapAll('<div class="confirmWrapper"></div>');

        let test = document.querySelector('.mphb-price').innerText;
        let test2 = document.querySelector('.mphb-price-period').innerText;

        let sum = test.split("kr").join("");

        let currency = test.slice(0,2);

        let priceString = sum + " " + currency + " " + test2;

        let place = document.querySelector('#special');

        let priceParagraph = document.createElement("p");
        priceParagraph.innerText = priceString;
        priceParagraph.className = "priceString";
        place.appendChild(priceParagraph);



        let harborGallery = document.querySelector('.mphb-room-type-gallery-wrapper');
        let harborTextPlace = document.querySelector('.Search__Title');
        let harborText = harborTextPlace.innerText.split(" ");
        
        let harborGalleryHeader = document.createElement("h3");
        harborGalleryHeader.innerText = "Bilder från hamnen i " +  harborText[0];
        harborGallery.appendChild(harborGalleryHeader);
        
        

    })(jQuery);
};

accommodationSingle();
