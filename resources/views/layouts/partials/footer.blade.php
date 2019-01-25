<footer id="app-footer">
    <div class="mdc-layout-grid page-content-item">
        <div class="app-footer-links mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3 mdc-layout-grid__cell--span-12-phone">
                <h4 class="app-footer-title">Quick Links</h4>
                <ul>
                    @foreach (config('web.links') as $key => $link)
                        <li>
                            <a href={{ $link['href'] }}>
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <hr class="app-footer-divider"/>

        <div class="app-footer-copyright mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <p>
                    <div class="app-footer-title">@lang('app.name')</div>
                    <div class="app-footer-version">{{ config('version.currentTag') }}</div>
                    <div>&copy; {{date("Y")}}</div>
                </p>
            </div>
        </div>
    </div>
</footer>
