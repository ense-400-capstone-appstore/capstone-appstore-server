/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import bootstrap from "./bootstrap";
import mdc from "./mdc";
import views from "./views";
import polyfills from "./polyfills";

// Bootstrapping code (NOT the bootstrap library)
bootstrap();

// Polyfills for browsers that do not support certain JS features natively
polyfills();

// MDC specific JS
// https://material.io/develop/web/
mdc();

// View specific JS
views();
