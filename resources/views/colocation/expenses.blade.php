@include("includes.header")
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Dépenses</h1>
        <a href="/colocation/expense/create"><i class="bi bi-plus-circle me-1"></i> Nouvelle dépense</a>
        <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="bi bi-arrow-left me-1"></i>Retour</a>
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
                        @foreach ($depenses as $depense)       
                            <tr data-month="2026-02" data-category="Alimentation">
                                <td>{{ $depense->title }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $depense->category->name }}</span>
                                </td>
                                <td>{{ $depense->payer->first_name }} {{ $depense->payer->last_name }}</td>
                                <td>{{ $depense->price }} DH</td>
                                <td>{{ $depense->created_at->format("Y-m-d") }}</td>
                                <td class="text-end">
                                    <a class="btn btn-outline-success" href="/colocation/credit/{{ $depense->id }}"><i class="bi bi-cash-coin me-1"></i>Qui doit à qui</a>
                                    <button class="btn btn-sm btn-outline-secondary me-1">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
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
@include("includes.footer")