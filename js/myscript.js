function showbtn() {

    let n = window.pageYOffset;
    if (n >= 400){
        document.getElementById("scrollbtn").style.visibility = "visible";
    } else {
        document.getElementById("scrollbtn").style.visibility = "hidden";
    }
}

function scrollToTop(scrollDuration) {
    var scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
            if ( window.scrollY != 0 ) {
                window.scrollBy( 0, scrollStep );
            }
            else clearInterval(scrollInterval);
        },15);
}

