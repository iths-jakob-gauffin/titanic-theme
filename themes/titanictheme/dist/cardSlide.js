const cards = () => {
    let cards = Array.from(document.querySelectorAll('.ArchiveHarbor__HarborCard'));

    setTimeout(()=>{
        cards.map(card => {
            card.classList.remove("ArchiveHarbor__HarborCard--Drop");
        })
    }, 300);

    setTimeout(()=>{
        cards.map(card => {
            card.classList.add("ArchiveHarbor__HarborCard--Hover");
        })
    }, 1500);
}

cards();