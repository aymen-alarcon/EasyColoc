@include("includes.header")
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="h4 mb-3 text-center">Connexion</h2>

                    <form>

                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email" class="form-control" required placeholder="exemple@mail.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Mot de passe</label>
                            <input type="password" class="form-control" required placeholder="********">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <a href="forgot-password.html">Mot de passe oublié ?</a>
                        </div>

                        <button class="btn btn-primary w-100">Se connecter</button>

                    </form>

                    <hr>

                    <p class="text-center mb-0">
                        Pas de compte ?
                        <a href="/register">Créer un compte</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

@include("includes.footer")