@include("includes.header")
<main class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Inviter un membre</h1>
    <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="bi bi-arrow-left me-1"></i>Retour</a>
  </div>
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <form class="row g-3" action="/invite/accept/{token}/{invitation}" method="POST">
        @csrf
        @method("POST")

        <div class="col-md-12">
          <label class="form-label required">Email du destinataire</label>
          <input type="email" name="email" class="form-control" required placeholder="membre@mail.com">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-send me-1"></i>Envoyer l'invitation</button>
      </form>
    </div>
  </div>
</main>
@include("includes.footer")