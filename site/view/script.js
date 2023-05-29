function PiscineClickEvent(picture) {
  let listPictureValue = picture.getAttribute("value").split("*");
  let otherPictures = document.getElementsByClassName("SwimmingPool--Img");

  let SwimmingPoolTitle = document.getElementById("FocusSwimmingPool--Title");
  let SwimmingPoolAddress = document.getElementById(
    "FocusSwimmingPool--Address"
  );
  let SwimmingPoolDescriptif = document.getElementById(
    "FocusSwimmingPool--Descriptif"
  );
  let SwimmingPoolMap = document.getElementById("FocusSwimmingPool--Map");

  SwimmingPoolTitle.innerHTML = listPictureValue[0];
  SwimmingPoolAddress.innerHTML = listPictureValue[1];
  SwimmingPoolDescriptif.innerHTML = listPictureValue[2];
  SwimmingPoolMap.setAttribute("src", listPictureValue[3]);

  Array.from(otherPictures).forEach((element) => {
    console.log(element);
    element.style.opacity = 0.5;
  });

  picture.style.opacity = 1.0;

  SwimmingPoolMap.scrollIntoView({ behavior: "smooth", block: "center" });
}

function setNotClicked(element) {
  element.classList.add("btnNotClicked");
  element.classList.remove("btnClicked");
}

function setInvisible(element) {
  element.classList.add("divInvisible");
  element.classList.remove("divVisible");
}

function paymentClickEvent(button) {
  let choix = button.getAttribute("name");
  let choiceDiv = null;
  let allChoiceDiv = null;

  allChoiceDiv = document.getElementsByClassName("divPaymentOption");
  choiceDiv = document.getElementById(choix);
  console.log(choiceDiv);
  console.log(allChoiceDiv);

  for (let item of allChoiceDiv) {
    setInvisible(item);
  }
  choiceDiv.classList.remove("divInvisible");
  choiceDiv.classList.add("divVisible");
}

function adminClickEvent(button) {
  let choix = button.getAttribute("name");
  let allChoiceBtn = null;
  let choiceDiv = null;
  let allChoiceDiv = null;
  allChoiceBtn = document.getElementsByClassName("btnAdminOption");
  choiceDiv = document.getElementById(choix);
  allChoiceDiv = document.getElementsByClassName("divAdminOption");

  for (let item of allChoiceDiv) {
    setInvisible(item);
  }
  choiceDiv.classList.remove("divInvisible");
  choiceDiv.classList.add("divVisible");

  for (let item of allChoiceBtn) {
    setNotClicked(item);
  }
  button.classList.remove("btnNotClicked");
  button.classList.add("btnClicked");
}

function setBookingEvent(id) {
  const clickedLi = document.getElementById(id);

  // Ajouter l'élément li à la liste de réservations
  const bookingList = document.getElementById("bookingReserve");
  bookingList.appendChild(clickedLi);

  // Pemet de demander ou d'envoyer des données sans actualiser la page.
  $.ajax({
    url: '"index.php?action=bookingNewLesson&step=addBooking"',
    type: "POST",
    data: {
      lesson_id: id,
    },
  });
}
