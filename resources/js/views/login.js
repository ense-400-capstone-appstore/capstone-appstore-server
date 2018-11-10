(function() {
    setTimeout(() => dirtyInputFix(), 1000);
})();

// Fix for dirty input styles not being applied on autofill
// https://paul.kinlan.me/detecting-when-autofill-happens
function dirtyInputFix() {
    document
        .querySelectorAll("input.mdl-textfield__input")
        .forEach(
            input =>
                input.matches(":-webkit-autofill") &&
                input.parentNode.classList.add("is-dirty")
        );
}
