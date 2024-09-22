<!-- Container principal -->
<div class="container py-5">
        <!-- Titre -->
        <div class="text-center mb-5">
            <h1 class="display-4">Uploader un fichier</h1>
            <p class="lead text-muted">Choisissez un fichier à uploader et cliquez sur envoyer.</p>
        </div>

        <!-- Formulaire -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <!-- Bouton pour choisir un fichier -->
                            <div class="mb-4 text-center">
                                <label class="btn btn-outline-dark btn-lg btn-square">
                                    <i class="fas fa-cloud-upload-alt"></i> Choisir un fichier
                                    <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;">
                                </label>
                            </div>

                            <!-- Affichage du nom du fichier sélectionné -->
                            <div id="fileName" class="text-center text-muted mb-3" style="font-size: 0.9rem;">
                                Aucun fichier sélectionné.
                            </div>

                            <!-- Bouton pour envoyer le fichier -->
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane"></i> Envoyer le fichier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    const fileInput = document.getElementById('fileToUpload');
    const fileNameDisplay = document.getElementById('fileName');

    // Mettre à jour le texte lorsqu'un fichier est sélectionné
    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = "Aucun fichier sélectionné.";
        }
    });

    // Empêcher l'envoi si aucun fichier n'est sélectionné
    document.querySelector('form').addEventListener('submit', function(e) {
        if (fileInput.files.length === 0) {
            e.preventDefault(); // Empêcher l'envoi du formulaire
            alert("Veuillez sélectionner un fichier avant d'envoyer.");
            fileNameDisplay.textContent = "Aucun fichier sélectionné.";
        }
    });
</script>
    <!-- Lien vers Bootstrap JS et Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>