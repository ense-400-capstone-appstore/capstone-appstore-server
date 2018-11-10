(function() {
    $(document).on("click", "#jumbotron-scroll-down", () =>
        scrollTo("#what-is-this")
    );
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

// Scroll to a div marked by an ID
function scrollTo(id) {
    let div = $(id);

    if (!div) return;

    $("html, body").animate(
        {
            scrollTop: div.offset().top - 55
        },
        1500
    );
}
