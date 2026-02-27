@include("includes.header")
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="mb-5">Qui doit à qui</h1>
      <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="bi bi-arrow-left me-1"></i>Retour</a>
    </div>
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table align-middle mb-0 table-hover" id="table-pay">
            <thead class="table-light">
              <tr>
                <th>User</th>
                <th>Montant</th>
                <th>status</th>
                <th>Date</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($credits as $credit)                
                <tr>
                  <td><i class="bi bi-person me-1"></i>{{ $credit->user->first_name }} {{ $credit->user->last_name }}</td>
                  <td>{{ $credit->price }}</td>
                  <td><span class="fw-semibold">{{ $credit->status }}</span></td>
                  <td><span class="text-muted">{{ $credit->created_at->format("Y-m-d") }}</span></td>
                  <td class="text-end">
                    <div class="btn-group">
                      @if ($credit->status === "not paid" && $credit->user->id === Auth::user()->id)
                        <a href="/colocation/credit/paid/{{ $credit->id }}" class="btn btn-sm btn-outline-success btn-history" data-id="2">
                          <i class="bi bi-bank"></i> Payer
                        </a>
                      @endif
                      <button class="btn btn-sm btn-outline-secondary btn-history" data-id="2">
                        <i class="bi bi-clock-history me-1"></i> Historique
                      </button>
                    </div>
                  </td>
                </tr>
              @endforeach
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