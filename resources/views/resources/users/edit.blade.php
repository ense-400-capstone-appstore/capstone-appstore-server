<div
    id="user-edit-dialog"
    class="mdc-dialog"
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

                <form method="POST" action="/users/{{ $user->id }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Full Name field --}}
                    @textfield([
                        "name" => "full_name",
                        "value" => $user->name
                    ])
                        Full Name
                    @endtextfield

                    {{-- Email field --}}
                    @textfield([
                        "name" => "email",
                        "value" => $user->email
                    ])
                        Email
                    @endtextfield

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit">
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>

                <h3>Change Password</h3>

                <form method="POST" action="/users/{{ $user->id }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Password field --}}
                     @textfield([
                        "name" => "password",
                        "type" => "password",
                        "required" => "true"
                    ])
                        Password
                    @endtextfield

                    {{-- Password confirmation field --}}
                     @textfield([
                        "name" => "password_confirmation",
                        "type" => "password",
                        "required" => "true"
                    ])
                        Confirm Password
                    @endtextfield

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit">
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mdc-dialog__scrim"></div>
</div>
