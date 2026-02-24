@include("includes.header")
<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h1 class="h4 mb-3 text-center">Créer un compte</h1>

          <form novalidate>
            <div class="mb-3">
              <label class="form-label required">Nom complet</label>
              <input type="text" class="form-control" required placeholder="Ex : Aymen Oumaalla">
            </div>
            <div class="mb-3">
              <label class="form-label required">Email</label>
              <input type="email" class="form-control" required placeholder="exemple@mail.com">
              <div class="form-text">Le premier inscrit est promu admin global (à gérer côté serveur).</div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Mot de passe</label>
              <input type="password" class="form-control" minlength="8" required placeholder="Min. 8 caractères">
            </div>
            <button class="btn btn-primary w-100">S'inscrire</button>
          </form>

          <hr>
          <p class="mb-0 text-center">Déjà membre ?
            <a href="/login">Se connecter</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>
@include("includes.footer")