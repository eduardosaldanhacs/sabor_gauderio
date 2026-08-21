<x-layouts.site-layout pageTitle="Entrar | Sabor Gaudério">
    <main class="login-page">
        <section class="login-shell" aria-labelledby="login-title">
            <div class="login-story" aria-hidden="true">
                <img src="{{ asset('assets/images/about/equipe-sabor-gauderio.png') }}"
                    alt="" width="900" height="900">
                <div class="login-story-copy">
                    <span class="login-kicker">Sabor Gaudério</span>
                    <p>Do nosso forno<br>para a tua mesa.</p>
                    <small>Entre para acompanhar pedidos e guardar seus sabores preferidos.</small>
                </div>
            </div>

            <div class="login-panel">
                <div class="login-panel-inner">
                    <a class="login-brand" href="{{ route('home') }}" aria-label="Voltar para a página inicial">
                        <img src="{{ asset('assets/images/sabor-gauderio-logo-v2.png') }}" alt="Sabor Gaudério">
                    </a>

                    <div class="login-heading">
                        <p class="eyebrow">Área do cliente</p>
                        <h1 id="login-title">Bem-vindo de volta</h1>
                        <p>Entre na sua conta para continuar seu pedido.</p>
                    </div>

                    @if(session('invalid_login'))
                        <div class="login-alert login-alert-error" role="alert">
                            <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                            <span>{{ session('invalid_login') }}</span>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="login-alert login-alert-success" role="status">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Senha redefinida com sucesso.</span>
                        </div>
                    @endif

                    @if(session('account_deleted'))
                        <div class="login-alert login-alert-success" role="status">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Conta de usuário removida com sucesso.</span>
                        </div>
                    @endif

                    <form class="login-form" action="{{ route('authenticate') }}" method="post">
                        @csrf
                        <div class="login-field">
                            <label for="username">Usuário</label>
                            <div class="login-input-wrap">
                                <i class="fa-regular fa-user" aria-hidden="true"></i>
                                <input type="text" id="username" name="username" value="{{ old('username', 'bento') }}"
                                    placeholder="Digite seu usuário" autocomplete="username" required autofocus
                                    @error('username') aria-invalid="true" aria-describedby="username-error" @enderror>
                            </div>
                            @error('username')
                                <p class="login-field-error" id="username-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="login-field">
                            <div class="login-label-row">
                                <label for="password">Senha</label>
                                <a href="{{ route('forgot_password') }}">Esqueci minha senha</a>
                            </div>
                            <div class="login-input-wrap">
                                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                                <input type="password" id="password" name="password" value="Aa123456" placeholder="Digite sua senha"
                                    autocomplete="current-password" required
                                    @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>
                                <button class="login-password-toggle" type="button" aria-label="Mostrar senha" aria-pressed="false">
                                    <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="login-field-error" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="login-submit">
                            Entrar na minha conta
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </form>
                    <p class="login-demo-access"><i class="fa-solid fa-key" aria-hidden="true"></i> Acesso demonstrativo já preenchido</p>

                    <p class="login-register">Ainda não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></p>
                    <p class="login-safe"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Seus dados são protegidos.</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelector('.login-password-toggle')?.addEventListener('click', function () {
            const field = document.getElementById('password');
            const showing = field.type === 'text';
            field.type = showing ? 'password' : 'text';
            this.setAttribute('aria-label', showing ? 'Mostrar senha' : 'Ocultar senha');
            this.setAttribute('aria-pressed', String(!showing));
            this.querySelector('i').className = showing ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
        });
    </script>
</x-layouts.site-layout>
