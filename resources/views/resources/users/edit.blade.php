<div
    id="page-users-edit"
    class="mdc-dialog page-content-users"
    role="alertdialog"
    aria-modal="true"
    aria-labelledby="my-dialog-title"
    aria-describedby="my-dialog-content"
    >
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface">
            <h2 class="mdc-dialog__title" id="my-dialog-title">Edit Profile</h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <h3>Change Profile Information</h3>

                <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            @method('patch')
                            @csrf

                            <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                                {{-- Name field --}}
                                @textfield([
                                    "name" => "name",
                                    "value" => $user->name
                                ])
                                    Full Name
                                @endtextfield
                            </div>

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                                {{-- Email field --}}
                                @textfield([
                                    "name" => "email",
                                    "value" => $user->email
                                ])
                                    Email
                                @endtextfield
                            </div>

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                <label for="avatar" class="mdc-typography--subtitle1">
                                    Avatar
                                </label>
                                <input type="file" name="avatar">
                            </div>
                        </div>

                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                {{-- Submit button --}}
                                <button class="mdc-button mdc-button--raised submit" type="submit">
                                    <span class="mdc-button__label">Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <h3>Change Password</h3>

                <form method="POST" action="/users/{{ $user->id }}">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                                {{-- Password field --}}
                                @textfield([
                                    "name" => "password",
                                    "type" => "password",
                                    "required" => "true"
                                ])
                                    Password
                                @endtextfield
                            </div>

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                            {{-- Password confirmation field --}}
                                @textfield([
                                    "name" => "password_confirmation",
                                    "type" => "password",
                                    "required" => "true"
                                ])
                                    Confirm Password
                                @endtextfield
                            </div>
                        </div>

                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                {{-- Submit button --}}
                                <button class="mdc-button mdc-button--raised submit" type="submit">
                                    <span class="mdc-button__label">Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mdc-dialog__scrim"></div>
</div>
