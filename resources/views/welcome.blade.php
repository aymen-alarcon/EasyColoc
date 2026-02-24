@include("includes.header")
    <style>
        body {
            background: #f8fafc;
        }
        .hero {
            padding: 120px 0;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: white;
        }
        .feature-icon {
            font-size: 2.3rem;
            color: #0d6efd;
        }
    </style>
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Gérez vos colocations plus simplement</h1>
        <p class="lead mt-3">
            Suivez les dépenses, répartissez automatiquement les dettes<br>
            et gardez une vue claire de « qui doit quoi à qui ».
        </p>

        <div class="mt-4">
        <a href="/login" class="btn btn-light btn-lg px-4"><i class="bi bi-play-circle me-2"></i>Commencer</a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-semibold">Fonctionnalités principales</h2>

        <div class="row g-4 text-center">

            <div class="col-md-4">
                <i class="bi bi-people-fill feature-icon mb-3"></i>
                <h5>Gestion de colocation</h5>
                <p class="text-muted">Invitez vos colocataires et gérez les rôles (owner, members).</p>
            </div>

            <div class="col-md-4">
                <i class="bi bi-cash-coin feature-icon mb-3"></i>
                <h5>Suivi des dépenses</h5>
                <p class="text-muted">Ajoutez vos achats et partagez-les automatiquement.</p>
            </div>

            <div class="col-md-4">
                <i class="bi bi-arrow-left-right feature-icon mb-3"></i>
                <h5>Qui doit quoi</h5>
                <p class="text-muted">Vue simplifiée des dettes entre colocataires.</p>
            </div>

        </div>
    </div>
</section>
@include("includes.footer")