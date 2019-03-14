import { MDCDialog } from "@material/dialog";

export default () => {
    const userEditButtonEl = document.querySelector("#user-edit");
    const userEditDialogEl = document.querySelector("#page-users-edit");

    if (userEditButtonEl && userEditDialogEl) {
        const userEditDialog = new MDCDialog(userEditDialogEl);

        userEditButtonEl.addEventListener("click", e => {
            console.log("clicked");
            e.preventDefault();
            userEditDialog.open();
        });
    }
};
