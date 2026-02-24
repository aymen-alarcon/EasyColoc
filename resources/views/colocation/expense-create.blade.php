@include("includes.header")
<main class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Ajouter une dépense (Admin)</h1>
    <a class="btn btn-outline-secondary" href="/admin/expenses.html"><i class="bi bi-arrow-left me-1"></i>Retour</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form class="row g-3" novalidate>
        <div class="col-md-4">
          <label class="form-label required">Colocation</label>
          <select class="form-select" required>
            <option value="">Choisir...</option>
            <option value="1">Riad Atlas</option>
            <option value="2">Dar El Bahja</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label required">Payeur</label>
          <select class="form-select" required>
            <option value="">Choisir...</option>
            <option>Amine</option><option>Aymen</option><option>Sara</option><option>Youssef</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label required">Catégorie</label>
          <select class="form-select" required>
            <option value="">Choisir...</option>
            <option>Alimentation</option><option>Charges</option><option>Abonnement</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label required">Titre</label>
          <input class="form-control" required placeholder="Ex : Internet">
        </div>
        <div class="col-md-3">
          <label class="form-label required">Montant (DH)</label>
          <input type="number" class="form-control" required min="0" step="0.01" placeholder="0.00">
        </div>
        <div class="col-md-3">
          <label class="form-label required">Date</label>
          <input type="date" class="form-control" required>
        </div>
        <div class="col-12">
          <button class="btn btn-primary"><i class="bi bi-check2-circle me-1"></i>Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</main>

@include("includes.footer")