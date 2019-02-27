import { MDCDialog } from "@material/dialog";

export default () => {
    const userEditButtonEl = document.querySelector("#user-edit");
    const userEditDialogEl = document.querySelector("#user-edit-dialog");

    if (userEditButtonEl && userEditDialogEl) {
        const userEditDialog = new MDCDialog(userEditDialogEl);

        userEditButtonEl.addEventListener("click", e => {
            console.log("clicked");
            e.preventDefault();
            userEditDialog.open();
        });
    }
};
