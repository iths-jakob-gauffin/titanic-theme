const searchResult = () => {
    (function($) {
        let test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'))      

        test.map(card => {
            let text = card.nextSibling.nextSibling;
            text.classList.add("detailToFlex");
            let cost = text.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
            cost.classList.add("detailToFlex");
        })

        let roomCards = Array.from(document.querySelectorAll('.mphb-room-type'));

        roomCards.map(room => {
            let stuff = Array.from(room.querySelectorAll(".detailToFlex"));
            let wrapper = document.createElement("div");
            stuff.map(flexitem => {
                wrapper.insertAdjacentElement("beforeend", flexitem)
            })
            wrapper.classList.add("detailFlexWrapper");

            let reserveStuff = room.querySelector(".mphb-reserve-room-section");
            room.insertBefore(wrapper, reserveStuff);
            let cost = room.querySelector(".mphb-price").innerText;
            
            let period = room.querySelector('.mphb-price-period').innerText;
            let priceDOM = room.querySelector(".mphb-regular-price.detailToFlex");
            let priceString = cost + " " + period + ".";
            let priceParagraph = document.createElement("p");
            priceParagraph.innerText = priceString;
            priceParagraph.className = "priceString";
            
            priceDOM.innerHTML = "";
            priceDOM.appendChild(priceParagraph);
        })

        
    })(jQuery);
};

export default searchResult;
