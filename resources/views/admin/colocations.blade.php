@include("includes.header")
<main class="container py-4">
  <h1 class="mb-3">Colocations</h1>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Nom</th>
              <th>Owner</th>
              <th>Membres</th>
              <th>Statut</th>
              <th>Créée</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Riad Atlas</td>
              <td>Amine</td>
              <td>4</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>2026-01-12</td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x-circle"></i> Annuler</button>
              </td>
            </tr>
            <tr>
              <td>Dar El Bahja</td>
              <td>Karim</td>
              <td>0</td>
              <td><span class="badge bg-secondary">Cancelled</span></td>
              <td>2025-11-02</td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary" disabled><i class="bi bi-x-circle"></i> Annulée</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@include("includes.footer")