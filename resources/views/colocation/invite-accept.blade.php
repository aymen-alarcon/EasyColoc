@include("includes.header")
<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card shadow-sm">
        <div class="card-body p-4">
      <form class="row g-3" action="/invite/join" method="POST">
        @csrf
        @method("PUT")
        <div class="col-md-12">
          <label class="form-label required">Token</label>
          <input type="text" name="token" class="form-control" required placeholder="membre@mail.com">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-send me-1"></i>Accepter l'invitation</button>
      </form>
        </div>
      </div>
    </div>
  </div>
</main>

@include("includes.footer")