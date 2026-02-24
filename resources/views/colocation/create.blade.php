@include("includes.header")
<main class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Créer une colocation</h1>
    <a class="btn btn-outline-secondary" href="/colocation/list.html"><i class="bi bi-arrow-left me-1"></i>Retour</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form class="row g-3" novalidate>
        <div class="col-md-6">
          <label class="form-label required">Nom</label>
          <input class="form-control" required placeholder="Ex : Riad Atlas">
        </div>
        <div class="col-md-6">
          <label class="form-label">Description (optionnel)</label>
          <input class="form-control" placeholder="Ex : Appartement centre-ville">
        </div>
        <div class="col-12">
          <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Créer</button>
        </div>
      </form>
      <div class="text-muted small mt-2">Règle : une seule colocation active par utilisateur (à faire respecter côté serveur).</div>
    </div>
  </div>
</main>

@include("includes.footer")