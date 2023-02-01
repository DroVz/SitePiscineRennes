function PiscineClickEvent (picture) {

    let listPictureValue = picture.getAttribute("value").split("*");
    let otherPictures =  document.getElementsByClassName("SwimmingPool--Img");

    let SwimmingPoolTitle = document.getElementById("FocusSwimmingPool--Title");
    let SwimmingPoolAddress= document.getElementById("FocusSwimmingPool--Address");
    let SwimmingPoolDescriptif= document.getElementById("FocusSwimmingPool--Descriptif");
    let SwimmingPoolMap = document.getElementById("FocusSwimmingPool--Map");

    SwimmingPoolTitle.innerHTML = listPictureValue[0];
    SwimmingPoolAddress.innerHTML = listPictureValue[1];
    SwimmingPoolDescriptif.innerHTML = listPictureValue[2];
    SwimmingPoolMap.setAttribute("src",listPictureValue[3]);

    Array.from(otherPictures).forEach(element => {
        console.log(element)
        element.style.opacity = 0.5;
    });

    picture.style.opacity = 1.0;

    SwimmingPoolMap.scrollIntoView({behavior:'smooth',block:'center'})
}