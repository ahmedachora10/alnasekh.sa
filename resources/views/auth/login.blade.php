<x-guest-layout>

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/boy-with-rocket-light.png"
                class="img-fluid" alt="Login image" width="700"
                data-app-dark-img="illustrations/boy-with-rocket-dark.png"
                data-app-light-img="illustrations/boy-with-rocket-light.png">
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-5">
                <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
                    class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset(setting('logo')) }}" alt="logo" width="60">
                    </span>
                    {{-- <span class="app-brand-text demo text-body fw-bold">{{ setting('app_name') }}</span> --}}
                </a>
            </div>
            <!-- /Logo -->
            {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                action="{{ route('login') }}" method="POST" novalidate="novalidate">
                @csrf
                <div class="mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                    <label for="email" class="form-label">{{ trans('table.columns.email') }}</label>
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Enter your email or username" autofocus="">

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
                <div class="mb-3 form-password-toggle fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">{{ trans('table.columns.password') }}</label>
                    </div>
                    <div class="input-group input-group-merge ">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="············" aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me">
                        <label class="form-check-label" for="remember-me">
                            {{ trans('common.remember me') }}
                        </label>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <button class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                        data-callback='onSubmit' data-action='form-rquest'>Submit</button>
                </div> --}}
                <button class="btn btn-primary d-grid w-100 g-recaptcha"
                    data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback='onSubmit'
                    data-action='formAuthentication'>
                    {{ trans('common.sign in') }}
                </button>
            </form>
        </div>
    </div>
    <!-- /Login -->

</x-guest-layout>
