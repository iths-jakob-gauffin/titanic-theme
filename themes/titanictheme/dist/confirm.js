const confirmBooking = () => {
    (function($) {
        $("#mphb-booking-details").wrap('<div class="bookDetail"></div>');
        $("#mphb-price-details").wrap('<div class="bookDetail"></div>');
        $(".bookDetail").wrapAll('<div class="bookDetails"></div>');

        let harborBooking = document.querySelector('.mphb-room-number');
        console.log("🚀 ~ file: confirm.js ~ line 8 ~ confirmBooking ~ harborBooking", harborBooking)

        let harborTextPlace = document.querySelector('.Search__Title');
        let harborText = harborTextPlace.innerText.split(" ");

        harborBooking.innerHTML = "";
        harborBooking.innerHTML = "<h3 class='Booking__ConfirmationHarbor'>" + harborText[0] + " gästhamn</h3>";


        $(".mphb-customer-details").wrap("<div class='Booking__CustomerFormWrapper'></div>");
        // $(".stuffToFlex").wrap("<div class='Booking__CustomerFormWrapper'></div>");
        
        // let customerWrapper = document.querySelector('.Booking__CustomerFormWrapper');
        
        let element = "<div class='Booking__CustomerFormWrapper'><div class='Booking__TextAndIconWrapper'><div class='Booking__QuestionTextWrapper'><h3 class='Booking__AnyQuestionsTitle'>Frågor?</h3><h4 class='Booking__AnyQuestionsText'>Ring oss på +46 123 45 67</h4></div><div class='Booking__IconWrapper'></div></div>"
        $(".Booking__CustomerFormWrapper").append(element);
        let stuff = document.querySelector('.Booking__IconWrapper');
        // console.log("🚀 ~ file: confirm.js ~ line 23 ~ confirmBooking ~ stuff", stuff);
        stuff.innerHTML = `<svg width="50" height="50" viewBox="0 0 50 50" fill="black" xmlns="http://www.w3.org/2000/svg">
        <path d="M25 0C11.1929 0 0 11.1929 0 25C0 38.8071 11.1929 50 25 50C38.8071 50 50 38.8071 50 25C50 11.1929 38.8071 0 25 0ZM16.0156 9.93042C16.5307 9.90004 16.9963 10.2079 17.3493 10.7544L20.7672 17.2363C21.1271 18.0044 20.9226 18.8268 20.3858 19.3756L18.8202 20.9411C18.7236 21.0735 18.66 21.2227 18.6585 21.3867C19.2588 23.7106 21.08 25.8543 22.6868 27.3285C24.2936 28.8026 26.0205 30.7985 28.2623 31.2713C28.5394 31.3486 28.8789 31.3763 29.0772 31.192L30.896 29.3396C31.5238 28.8638 32.4321 28.6331 33.1024 29.0223H33.1329L39.3005 32.663C40.2058 33.2305 40.2996 34.3273 39.6514 34.9945L35.4035 39.209C34.7761 39.8523 33.9427 40.0686 33.133 40.0696C29.5518 39.9623 26.1681 38.2046 23.3888 36.3983C18.8267 33.0795 14.642 28.9631 12.0148 23.9899C11.0072 21.9045 9.82358 19.2436 9.93654 16.916C9.94663 16.0403 10.1835 15.1824 10.8002 14.618L15.0483 10.37C15.3792 10.0884 15.7065 9.94867 16.0156 9.93042V9.93042Z" fill="#D8E3EC"/>
        </svg>`;
        $(".Booking__CustomerFormWrapper").wrapAll("<div class='Booking__CustomerAndQuestionWrapper'></div>");
        // let grej = document.querySelector('.stuffToFlex');
        // stuff.innerHTML = grej.innerHTML;
        // $(".Booking__IconWrapper").html("<i class='far fa-credit-card'></i>");
        // $(".Booking__CustomerFormWrapper").html("<div class='Booking__AnyQuestionsWrapper'><div class='Booking__TextAndIconWrapper'><h3 class='Booking__AnyQuestionsTitle'>Frågor?</h3><h4 class='Booking__AnyQuestionsText'>Kontakta oss på +46 123 4567</h4><div><i class='far fa-credit-card'></i></div></div></div>");

    })(jQuery);
};

confirmBooking();
