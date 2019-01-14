export default () => {
    const scrollDownButton = document.querySelector(
        "#home-jumbotron-scroll-down"
    );

    // When jumbotron scroll-down button is clicked, scroll to next section
    scrollDownButton &&
        scrollDownButton.addEventListener("click", e => {
            e.preventDefault();
            const destinationEl = document.querySelector("#home-what-is-this");

            destinationEl &&
                destinationEl.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
        });
};
