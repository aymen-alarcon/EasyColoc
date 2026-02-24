@include("includes.header")
<main class="container py-4">
  <h1 class="mb-3">Ma colocation</h1>

  <div class="row g-3">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h6">Statut de votre colocation</h2>
          @if (count($colocation) > 0)            
            <div class="alert alert-info">Vous avez une colocation active : <strong>Riad Atlas</strong>.</div>
            <a href="/colocation/show" class="btn btn-outline-primary"><i class="bi bi-eye me-1"></i>Accéder aux détails</a>
            <button class="btn btn-outline-danger ms-2"><i class="bi bi-box-arrow-right me-1"></i>Quitter (si non-owner)</button>
          @endif
          <div class="alert alert-info">You don't have any rooms</div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h6">Créer ou rejoindre</h2>
          <p class="text-muted small">Règle : une seule colocation active par utilisateur.</p>
          <a class="btn btn-secondary w-100" href="/colocation/create"><i class="bi bi-house-add me-1"></i>Créer</a>
          <a class="btn btn-secondary w-100 mt-2"><i class="bi bi-box-arrow-in-right me-1"></i>Rejoindre via invitation</a>
          <div class="form-text">Désactive/active côté serveur selon membership actif.</div>
        </div>
      </div>
    </div>
  </div>
</main>

@include("includes.footer")