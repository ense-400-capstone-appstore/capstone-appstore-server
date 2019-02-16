// behavior: 'smooth' for window.scrollTo, window.scrollBy, etc.
import smoothscroll from "smoothscroll-polyfill";
// Nodelist.prototype.forEach()
import "nodelist-foreach-polyfill";

// Initialize polyfills
export default () => {
    smoothscroll.polyfill();
};
