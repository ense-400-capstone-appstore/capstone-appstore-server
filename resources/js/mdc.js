import { MDCTopAppBar } from "@material/top-app-bar/index";
import { MDCDrawer } from "@material/drawer";
import { MDCRipple } from "@material/ripple";
import { MDCMenu } from "@material/menu";
import { MDCList } from "@material/list";

const topAppBarEl = document.querySelector(".mdc-top-app-bar");
const topAppBarNavButtonEl = document.querySelector(
    ".mdc-top-app-bar .mdc-top-app-bar__navigation-icon"
);
const buttonsEl = document.querySelectorAll(".mdc-button");
const fabsEl = document.querySelectorAll(".mdc-fab");
const iconButtonsEl = document.querySelectorAll(".mdc-icon-button");
const drawerEl = document.querySelector(".mdc-drawer");
const drawerListEl = document.querySelector(".mdc-drawer .mdc-list");
const listsEl = document.querySelectorAll(".mdc-list");

const userMenuEl = document.querySelector("#user-menu");
const userMenuButtonEl = document.querySelector("#user-menu-button");

export default () => {
    //
    // Instantiation
    //

    const topAppBar = topAppBarEl && new MDCTopAppBar(topAppBarEl);
    buttonsEl.forEach(button => new MDCRipple(button));
    fabsEl.forEach(fab => new MDCRipple(fab));
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
        userMenuButtonEl.addEventListener("click", e => (userMenu.open = true));
};
