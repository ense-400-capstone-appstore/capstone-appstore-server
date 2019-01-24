export default () => {
    // Tab buttons
    const buttonTabLogin = document.querySelector("#button-tab-login");
    const buttonTabRegister = document.querySelector("#button-tab-register");

    // Tabs
    const tabLogin = document.querySelector("#tab-login");
    const tabRegister = document.querySelector("#tab-register");

    // Events
    buttonTabLogin &&
        buttonTabLogin.addEventListener("click", () => {
            tabLogin.classList.remove("tab--invisible");
            tabRegister.classList.add("tab--invisible");
        });

    buttonTabRegister &&
        buttonTabRegister.addEventListener("click", () => {
            tabRegister.classList.remove("tab--invisible");
            tabLogin.classList.add("tab--invisible");
        });
};
