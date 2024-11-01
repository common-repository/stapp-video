function openPage(pageName,elmnt) {
    if (pageName.length > 1 ){
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = "#23282d";
    }
}

jQuery( document ).ready( function($) {
    this.getElementById("defaultOpen").click();
});
// Get the element with id="defaultOpen" and click on it
