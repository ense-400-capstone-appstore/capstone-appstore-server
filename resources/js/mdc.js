import { MDCTopAppBar } from "@material/top-app-bar/index";
import { MDCDrawer } from "@material/drawer";
import { MDCRipple } from "@material/ripple";
import { MDCMenu } from "@material/menu";
import { MDCList } from "@material/list";
import { MDCTabBar } from "@material/tab-bar";
import { MDCTextField } from "@material/textfield";
import { MDCFormField } from "@material/form-field";
import { MDCCheckbox } from "@material/checkbox";

const topAppBarEl = document.querySelector(".mdc-top-app-bar");
const topAppBarNavButtonEl = document.querySelector(
    ".mdc-top-app-bar .mdc-top-app-bar__navigation-icon"
);
const ripplesEl = document.querySelectorAll(
    ".mdc-button, .mdc-card__primary-action"
);
const iconButtonsEl = document.querySelectorAll(".mdc-icon-button");
const drawerEl = document.querySelector(".mdc-drawer");
const drawerListEl = document.querySelector(".mdc-drawer .mdc-list");
const listsEl = document.querySelectorAll(".mdc-list");
const tabBarEls = document.querySelectorAll(".mdc-tab-bar");

const userMenuEl = document.querySelector("#user-menu");
const userMenuButtonEl = document.querySelector("#user-menu-button");
const textFieldsEl = document.querySelectorAll(".mdc-text-field");
const formFieldsEl = document.querySelectorAll(".mdc-form-field");
const checkboxesEl = document.querySelectorAll(".mdc-checkbox");

export default () => {
    //
    // Instantiation
    //

    topAppBarEl && new MDCTopAppBar(topAppBarEl);
    ripplesEl.forEach(el => new MDCRipple(el));
    iconButtonsEl.forEach(iconButton => {
        const iconButtonRipple = new MDCRipple(iconButton);
        iconButtonRipple.unbounded = true;
    });
    const drawer = drawerEl && MDCDrawer.attachTo(drawerEl);
    const userMenu = userMenuEl && new MDCMenu(userMenuEl);
    listsEl.forEach(listEl => {
        const list = new MDCList(listEl);
        list.listElements.map(listItemEl => new MDCRipple(listItemEl));
    });
    tabBarEls.forEach(
        el => new MDCTabBar(document.querySelector(".mdc-tab-bar"))
    );
    textFieldsEl.forEach(el => new MDCTextField(el));
    checkboxesEl.forEach((el, i) => {
        const checkbox = new MDCCheckbox(el);
        const formField = new MDCFormField(formFieldsEl[i]);
        formField.input = checkbox;
    });

    //
    // Events
    //

    // Open drawer on top app bar nav click
    topAppBarEl &&
        topAppBarEl.addEventListener("MDCTopAppBar:nav", e => {
            drawer.open = !drawer.open;
        });
    topAppBarNavButtonEl &&
        topAppBarNavButtonEl.addEventListener("click", e => e.preventDefault());

    // Close drawer when item selected
    drawerListEl &&
        drawerListEl.addEventListener("click", e => (drawer.open = false));

    // Open user menu when profile image clicked in header
    userMenuButtonEl &&
        userMenuButtonEl.addEventListener("click", e => {
            e.preventDefault();
            userMenu.open = true;
        });
};
