@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Ajouter/Supprimer des individus du groupe {{ $groupe['libelle'] }}</h1>
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
                            <label class="label">Groupes</label>
                            @foreach($individus as $individu)
                            <div>
                                <label class="checkbox">
                                    @if(!empty($checkedIndividus) && !$checkedIndividus->where('idIndividu', $individu['idIndividu'])->isEmpty())
                                    <input name="individus[]" value="{{ $groupe['idGroupe'] }}" type="checkbox" checked>
                                    @else
                                    <input name="individus[]" value="{{ $groupe['idGroupe'] }}" type="checkbox">
                                    @endif
                                    {{ $individu['nom']. ' '.$individu['prenom'] }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link is-large">Mettre à jour le groupe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-one-quarter"></div>
        </div>
    </div>
</section>
@include('footer')