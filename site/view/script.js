// -----------------------------------------------------------------------------------------------------------------------------------------------
var navigationTarget = document.getElementById("navigation__list");
var navigationItemTarget = navigationTarget.childNodes;

var cssObject;
var childA;
var cssChildObject;
//Mouseenter event 
navigationItemTarget.forEach(element => {
  element.addEventListener("mouseenter",function( event ) {

  cssObject = window.getComputedStyle(event.target, null);

  childA = getChild(event.target)
  cssChildObject = window.getComputedStyle(childA, null);
  console.log(cssChildObject.color)

  event.target.style.backgroundColor = updateBackgroundColor(cssObject);
  childA.style.color = updateColor(cssChildObject);

  });
});

//Mouseleave event
navigationItemTarget.forEach(element => {
  element.addEventListener("mouseleave",function( event ) {

  cssObject = window.getComputedStyle(event.target, null);

  childA = getChild(event.target)
  cssChildObject = window.getComputedStyle(childA, null);
  console.log(cssChildObject.color)

  event.target.style.backgroundColor = updateBackgroundColor(cssObject);
  childA.style.color = updateColor(cssChildObject);

  });
});

// Retourne en tant q'enfant la balise <a> de <li> parent
  function getChild(parent){
    let child;
    let childList = parent.childNodes;
    childList.forEach(element => {
      if (element.tagName == "A" ){
        child = element;
      }
    })
    return child;
  }

// Change la couleur du background 
 function updateBackgroundColor(element){
   let setBackgroundColor = "";
   switch(element.backgroundColor){
      case "rgb(255, 255, 255)" :
        setBackgroundColor = "rgb(0, 120, 247)";
        break;
      case "rgb(0, 120, 247)":
        setBackgroundColor = "rgb(255, 255, 255)";
        break;
   }
   return setBackgroundColor;
 }

// Change la couleur du text 
 function updateColor(element){
   let setColor = "";
   switch(element.color){
      case "rgb(255, 255, 255)" :
        setColor = "rgb(0, 120, 247)";
        break;
      case "rgb(0, 120, 247)":
        setColor = "rgb(255, 255, 255)";
        break;
   }
   return setColor;
  }
//-----------------------------------------------------------------------------------------------------------------------------------------------------
var ImgDivTarget = document.getElementById("choix__list");
var ImgTarget = ImgDivTarget.childNodes;
console.log(getChild(ImgDivTarget))

//Mouseenter event 
ImgDivTarget.forEach(element => {
  element.addEventListener("mouseenter",function( event ) {

  cssObject = window.getComputedStyle(event.target, null);

  childA = getChild(event.target)
  cssChildObject = window.getComputedStyle(childA, null);
  console.log(cssChildObject.color)

  event.target.style.backgroundColor = updateBackgroundColor(cssObject);
  childA.style.color = updateColor(cssChildObject);

  });
});

// Retourne en tant q'enfant les balises <img> de <div> parent
function getChild(parent){
  let child;
  let childList = parent.childNodes;
  childList.forEach(element => {
    if (element.tagName == "A" ){
      child = element;
    }
  })
  return child;
}