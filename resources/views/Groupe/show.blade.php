@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Liste des groupes</h1>
        @if(!empty($groupes))
        <table class="table table is-bordered table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th class="has-text-centered">#</th>
                    <th class="has-text-centered">Libelle</th>
                    <th class="has-text-centered" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groupes as $groupe)
                <tr>
                    <td class="has-text-centered">{{ $groupe['idGroupe'] }}</td>
                    <td class="has-text-centered">{{ $groupe['libelle'] }}</td>
                    <td class="has-text-centered"><a href="{{ route('telechargerExport', $groupe['idGroupe']) }}" class="button is-success"><span>Exporter</span><span class="icon is-small"><i class="fas fa-file-excel"></i></span></a></td>
                    <td class="has-text-centered"><a href="{{ route('modifierGroupe', $groupe['idGroupe']) }}" class="button is-primary is-outlined">Modifier</a></td>
                    <td class="has-text-centered"><a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?');" href="{{ route('supprimerGroupe', $groupe['idGroupe']) }}" class="button is-danger is-outlined">Supprimer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="has-text-centered">
            <span>Aucun groupe n'a pu être trouvé.</span>
        </div>
        @endif
        <a href="{{ route('creerGroupe') }}" class="inline-block button is-info">Créer un groupe</a>
    </div>
</section>
@include('footer')