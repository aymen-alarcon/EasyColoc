@include("includes.header")
<main class="container py-4">
  <h1 class="mb-3">Ma colocation</h1>
  @if (isset($adhesion))
    <div class="row g-3">
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="h6">Statut de votre colocation</h2>
              <div class="alert alert-info">Vous avez une colocation active : <strong>{{ $adhesion->colocation->name }}</strong>.</div>
              <div class="d-flex justify-content-between align-items-center">
                <a href="/colocation/show/{{ $adhesion->colocation->id }}" class="btn btn-outline-primary"><i class="bi bi-eye me-1"></i>Accéder aux détails</a>
                <form action="/colocation/adhesion/destroy/{{ $adhesion->id }}" method="post"> 
                  @csrf
                  @method("DELETE")             
                  <button type="submit" class="btn btn-outline-danger ms-2"><i class="bi bi-box-arrow-right me-1"></i>Quitter</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    @else
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="h6">Créer ou rejoindre</h2>
            <p class="text-muted small">Règle : une seule colocation active par utilisateur.</p>
            <a class="btn btn-secondary w-100" href="/colocation/create"><i class="bi bi-house-add me-1"></i>Créer</a>
            <a class="btn btn-secondary w-100 mt-2" href="/colocation/invite/accept"><i class="bi bi-box-arrow-in-right me-1"></i>Rejoindre via invitation</a>
            <div class="form-text">Désactive/active côté serveur selon membership actif.</div>
          </div>
        </div>
      </div>
    @endif
  </div>
</main>
@include("includes.footer")