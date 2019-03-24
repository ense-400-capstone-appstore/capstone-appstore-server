<footer id="app-footer">
    <div class="mdc-layout-grid">
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
                <div class="app-footer-title">
                    <img src="{{asset('/images/brand/64h/Logo_Inverse_x64.png')}}" alt="footer logo" />
                </div>
                <div class="app-footer-version">
                    <a href="https://github.com/matryoshkadoll/matryoshka-server/releases/tag/{{ config('version.currentTag') }}">
                        {{ config('version.currentTag') }}
                    </a>
                </div>
                <div>&copy; {{date("Y")}}</div>
            </div>
        </div>
    </div>
</footer>
