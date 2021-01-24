const Cards = () => {
    let cards = Array.from(document.querySelectorAll('.ArchiveHarbor__HarborCard'));
    console.log("🚀 ~ file: cards.js ~ line 3 ~ Cards ~ cards", cards)
    

    setTimeout(()=>{
        cards.map(card => {
            card.classList.remove("ArchiveHarbor__HarborCard--Drop");
        })
    }, 300)
}

export default Cards;