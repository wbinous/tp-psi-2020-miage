@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Liste des individus</h1>
        @if(!empty($individus))
        <table class="table table is-bordered table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse mail</th>
                    <th>Num</th>
                    <th>Statut</th>
                    <th>Annuaire</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($individus as $individu)
                <tr>
                    <td class="has-text-centered">{{ $individu['idIndividu'] }}</td>
                    <td class="has-text-centered">{{ $individu['nom'] }}</td>
                    <td class="has-text-centered">{{ $individu['prenom'] }}</td>
                    <td class="has-text-centered">{{ $individu['email'] }}</td>
                    <td class="has-text-centered">{{ $individu['num'] }}</td>
                    <td class="has-text-centered">{{ $individu['idStatut'] }}</td>
                    <td class="has-text-centered">{{ $individu['idAnnuaire'] }}</td>
                    <td class="has-text-centered"><a href="{{ route('modifierIndividu', $individu['idIndividu']) }}" class="button is-primary is-outlined">Modifier</a></td>
                    <td class="has-text-centered"><a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet individu ?');" href="{{ route('supprimerIndividu', $individu['idIndividu']) }}" class="button is-danger is-outlined">Supprimer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $individus->links() }}
        @else
        <div class="has-text-centered">
            <span>Aucun individu n'a pu être trouvé.</span>
        </div>
        @endif
        <a href="{{ route('creerIndividu') }}" class="inline-block button is-info">Ajouter un individu</a>
        <a href="{{ route('importerIndividus') }}" class="button is-success"><span>Importer</span><span class="icon is-small"><i class="fas fa-file-excel"></i></span></a>
    </div>
</section>
@include('footer')