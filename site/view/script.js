function PiscineClickEvent(picture) {

    let listPictureValue = picture.getAttribute("value").split("*");
    let otherPictures = document.getElementsByClassName("SwimmingPool--Img");

    let SwimmingPoolTitle = document.getElementById("FocusSwimmingPool--Title");
    let SwimmingPoolAddress = document.getElementById("FocusSwimmingPool--Address");
    let SwimmingPoolDescriptif = document.getElementById("FocusSwimmingPool--Descriptif");
    let SwimmingPoolMap = document.getElementById("FocusSwimmingPool--Map");

    SwimmingPoolTitle.innerHTML = listPictureValue[0];
    SwimmingPoolAddress.innerHTML = listPictureValue[1];
    SwimmingPoolDescriptif.innerHTML = listPictureValue[2];
    SwimmingPoolMap.setAttribute("src", listPictureValue[3]);

    Array.from(otherPictures).forEach(element => {
        console.log(element)
        element.style.opacity = 0.5;
    });

    picture.style.opacity = 1.0;

    SwimmingPoolMap.scrollIntoView({ behavior: 'smooth', block: 'center' })
}

function PaymentClickEvent(button) {
    let choix = button.getAttribute("name");
    let choiceDiv = null;
    let otherChoiceDiv = null;

    switch (choix) {
        case "cb":
            choiceDiv = document.getElementById("CB--div");
            otherChoiceDiv = document.getElementById("PayPal--div");
            break;
        case "pp":
            choiceDiv = document.getElementById("PayPal--div");
            otherChoiceDiv = document.getElementById("CB--div");
            break;
    }
    choiceDiv.style.display = "block";
    otherChoiceDiv.style.display = "none";
}
function setBookingEvent(id){
    const clickedLi = document.getElementById(id);

    // Ajouter l'élément li à la liste de réservations
    const bookingList = document.getElementById("bookingReserve");
    bookingList.appendChild(clickedLi);

// Pemet de demander ou d'envoyer des données sans actualiser la page. 
    $.ajax({
        url: '"index.php?action=bookingNewLesson&step=addBooking"',
        type: 'POST',
        data: {
          lesson_id: id,
        }
      });
}