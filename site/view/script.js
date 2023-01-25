function PiscineClickEvent (picture) {

    console.log(picture.getAttribute("value"));
    let listPictureValue = picture.getAttribute("value").split("*");

    let SwimmingPoolTitle = document.getElementById("FocusSwimmingPool--Title");
    let SwimmingPoolAddress= document.getElementById("FocusSwimmingPool--Address");
    let SwimmingPoolDescriptif= document.getElementById("FocusSwimmingPool--Descriptif");
    let SwimmingPoolMap = document.getElementById("FocusSwimmingPool--Map");

    SwimmingPoolTitle.innerHTML = listPictureValue[0];
    SwimmingPoolAddress.innerHTML = listPictureValue[1];
    SwimmingPoolDescriptif.innerHTML = listPictureValue[2];
    SwimmingPoolMap.setAttribute("src",listPictureValue[3]);

    SwimmingPoolMap.scrollIntoView({behavior:'smooth'})
}