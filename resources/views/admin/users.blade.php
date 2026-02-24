@include("includes.header")
<main class="container py-4">
  <h1 class="mb-3">Utilisateurs</h1>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0 table-hover">
          <thead class="table-light">
            <tr>
              <th>Nom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Statut</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Amine</td>
              <td>amine@example.com</td>
              <td><span class="badge bg-primary">Admin</span></td>
              <td><span class="badge bg-success">Actif</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-warning"><i class="bi bi-arrow-down-up"></i> Rétrograder</button>
              </td>
            </tr>
            <tr>
              <td>Aymen</td>
              <td>aymen@example.com</td>
              <td><span class="badge bg-secondary">User</span></td>
              <td><span class="badge bg-success">Actif</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#banModal" data-user="Aymen"><i class="bi bi-slash-circle"></i> Bannir</button>
              </td>
            </tr>
            <tr>
              <td>Karim</td>
              <td>karim@example.com</td>
              <td><span class="badge bg-secondary">User</span></td>
              <td><span class="badge bg-danger">Banni</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-success"><i class="bi bi-check2"></i> Débannir</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="banModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bannir l'utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Confirmez le bannissement de <strong id="banName"></strong>.</p>
        <div class="mb-3">
          <label class="form-label">Raison</label>
          <input class="form-control" placeholder="Ex : Comportement financier risqué">
        </div>
        <div class="form-text">Le bannissement doit <strong>déconnecter</strong> l'utilisateur et bloquer l'accès (côté serveur).</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <button class="btn btn-danger"><i class="bi bi-slash-circle me-1"></i>Bannir</button>
      </div>
    </form>
  </div>
</div>

@include("includes.footer")