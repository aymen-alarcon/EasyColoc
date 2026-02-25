@include("includes.header")
  <div class="container py-4">
    <h1 class="mb-5">Catégories</h1>
    <div class="row g-4">
      <div class="col-lg-5">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="h6 mb-3">Ajouter une catégorie</h2>
            <form id="form-add-category" class="row g-3 my-4" action="/colocation/categories/store" method="POST">
              @csrf
              @method("POST")
              <div class="col-md-6">
                <label class="form-label fw-semibold required">Nom de la catégorie</label>
                <input type="text" class="form-control" id="category-name" name="name" placeholder="Ex : Alimentation" required/>           
              </div>              
              <div class="col-md-6">
                <label class="form-label fw-semibold required">description de la catégorie</label>
                <input type="text" class="form-control" id="category-name" name="description" required/>           
              </div>              
              <button type="submit" class="btn btn-primary w-100"><i class="bi bi-plus-circle me-1"></i></button>
            </form>
            <div class="table-responsive">
              <table class="table align-middle table-hover mb-0" id="table-categories">
                <thead class="table-light">
                  <tr>
                    <th style="min-width: 220px;">Nom</th>
                    <th>Description</th>
                    <th class="text-end" style="min-width: 160px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)                    
                    <tr>
                      <td>
                        <span class="cat-name">{{ $category->name }}</span>
                      </td>
                      <td>
                        <span class="cat-name">{{ $category->description }}</span>
                      </td>
                      <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary me-1 btn-rename" data-name="Alimentation">
                          <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger btn-delete" data-name="Alimentation" data-usage="12">
                          <i class="bi bi-trash"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalRename" tabindex="-1" aria-labelledby="modalRenameLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="form-rename-category" novalidate>
        <div class="modal-header">
          <h5 class="modal-title" id="modalRenameLabel">Renommer la catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Nouveau nom</label>
            <input type="text" class="form-control" id="rename-input" required>
            <div class="invalid-feedback">Veuillez saisir un nom valide.</div>
          </div>
          <input type="hidden" id="rename-original"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Enregistrer</button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="form-delete-category">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Supprimer la catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <p class="mb-2">
            Confirmez la suppression de la catégorie <strong id="delete-name"></strong>.
          </p>
          <div class="alert alert-warning d-none" id="delete-warning-usage">
            Cette catégorie est utilisée par <strong id="delete-usage-count">0</strong> dépense(s).
            Vous devrez **réassigner** ces dépenses côté serveur.
          </div>
          <div class="mb-3">
            <label class="form-label">Réassigner à (optionnel)</label>
            <select id="reassign-category" class="form-select">
              <option value="">— Aucune (bloquer côté serveur) —</option>
              <option>Alimentation</option>
              <option>Charges</option>
              <option>Abonnement</option>
            </select>
            <div class="form-text">Cette logique est à appliquer côté serveur (validation obligatoire ou non).</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button class="btn btn-danger"><i class="bi bi-trash me-1"></i>Supprimer</button>
        </div>
      </form>
    </div>
  </div>

@include("includes.footer")