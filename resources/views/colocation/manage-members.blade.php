@include("includes.header")
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Membres de la colocation</h1>
            <a href="/colocation/invite"><i class="bi bi-person-plus me-1"></i> Inviter un membre</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">

                    <table class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nom</th>
                                <th>Rôle</th>
                                <th>Réputation</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)                                
                                <tr>
                                    <td>{{ $member->user->first_name }} {{ $member->user->last_name }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            @if ($member->colocation->owner_id === $member->user_id)
                                                Owner
                                            @else
                                                Member
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        {{ $member->user->reputation }}
                                    </td>

                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="bi bi-lock"></i>
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


    <div class="modal fade" id="modalRemoveMember" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="form-remove-member">

                <div class="modal-header">
                    <h5 class="modal-title">Retirer le membre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <p>
                        Voulez‑vous vraiment retirer <strong id="remove-member-name"></strong> de la colocation ?
                    </p>

                    <div id="remove-warning-debt" class="alert alert-warning d-none">
                        Ce membre a une dette de <strong id="remove-member-balance"></strong> DH.<br>
                        Rappel : <strong>La dette sera imputée à l'Owner</strong> selon les règles EasyColoc.
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger">
                        <i class="bi bi-person-dash me-1"></i> Retirer le membre
                    </button>
                </div>

            </form>
        </div>
    </div>
@include("includes.footer")