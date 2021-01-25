const cards = () => {
    let cards = Array.from(document.querySelectorAll('.ArchiveHarbor__HarborCard'));

    setTimeout(()=>{
        cards.map(card => {
            card.classList.remove("ArchiveHarbor__HarborCard--Drop");
        })
    }, 300)
}

cards();