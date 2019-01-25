export const initRecaptcha = siteKey => {
    const submitButtons = document.querySelectorAll(".submit");

    if (typeof grecaptcha !== "undefined") {
        const gRecaptchaTokens = document.querySelectorAll(
            ".g-recaptcha-token"
        );

        grecaptcha.ready(() =>
            grecaptcha.execute(siteKey).then(token => {
                gRecaptchaTokens.forEach(el => (el.value = token));
                submitButtons.forEach(button => (button.disabled = false));
            })
        );
    } else {
        submitButtons.forEach(button => (button.disabled = false));
    }
};
