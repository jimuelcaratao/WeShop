// side navigation
var mq = window.matchMedia("(max-width: 700px)");
if (mq.matches) {
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "180px";
        document.getElementById("pageContent").style.marginLeft = "0px";
        document.getElementById("pageHeader").style.marginLeft = "0px";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("pageContent").style.marginLeft = "0";
        document.getElementById("pageHeader").style.marginLeft = "0px";
    }
} else {
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */

    function openNav() {
        document.getElementById("mySidenav").style.width = "180px";
        document.getElementById("pageContent").style.marginLeft = "180px";
        document.getElementById("pageHeader").style.marginLeft = "180px";
        document.getElementById("sideNavBurger").style.visibility = "hidden";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("pageContent").style.marginLeft = "0";
        document.getElementById("pageHeader").style.marginLeft = "0";
        document.getElementById("sideNavBurger").style.visibility = "visible";
    }
}
