const searchResult = () => {
    (function($) {
        // $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
        // $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');

        // $(".mphb-room-type-title").wrap('<div class="detailWrapper"></div>');
        // $(".mphb-loop-room-type-attributes").wrap('<div class="detailWrapper"></div>');
        // $(".detailWrapper").wrapAll('<div class="detailsWrapper"></div>');

        let test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'))
        console.log("🚀 ~ file: searchResult.js ~ line 11 ~ searchResult ~ test", test);

       
        

        test.map(card => {
            let text = card.nextSibling.nextSibling;
            console.log("🚀 ~ file: searchResult.js ~ line 15 ~ searchResult ~ text", text)

            text.classList.add("detailToFlex");
            let cost = text.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
            console.log("🚀 ~ file: searchResult.js ~ line 19 ~ searchResult ~ cost", cost)

            cost.classList.add("detailToFlex");

            
        })

        let roomCards = Array.from(document.querySelectorAll('.mphb-room-type'));
        console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", roomCards);

        roomCards.map(room => {
            let stuff = Array.from(room.querySelectorAll(".detailToFlex"));
            let wrapper = document.createElement("div");
            stuff.map(flexitem => {
                wrapper.insertAdjacentElement("beforeend", flexitem)
            })
            wrapper.classList.add("detailFlexWrapper");

            let reserveStuff = room.querySelector(".mphb-reserve-room-section");
            room.insertBefore(wrapper, reserveStuff);
        })

        

        

        
        // let paragraph = test[0].nextSibling.nextSibling;


        // paragraph.classList.add("detailToFlex");

        // console.log("🚀 ~ file: searchResult.js ~ line 13 ~ searchResult ~ paragraph", paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling);

        // let price = paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
        // price.classList.add("detailToFlex");
        // console.log("🚀 ~ file: searchResult.js ~ line 17 ~ searchResult ~ price", price)

        // let rooms = Array.from(document.querySelectorAll('.mphb-room-type'));
        // console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", rooms)

        // let details = rooms[0].querySelectorAll(".detailToFlex");
        // console.log("🚀 ~ file: searchResult.js ~ line 20 ~ searchResult ~ details", details);

        // let detailWrapper = document.createElement("div");
        // detailWrapper.insertAdjacentElement("beforeend", details[0]);
        // detailWrapper.insertAdjacentElement("beforeend", details[1]);
        // detailWrapper.classList.add("detailFlexWrapper");
        
        // let reserveBox = rooms[0].querySelector(".mphb-reserve-room-section");
        // console.log("🚀 ~ file: searchResult.js ~ line 36 ~ searchResult ~ reserveBox", reserveBox)

        // rooms[0].insertBefore(detailWrapper, reserveBox);
        

        
    })(jQuery);
};

export default searchResult;




// const searchResult = () => {
//     (function($) {
//         // $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
//         // $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');

//         // $(".mphb-room-type-title").wrap('<div class="detailWrapper"></div>');
//         // $(".mphb-loop-room-type-attributes").wrap('<div class="detailWrapper"></div>');
//         // $(".detailWrapper").wrapAll('<div class="detailsWrapper"></div>');

//         let test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'))
//         // console.log("🚀 ~ file: searchResult.js ~ line 11 ~ searchResult ~ test", test[0].nextSibling.nextSibling);
//         let paragraph = test[0].nextSibling.nextSibling;
//         paragraph.classList.add("detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 13 ~ searchResult ~ paragraph", paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling);
//         let price = paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
//         price.classList.add("detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 17 ~ searchResult ~ price", price)

//         let rooms = Array.from(document.querySelectorAll('.mphb-room-type'));
//         console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", rooms)

//         let details = rooms[0].querySelectorAll(".detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 20 ~ searchResult ~ details", details);

//         let detailWrapper = document.createElement("div");
//         // detailWrapper.innerHTML = details
//         // details.map(detail => {
//             detailWrapper.insertAdjacentElement("beforeend", details[0]);
//             detailWrapper.insertAdjacentElement("beforeend", details[1]);
//             // detailWrapper.innerHTML = details[1];
//         // })
//         detailWrapper.classList.add("detailFlexWrapper");
        
//         // console.log(detailWrapper);
//         let reserveBox = rooms[0].querySelector(".mphb-reserve-room-section");
//         console.log("🚀 ~ file: searchResult.js ~ line 36 ~ searchResult ~ reserveBox", reserveBox)

//         rooms[0].insertBefore(detailWrapper, reserveBox);
        

        
//     })(jQuery);
// };

// export default searchResult;
