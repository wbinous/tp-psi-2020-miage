@include('header')
<section class="section">
    <div class="container">
        <h1 class="title">Importer des individus</h1>
        <div class="columns">
            <div class="column is-one-quarter"></div>
            <div class="column">
                <div class="box">
                    <form method="POST" action="/individu/importer" enctype="multipart/form-data">
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
                            <div id="file-js-example" class="file has-name is-boxed is-centered">
                                <label class="file-label">
                                <input class="file-input" accept=".xlsx" type="file" name="fichierImport">
                                <span class="file-cta">
                                    <span class="file-icon"><i class="fas fa-upload"></i></span>
                                    <span class="file-label">Importer excel…</span>
                                </span>
                                <span class="file-name">Aucun fichier selectionné.</span>
                                </label>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link is-large">Importer</button>
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
const fileInput = document.querySelector('#file-js-example input[type=file]');
fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
    }
}
</script>
@include('footer')