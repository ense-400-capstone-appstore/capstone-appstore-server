export default () => {
    const buttons = [
        document.querySelector("#button-tab-login"),
        document.querySelector("#button-tab-register")
    ];

    const tabs = [
        document.querySelector("#tab-login"),
        document.querySelector("#tab-register")
    ];

    // Events
    buttons.forEach((button, i) => {
        button.addEventListener("click", () => {
            tabs.forEach(tab => tab.classList.add("tab--invisible"));
            tabs[i].classList.remove("tab--invisible");
        });
    });
};
