@include("includes.header")
  <div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
      <h1 class="mb-2">Qui doit à qui</h1>

      <div class="d-flex gap-2">
        <div class="input-group input-group-sm" style="max-width: 260px;">
          <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
          <input type="text" id="search" class="form-control" placeholder="Rechercher (nom ou montant)..." />
        </div>
        <select id="filter-member" class="form-select form-select-sm" style="max-width: 220px;">
          <option value="">Tous les membres</option>
          <option value="Aymen">Aymen</option>
          <option value="Amine">Amine</option>
          <option value="Sara">Sara</option>
          <option value="Youssef">Youssef</option>
        </select>
      </div>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="text-muted">Dettes totales</div>
            <div class="h4 fw-bold mb-0" id="sum-total">280,00 DH</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="text-muted">Payé ce mois-ci</div>
            <div class="h4 fw-bold mb-0" id="sum-paid">0,00 DH</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="text-muted">Reste à payer</div>
            <div class="h4 fw-bold mb-0 text-danger" id="sum-remaining">280,00 DH</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card shadow-sm">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table align-middle mb-0 table-hover" id="table-settlements">
            <thead class="table-light">
              <tr>
                <th>Débiteur</th>
                <th>Créancier</th>
                <th>Montant</th>
                <th>Restant</th>
                <th>Date maj</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr data-id="1" data-debtor="Aymen" data-creditor="Amine" data-amount="150.00" data-remaining="150.00">
                <td>
                  <i class="bi bi-person me-1"></i> Aymen
                </td>
                <td>
                  <i class="bi bi-person-check me-1"></i> Amine
                </td>
                <td>150,00 DH</td>
                <td><span class="fw-semibold text-danger remaining">150,00 DH</span></td>
                <td><span class="text-muted">2026‑02‑18</span></td>
                <td class="text-end">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-success btn-pay" data-id="1">
                      <i class="bi bi-cash-coin me-1"></i> Payer
                    </button>
                    <button class="btn btn-sm btn-outline-secondary btn-history" data-id="1">
                      <i class="bi bi-clock-history me-1"></i> Historique
                    </button>
                  </div>
                </td>
              </tr>

              <tr data-id="2" data-debtor="Sara" data-creditor="Youssef" data-amount="80.00" data-remaining="80.00">
                <td><i class="bi bi-person me-1"></i> Sara</td>
                <td><i class="bi bi-person-check me-1"></i> Youssef</td>
                <td>80,00 DH</td>
                <td><span class="fw-semibold text-danger remaining">80,00 DH</span></td>
                <td><span class="text-muted">2026‑02‑15</span></td>
                <td class="text-end">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-success btn-pay" data-id="2">
                      <i class="bi bi-cash-coin me-1"></i> Payer
                    </button>
                    <button class="btn btn-sm btn-outline-secondary btn-history" data-id="2">
                      <i class="bi bi-clock-history me-1"></i> Historique
                    </button>
                  </div>
                </td>
              </tr>

              <tr data-id="3" data-debtor="Aymen" data-creditor="Youssef" data-amount="120.00" data-remaining="50.00">
                <td><i class="bi bi-person me-1"></i> Aymen</td>
                <td><i class="bi bi-person-check me-1"></i> Youssef</td>
                <td>120,00 DH</td>
                <td><span class="fw-semibold text-danger remaining">50,00 DH</span></td>
                <td><span class="text-muted">2026‑02‑12</span></td>
                <td class="text-end">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-success btn-pay" data-id="3">
                      <i class="bi bi-cash-coin me-1"></i> Payer
                    </button>
                    <button class="btn btn-sm btn-outline-secondary btn-history" data-id="3">
                      <i class="bi bi-clock-history me-1"></i> Historique
                    </button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="modalPay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="form-pay" novalidate>
        <div class="modal-header">
          <h5 class="modal-title">Enregistrer un paiement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label required">Montant (DH)</label>
              <input type="number" id="pay-amount" class="form-control" min="0" step="0.01" required>
              <div class="invalid-feedback">Montant invalide.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label required">Date</label>
              <input type="date" id="pay-date" class="form-control" required>
              <div class="invalid-feedback">Date requise.</div>
            </div>

            <div class="col-12">
              <label class="form-label">Note (optionnel)</label>
              <input type="text" id="pay-note" class="form-control" placeholder="Ex : virement CashPlus, Réf #1234">
            </div>
          </div>

          <div class="alert alert-info mt-3 mb-0 small">
            <i class="bi bi-info-circle me-1"></i>
            Pour un **paiement total**, saisissez le montant restant.
          </div>

          <input type="hidden" id="pay-settlement-id">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button class="btn btn-success">
            <i class="bi bi-check2-circle me-1"></i> Enregistrer
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modalHistory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Historique des paiements
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <ul class="list-group" id="history-list">
          </ul>
        </div>

        <div class="modal-footer">
          <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>


@include("includes.footer")