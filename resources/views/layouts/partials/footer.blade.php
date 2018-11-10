<footer class="mdl-mega-footer">
    <div class="mdl-mega-footer__middle-section">
        <div class="mdl-mega-footer__drop-down-section">
        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
        <h1 class="mdl-mega-footer__heading">Quick Links</h1>
        <ul class="mdl-mega-footer__link-list">
            @component('partials.links', ['classes' => 'mdl-navigation__link', 'icons' => true, 'list_items' => true])
            @endcomponent
        </ul>
        </div>
    </div>

    <div class="mdl-mega-footer__bottom-section">
        <div class="mdl-logo">@lang('app.name')</div>
        <ul class="mdl-mega-footer__link-list">
        <li><a href="https://ense-400-capstone-appstore.github.io/capstone-appstore-docs/help">Help</a></li>
        <li><span>&copy; {{date("Y")}}</span></li>
        </ul>
    </div>
</footer>
