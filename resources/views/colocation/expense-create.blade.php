@include("includes.header")
<main class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Ajouter une dépense</h1>
    <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="bi bi-arrow-left me-1"></i>Retour</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form class="row g-3" action="/colocation/expense/create/store" method="POST">
        @csrf
        @method("POST")
        <input value="{{ Auth::user()->colocations->first()->id }}" class="form-control" name="colocation" hidden>
        <div class="col-md-6">
          <label class="form-label required">Payeur</label>
          <select class="form-select" name="payer" required>
            @foreach ($adhesions as $adhesion)              
              <option value="{{ $adhesion->user->id }}">{{ $adhesion->user->first_name }} {{ $adhesion->user->last_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label required">Catégorie</label>
          <select class="form-select" name="category" required>
            @foreach ($categories as $category)              
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label required">Titre</label>
          <input class="form-control" name="title" required placeholder="Ex : Internet">
        </div>
        <div class="col-md-6">
          <label class="form-label required">Montant</label>
          <input type="number" name="price" class="form-control" required min="0" step="0.01" placeholder="0.00">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check2-circle me-1"></i>Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</main>

@include("includes.footer")