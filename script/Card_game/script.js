const cards = document.querySelectorAll(".card");

let matchedCard = 0;
let cardOne, cardTwo;
let disableDeck = false;

function flipCard(e) {
  let clickedCard = e.target; //getting user clicked card
  if (clickedCard !== cardOne && !disableDeck) {
    clickedCard.classList.add("flip");
    if (!cardOne) {
      //return the cardOne value to clicked card
      return (cardOne = clickedCard);
    }
    cardTwo = clickedCard;
    disableDeck = true;
    let cardOneimg = cardOne.querySelector(".back-view img").src,
      cardTwoimg = cardTwo.querySelector(".back-view img").src;
    matchCards(cardOneimg, cardTwoimg);
  }
}

function matchCards(img1, img2) {
  if (img1 === img2) {
    // if two cards img matched
    matchedCard++;
    if (matchedCard == 8) {
      setTimeout(() => {
        return shuffleCard();
      }, 1000); //calling shuffleCard function after 1 sec
    }
    cardOne.removeEventListener("click", flipCard);
    cardTwo.removeEventListener("click", flipCard);
    cardOne = cardTwo = ""; //setting both card value to blank
    return (disableDeck = false);
  }

  //if two card not matched
  setTimeout(() => {
    // adding shake class to both card after 400ms
    cardOne.classList.add("shake");
    cardTwo.classList.add("shake");
  }, 400);
  setTimeout(() => {
    // adding shake class to both card after 400ms
    cardOne.classList.remove("shake", "flip");
    cardTwo.classList.remove("shake", "flip");
    cardOne = cardTwo = ""; //setting both card value to blank
    disableDeck = false;
  }, 1200);
}

function shuffleCard() {
  matchedCard = 0;
  cardOne = cardTwo = "";
  disableDeck = false;
  let arr = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
  arr.sort(() => (Math.random() > 0.5 ? 1 : -1)); // sorting array item randomly

  //removing flip class from all cards and pssing random image to each card
  cards.forEach((card, i) => {
    card.classList.remove("flip");
    let imgTag = card.querySelector("img");
    imgTag.src = `images/img-${arr[i]}.png`;
    card.addEventListener("click", flipCard);
  });
}

shuffleCard();

cards.forEach((card) => {
  //adding click event to all cards
  card.addEventListener("click", flipCard);
});
