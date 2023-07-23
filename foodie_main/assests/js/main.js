let navbarctl = document.getElementById("navbarcontrol");
let bandhead = document.querySelectorAll(".bandhead-content")
navbarctl.addEventListener("click", e => {
    if ($('.collapse').is(':visible')) {
        $('.collapse').collapse('hide');
    }
    let sectionbar = document.getElementById("mobilesectionbar");
    if(sectionbar.style.display == 'none' || !sectionbar.style.display ){
        sectionbar.style.display = "block";
        if(bandhead){
            bandhead[0].style.transform = "translateX(50%)";
            bandhead[0].style.transition = "all 1s";
        }
    } else {
        sectionbar.style.display = "none";
        if(bandhead){
            bandhead[0].style.transform = "translateX(0%)";
            bandhead[0].style.transition = "all 1s";
        }
    }
})

let mobilesectionbar = document.getElementById("mobilesectionbar");
window.addEventListener ("scroll",(e) => {
    if(mobilesectionbar)
        mobilesectionbar.style.display = "none";
    if(bandhead){
        bandhead[0].style.transform = "translateX(0%)";
        bandhead[0].style.transition = "all 1s";
    }

    let mobileLeftMenuUl = document.querySelectorAll(".nav-item ul")
    if(mobileLeftMenuUl.length > 0){
        mobileLeftMenuUl.forEach(ul => {
            if(ul.classList.contains("show")){
                ul.classList.remove("show")
            }
        })
    }

    let mobileLeftMenuA = document.querySelectorAll(".nav-item a")
    if(mobileLeftMenuA.length > 0){
        mobileLeftMenuA.forEach(a => {
            if(!a.classList.contains("collapsed")){
                a.classList.add("collapsed")
                a.setAttribute('aria-expanded',"false")
            }
        })
    }
})

let galleryImgCount = 0
let gallery = document.querySelectorAll(".gallery img")
let gallerycon = document.querySelectorAll(".gallery figure")
let threshold = 330
let currentImgSize = threshold
function resizeGallery (ratio){
    if (gallery && gallery.length > 0){
        galleryImgCount = gallery.length
        let sw = $(window).width()
        if(sw*ratio <= threshold) {
            for (let i = 0; i < gallery.length; i++) {
                currentImgSize = threshold
                gallery[i].style.width = threshold+"px";
                gallery[i].style.setProperty('max-width', threshold+"px", 'important');
                gallerycon[i].style.width = threshold+"px";

                gallerycon[i].style.transition = "all 1s";
                //gallery[i].style.transition = "all 0.5s";
            }
        } else{
            for (let i = 0; i < gallery.length; i++) {
                currentImgSize = sw*ratio;
                gallery[i].style.width = sw*ratio+"px";
                gallery[i].style.setProperty('max-width', sw*ratio+"px", 'important');
                gallerycon[i].style.width = sw*ratio+"px";

                gallerycon[i].style.transition = "all 1s";
                //gallery[i].style.transition = "all 0.5s";

            }
        }
    }
}

function stopGalleryLazyLoad(){
    if(gallery && gallery.length > 0){
        gallery.forEach(g => {
            g.setAttribute('data-no-lazy', "1")
            g.setAttribute('loading', "eager")
        })
    }    
}
stopGalleryLazyLoad()

function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

resizeGallery(0.3);
window.addEventListener('resize', e => {
    resizeGallery(0.3);
    currentSlide(0)
    if ($('.collapse').is(':visible')) {
        $('.collapse').collapse('hide');
    }
    $('#mobilesectionbar').hide();
    if(bandhead){
        bandhead[0].style.transform = "translateX(0%)";
        bandhead[0].style.transition = "all 1s";
    }
})
let galleryContainer = document.querySelectorAll(".gallery")
let galleryBtnContainer = document.createElement("div");
if (galleryContainer.length > 0){
    galleryBtnContainer.setAttribute('style', "text-align:center");
    for(let i = 0; i < galleryImgCount; i++ ){
        let galleryBtn = document.createElement("div");
        galleryBtn.setAttribute('class', "dot");
        galleryBtn.setAttribute('onclick', "currentSlide("+ (i) + ")");
        galleryBtnContainer.appendChild(galleryBtn);
    }
    galleryContainer[0].parentNode.insertBefore(galleryBtnContainer, galleryContainer[0].nextSibling)
    // leftButton = htmlToElement('<i class="fa-solid fa-caret-up fa-rotate-270" style="color: #ffcc00;"></i>')
    // galleryContainer[0].parentNode.insertBefore(leftButton, galleryContainer[0].nextSibling)
}

let slideIndex = 0;

function currentSlide(n) {
    slideIndex = n
    let minusPosition = currentImgSize * slideIndex /2
    let fullGalleryWidth = currentImgSize * galleryImgCount
    if(galleryContainer.length <= 0) return
    let galleryContainerWidth = galleryContainer[0].offsetWidth
    if(fullGalleryWidth- (minusPosition*2) < galleryContainerWidth){
        for (let i = 0; i < gallery.length; i++) {
            gallerycon[i].style.transform = "translateX(-" + (fullGalleryWidth - galleryContainerWidth)/2 +"px)";
            gallery[i].style.transform = "translateX(-" + (fullGalleryWidth - galleryContainerWidth)/2 +"px)";
            gallery[i].style.transition = "all 0.2s";
            gallerycon[i].style.transition = "all 0.8s";
        }
    } else {
        if (gallery && gallery.length > 0){
            for (let i = 0; i < gallery.length; i++) {
                gallerycon[i].style.transform = "translateX(-" + minusPosition +"px)";
                gallery[i].style.transform = "translateX(-" + minusPosition +"px)";
                gallery[i].style.transition = "all 0.2s";
                gallerycon[i].style.transition = "all 0.8s";
            }
        }
    }
}
// Auto slide
setInterval(function () {
    slideIndex++
    if(slideIndex >= 4) slideIndex = 0
    currentSlide(slideIndex)    
}, 5000);

let giveaway = $(".giveaway")
let giveawayContainer = $("#giveawayContainer")
if(giveaway.length > 0 && giveawayContainer){
    let x = giveaway.detach();
    x.appendTo(giveawayContainer)
}

let midbanner = $(".midbanner-content")
let midbannerContainer = $("#midbanner")
if(midbanner.length > 0 && midbannerContainer){
    let y = midbanner.detach();
    y.appendTo(midbannerContainer)
}
