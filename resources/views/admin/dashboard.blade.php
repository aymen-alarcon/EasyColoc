@include("includes.header")

<div class="container py-4">

    <h1 class="mb-4">Dashboard</h1>
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Membres actifs</h6>
                    <div class="h3 fw-bold">4</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Dépenses du mois</h6>
                    <div class="h3 fw-bold">1 820,00 DH</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Votre solde</h6>
                    <div class="h3 fw-bold text-danger">-230,00 DH</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Remboursements en attente</h6>
                    <div class="h3 fw-bold">3</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Dernières dépenses
                </div>
                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Titre</th>
                                    <th>Catégorie</th>
                                    <th>Payeur</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Courses</td>
                                    <td>Alimentation</td>
                                    <td>Amine</td>
                                    <td>420,00 DH</td>
                                    <td>2026‑02‑18</td>
                                </tr>
                                <tr>
                                    <td>Internet</td>
                                    <td>Abonnement</td>
                                    <td>Aymen</td>
                                    <td>299,00 DH</td>
                                    <td>2026‑02‑15</td>
                                </tr>
                                <tr>
                                    <td>Électricité</td>
                                    <td>Charges</td>
                                    <td>Youssef</td>
                                    <td>520,00 DH</td>
                                    <td>2026‑02‑12</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Qui doit à qui
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            Aymen → Amine
                            <span class="badge bg-secondary">150,00 DH</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            Sara → Youssef
                            <span class="badge bg-secondary">80,00 DH</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            Aymen → Youssef
                            <span class="badge bg-secondary">50,00 DH</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

@include("includes.footer")