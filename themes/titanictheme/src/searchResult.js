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

        
        let answerDOM = document.querySelector('h2.SearchResults__QueryTitle'); 

        let amountOfHarbors = test.length;
        let answerString = "";
        if(amountOfHarbors !== 0 && amountOfHarbors !== 1){
            answerString = amountOfHarbors + " hamnar";
        } else if(amountOfHarbors === 1){
            answerString = amountOfHarbors + " hamn";
        } else{
            answerString = false;
        };

        let string = answerString ? `Det går att boka plats på ${answerString} mellan dina valda datum.` : `Det finns tyvärr inga lediga platser mellan dina valda datum. Försök igen med andra datum.`;
        answerDOM.innerText = string;

        
    })(jQuery);
};

export default searchResult;
