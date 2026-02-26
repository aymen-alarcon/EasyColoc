@include("includes.header")
<main class="container py-4">
  <div class="row g-3">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h1 class="h5 mb-1">{{ $colocationObject->name }}</h1>
              <div class="text-muted">Créée le {{ $colocationObject->created_at->format("Y-m-d") }} · {{ count($members) }} membres</div>
            </div>
            @if ($colocationObject->owner_id === Auth::user()->id)
              <div class="d-flex gap-2">
                <a class="btn btn-outline-primary" href="/colocation/invite"><i class="bi bi-person-plus me-1"></i>Inviter</a>
                <a class="btn btn-outline-secondary" href="/colocation/categories"><i class="bi bi-tags me-1"></i>Catégories</a>
              </div>                
            @endif
          </div>
          <hr>
          <h2 class="h6">Membres</h2>
          <ul class="list-group">
            @if (count($members) > 0)
            @foreach ($members as $member)              
              <li class="list-group-item d-flex justify-content-between align-items-center">{{ $member->user->first_name }} {{ $member->user->last_name }}<span class="text-success fw-semibold">{{ $member->user->reputation }}</span></li>
            @endforeach
            @else
              <li class="list-group-item d-flex justify-content-between align-items-center">there are no members yet</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="bi bi-arrow-left me-1"></i>Retour</a>
      @if ($colocationObject->owner_id === Auth::user()->id)
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="d-flex gap-2">
              <a class="btn btn-outline-primary w-100 mb-2" href="/colocation/manage-members/{{ $member->colocation->id }}"><i class="bi bi-person-circle"></i> Manager les membres</a>
              <a class="btn btn-outline-primary w-100 mb-2" href="/colocation/expenses/{{ $member->colocation->id }}"><i class="bi bi-receipt me-1"></i>Gérer les dépenses</a>
            </div>  
          </div>
        </div>
      @endif
    </div>
  </div>
</main>
@include("includes.footer")