jQuery(document).ready(function ($){
    var currentLoc = window.location.search.split(/[=,&]/);
    if (currentLoc[0] != "?post_type") {
        var tablenav = $('.tablenav.top');
        tablenav.css('height', 'auto');
        var linkContainer = tablenav.append('<div class="linkContainer" style="display:flex; margin:10px 0;"></div>');
        var links = ['event', 'audio', 'blog', 'news'];
        var buttonHtml = '<a style="flex-grow:1; text-align:center;" class="button" href="edit.php">SHOW ALL</a>';
        var makeButtons = function (button) {
            buttonHtml += '<a style="flex-grow:1; text-align:center;" class="button" id="'+ button +'button" href="edit.php?category_name=' + button + '">' + button.toUpperCase() + '</a>';
        }
        var buttons = links.forEach(makeButtons);

        $('.linkContainer').append(buttonHtml);
        $('#' + currentLoc[1] + 'button').addClass('current');
    }
    console.log(currentLoc);

})