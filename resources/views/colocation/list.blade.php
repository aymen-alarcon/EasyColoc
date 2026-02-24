@include("includes.header")
<main class="container py-4">
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h1 class="h5 mb-1">Riad Atlas <span class="badge badge-role">Owner</span></h1>
              <div class="text-muted">Créée le 12/01/2026 · 4 membres</div>
            </div>
            <div class="d-flex gap-2">
              <a class="btn btn-outline-primary" href="/colocation/invite"><i class="bi bi-person-plus me-1"></i>Inviter</a>
              <a class="btn btn-outline-secondary" href="/colocation/categories"><i class="bi bi-tags me-1"></i>Catégories</a>
            </div>
          </div>
          <hr>
          <h2 class="h6">Membres</h2>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Amine <span class="text-success fw-semibold"><i class="bi bi-hand-thumbs-up-fill"></i> +2</span></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-header bg-white fw-semibold">Synthèse</div>
        <div class="card-body">
          <div class="d-flex justify-content-between"><span>Total payé</span><strong>2 100,00 DH</strong></div>
          <div class="d-flex justify-content-between"><span>Part par membre</span><strong>525,00 DH</strong></div>
          <hr>
          <a class="btn btn-outline-primary w-100 mb-2" href="/colocation/manage-members"><i class="bi bi-person-circle"></i> Manager les membres</a>
          <a class="btn btn-outline-primary w-100 mb-2" href="/colocation/expenses"><i class="bi bi-receipt me-1"></i>Gérer les dépenses</a>
          <a class="btn btn-outline-success w-100" href="/colocation/settlements"><i class="bi bi-cash-coin me-1"></i>Qui doit à qui</a>
        </div>
      </div>
    </div>
  </div>
</main>
@include("includes.footer")