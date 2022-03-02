/* tab menu-bar */
function openTab(evt, types) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
          if(document.getElementsByClassName("tablinks")[0].id=="defaultOpen"){
              document.getElementById("defaultOpen").style.color='#f1f1f1';
              document.getElementById("defaultOpen").style.borderBottom='none';
          }
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(types).style.display = "block";
    evt.currentTarget.className += " active";
}
$('#defaultOpen').click(function(){
    document.getElementById("defaultOpen").style.color='#FE5F41';
    document.getElementById("defaultOpen").style.borderBottom='5px solid #FE5F41';        
});
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
document.getElementById("defaultOpen").style.color='#FE5F41';
document.getElementById("defaultOpen").style.borderBottom='5px solid #FE5F41';