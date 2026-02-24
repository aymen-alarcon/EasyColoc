@include("includes.header")
<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h1 class="h5 mb-2">Invitation à rejoindre <strong>Riad Atlas</strong></h1>
          <p>Vous avez été invité avec l'email <strong>yara@example.com</strong>.</p>

          <div class="d-flex gap-2">
            <button class="btn btn-success"><i class="bi bi-check2 me-1"></i>Accepter</button>
            <button class="btn btn-outline-danger"><i class="bi bi-x me-1"></i>Refuser</button>
          </div>

          <p class="form-text mt-3">Le serveur doit vérifier : email correspondant & aucune colocation active.</p>
        </div>
      </div>
    </div>
  </div>
</main>

@include("includes.footer")