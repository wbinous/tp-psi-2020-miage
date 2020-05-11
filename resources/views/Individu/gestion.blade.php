@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Gestion d'un individu</h1>
        <div class="columns">
            <div class="column is-one-quarter"></div>
            <div class="column">
                <div class="box">
                    <form method="POST" action="/individu/gestion/{{ $individu['idIndividu'] ?? null }}">
                        @if(!empty($success))
                        <div id="notifMsg" class="notification is-success is-light">
                            <button id="btnDelete" class="delete"></button>
                            {{ $success }}
                        </div>
                        @elseif(!empty($failure))
                        <div id="notifMsg" class="notification is-danger is-light">
                            <button id="btnDelete" class="delete"></button>
                            {{ $failure }}
                        </div>
                        @endif
                        {!! csrf_field() !!}
                        <div class="field">
                            <label class="label">Nom</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="nom" class="input" value="{{ $individu['nom']  ?? null }}" type="text" placeholder="Requis" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Prénom</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="prenom" class="input" value="{{ $individu['prenom']  ?? null }}" type="text" placeholder="Requis" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" name="email" type="email" placeholder="test@fake.com" value="{{ $individu['email']  ?? null }}" required>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Num</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="num" class="input" value="{{ $individu['num']  ?? null }}" type="number" placeholder="Requis" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-id-card"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Statut</label>
                            <div class="control">
                                <div class="select">
                                    <select name="statut" required>
                                        <option disabled selected>Choisir...</option>
                                        @foreach($statuts as $statut)
                                            @if(!empty($individu) && $statut['idStatut'] == $individu['idStatut'])
                                            <option value="{{ $statut['idStatut'] }}" selected>{{ $statut['libelle'] }}</option>
                                            @else
                                            <option value="{{ $statut['idStatut'] }}">{{ $statut['libelle'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Annuaire</label>
                            <div class="control">
                                <div class="select">
                                    <select name="annuaire" required>
                                        <option disabled selected>Choisir...</option>
                                        @foreach($annuaires as $annuaire)
                                            @if(!empty($individu) && $annuaire['idAnnuaire'] == $individu['idAnnuaire'])
                                            <option value="{{ $annuaire['idAnnuaire'] }}" selected>{{ $annuaire['libelle'] }}</option>
                                            @else
                                            <option value="{{ $annuaire['idAnnuaire'] }}">{{ $annuaire['libelle'] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Groupes</label>
                            @foreach($groupes as $groupe)
                            <div>
                                <label class="checkbox">
                                    @if(!empty($checkedGroups) && !$checkedGroups->where('idGroupe', $groupe['idGroupe'])->isEmpty())
                                    <input name="groupes[]" value="{{ $groupe['idGroupe'] }}" type="checkbox" checked>
                                    @else
                                    <input name="groupes[]" value="{{ $groupe['idGroupe'] }}" type="checkbox">
                                    @endif
                                    {{ $groupe['libelle'] }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link is-large">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-one-quarter"></div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#btnDelete').click(function() {
            $('#notifMsg').toggle();
        });
    });
</script>
@include('footer')