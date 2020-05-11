@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Gestion d'un groupe</h1>
        <div class="columns">
            <div class="column is-one-quarter"></div>
            <div class="column">
                <div class="box">
                    <form method="POST" action="/groupe/{{ (!empty($groupe['idGroupe'])) ? $groupe['idGroupe'].'/' : null }}gestion">
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
                            <label class="label">Nom du groupe</label>
                            <div class="control">
                                <input name="libelle" class="input" value="{{ $groupe['libelle']  ?? null }}" type="text" placeholder="Requis" required>
                            </div>
                        </div>
                        <label class="label">Gestion des membres</label>
                        <div class="field has-addons">
                            <div class="control">
                                <input id="rechercher" class="input" type="text" placeholder="ex : 340001">
                                <p class="help">Veuillez entrer un numéro d'étudiant valide qui n'est pas présent dans la liste.</p>
                                <div id="resultatRecherche"></div>
                            </div>
                            <div class="control">
                                <button id="rechercherBtn" class="button is-info" disabled>Ajouter</button>
                            </div>
                        </div>
                        <div id="selectedIndividus">
                        @if(!empty($individus))
                            @foreach($individus as $individu)
                            <div id='individu-{{ $individu["idIndividu"] ?? null }}' class='field'>
                                <p class='control'>
                                    <input style="width:95%;vertical-align: text-bottom;" class='input is-static' type='text' value='{{ $individu["prenom"]." ".$individu["nom"]  ?? null }}' readonly>
                                    <button style='vertical-align: super;' class="delete is-medium deleteIndividuBtn"></button>
                                    <input type='hidden' name='selectedIndividus[]' value='{{ $individu["idIndividu"] ?? null }}'>
                                </p>
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-one-quarter"></div>
        </div>
    </div>
</section>
<script type='text/javascript'>
    $(document).ready(function() {
        let individu = {};
        $('#btnDelete').click(function(e) {
            e.preventDefault();
            $('#notifMsg').toggle();
        });

        $('#rechercher').bind('input', function() {
            $('#rechercherBtn').prop('disabled', true);
            $('#resultatRecherche').empty();
            if($(this).val()) {
                // Chercher si le numero entré retourne un individu
                let request =
                $.ajax({
                    type: "GET",
                    url: "/groupe/ajouter/"+$(this).val(),
                    beforeSend: function () {
                        $('#rechercherBtn').addClass("is-loading");
                    }
                });
                request.done(function (output) {
                    individu = JSON.parse(request.responseText).resultat;
                    // si oui, dégriser le bouton ajouter pour permettre l'ajout
                    if(individu !== null && $('#individu-'+individu.idIndividu).length == 0) {
                        console.log("Utilisateur trouvé!");
                        $('#rechercherBtn').prop('disabled', false);
                        $('#resultatRecherche').append('<span class="box">'+individu.nom+' '+individu.prenom+'</span>');
                    }
                });
                request.fail(function (error) {
                    console.error('Echec lors de l\'envoi.');
                });
                request.always(function () {
                    $('#rechercherBtn').removeClass("is-loading");
                });
            }

        });

        $('#rechercherBtn').click(function(e) {
            e.preventDefault();
            $('#selectedIndividus').append("<div id='individu-"+individu.idIndividu+"' class='field'><p class='control'><input style='width:95%;vertical-align: text-bottom;' class='input is-static' type='text' value='"+individu.nom+" "+individu.prenom+"' readonly><button style='vertical-align: super;' class='delete is-medium deleteIndividuBtn'></button><input type='hidden' name='selectedIndividus[]' value='"+individu.idIndividu+"'></p></div>");
            $('#rechercher').val('');
            $('#rechercher').trigger('input', function() {
                $('#rechercher').val('');
            });
        });

        $('.deleteIndividuBtn').click(function(e) {
            e.preventDefault();
            $(this).closest('div')[0].remove();
        });
    });
</script>
@include('footer')