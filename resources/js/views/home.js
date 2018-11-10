(function() {
    $(document).on("click", "#jumbotron-scroll-down", scrollFullViewport);
})();

// Scroll a full viewport down
function scrollFullViewport() {
    $("html, body").animate(
        {
            scrollTop: window.innerHeight
        },
        1500
    );
}
