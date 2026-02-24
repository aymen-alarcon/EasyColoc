@include("includes.header")
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Dépenses</h1>

        <a href="/colocation/expense/create">
            <i class="bi bi-plus-circle me-1"></i> Nouvelle dépense
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="row g-3 align-items-center">

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Filtrer par mois</label>
                    <input type="month" id="filter-month" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Filtrer par catégorie</label>
                    <select id="filter-category" class="form-select">
                        <option value="">Toutes</option>
                        <option value="Alimentation">Alimentation</option>
                        <option value="Abonnement">Abonnement</option>
                        <option value="Charges">Charges</option>
                    </select>
                </div>

            </div>

        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Payeur</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr data-month="2026-02" data-category="Alimentation">
                            <td>Courses</td>
                            <td>
                                <span class="badge bg-success">Alimentation</span>
                            </td>
                            <td>Amine</td>
                            <td>420,00 DH</td>
                            <td>2026‑02‑18</td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-month="2026-02" data-category="Abonnement">
                            <td>Internet</td>
                            <td>
                                <span class="badge bg-info text-dark">Abonnement</span>
                            </td>
                            <td>Aymen</td>
                            <td>299,00 DH</td>
                            <td>2026‑02‑15</td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-month="2026-01" data-category="Charges">
                            <td>Électricité</td>
                            <td>
                                <span class="badge bg-warning text-dark">Charges</span>
                            </td>
                            <td>Youssef</td>
                            <td>520,00 DH</td>
                            <td>2026‑01‑12</td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@include("includes.footer")