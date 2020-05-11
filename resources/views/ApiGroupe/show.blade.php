@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Liste des API</h1>
        @if(!empty($apis))
        <div class="columns">
            <div class="column is-one-quarter"></div>
            <div class="box column">
                @foreach($apis as $api)
                <div style="margin:15px;" class="has-text-centered">
                    <a href="{{ route('getIndividusApi', $api['idGroupe']) }}" class="button is-warning is-light is-large">Récuperer les individus du groupe {{ $api['libelle'] }}</a>
                </div>
                @endforeach
            </div>
            <div class="column is-one-quarter"></div>
        </div>
        @else
        <div class="has-text-centered">
            <span>Aucune API n'a pu être trouvée.</span>
        </div>
        @endif
    </div>
</section>
@include('footer')