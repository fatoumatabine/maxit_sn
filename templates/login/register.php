<?php
$title = 'Inscription - MAXITSA';
$showNavbar = false;
ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-primary': '#ff6b35',
                        'custom-light': '#fff5f2',
                        'custom-dark': '#374151',
                        'custom-darker': '#1f2937',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-black from-custom-light to-orange-200 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-custom-primary rounded-full flex items-center justify-center text-white text-3xl">
                        <i class=" fa fa-credit-card"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-extrabold text-black-900 mb-2">
                    Créer votre compte
                </h2>
                <p class="text-sm text-custom-dark">
                    Rejoignez MAXITSA pour accéder à votre espace personnel
                </p>
            </div>

            <!-- Messages d'erreur/succès -->
            <?php if (isset($error) && $error): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <?php if (isset($success) && $success): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                <?= htmlspecialchars($success) ?>
            </div>
            <?php endif; ?>

            <!-- Formulaire -->
            <form class="space-y-6" method="POST" action="/register" enctype="multipart/form-data" id="registerForm">
                <!-- Prénom et Nom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-dark mb-1">
                            Prénom 
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-user text-custom-primary"></i>
                            </div>
                            <input
                                id="prenom"
                                name="prenom"
                                type="text"
                                required
                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Prénom"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="nom" class="block text-sm font-medium text-custom-dark mb-1">
                            Nom 
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="fa fa-user text-custom-primary"></i>
                            </div>
                            <input
                                id="nom"
                                name="nom"
                                type="text"
                                required
                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Nom"
                            />
                        </div>
                    </div>
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-dark mb-1">
                        Numéro de téléphone 
                        <span class="text-xs text-gray-500"></span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-3 text-dark opacity-60">
                            <i class="text-custom-primary fa fa-phone"></i>
                        </div>
                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                          
                            class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                            placeholder=""
                            pattern="^(77|78|76|75|70)[0-9]{7}$"
                            title="Numéro portable sénégalais (ex: 771234567)"
                        />
                    </div>
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-medium text-custom-dark mb-1">
                        Mot de passe 
                        <span class="text-xs text-gray-500">(8+ caractères)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-3 text-dark opacity-60">
                            <i class="text-custom-primary fa fa-lock"></i>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                          
                            minlength="8"
                            class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                            placeholder="Créer un mot de passe fort"
                        />
                    </div>
                    <div id="password-strength" class="mt-1 text-xs"></div>
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-custom-dark mb-1">
                        Confirmer le mot de passe 
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-3 text-dark opacity-60">
                            <i class="text-custom-primary fa fa-lock"></i>
                        </div>
                        <input
                            id="confirm_password"
                            name="confirm_password"
                            type="password"
                          
                            class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                            placeholder="Confirmer le mot de passe"
                        />
                    </div>
                </div>

                <!-- CNI et Adresse -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="numerosCarteIdentite" class="block text-sm font-medium text-custom-dark mb-1">
                            Numéro de CNI 
                            <span class="text-xs text-gray-500"></span>
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="text-custom-primary fa fa-id-card"></i>
                            </div>
                            <input
                                id="numerosCarteIdentite"
                                name="numerosCarteIdentite"
                                type="text"
                              
                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="11992001000012"
                                pattern="^[1-2][0-9]{13}$"
                                title="CNI sénégalais "
                            />
                        </div>
                    </div>

                    <div>
                        <label for="adresse" class="block text-sm font-medium text-dark mb-1">
                            Adresse 
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 top-3 text-custom-dark opacity-60">
                                <i class="text-custom-primary fa fa-map-marker-alt"></i>
                            </div>
                            <input
                                id="adresse"
                                name="adresse"
                                type="text"
                              
                                minlength="5"
                                class="w-full pl-12 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-custom-darker rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary focus:border-transparent transition-all duration-200"
                                placeholder="Votre adresse complète"
                            />
                        </div>
                    </div>
                </div>

                <!-- Upload des photos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1">
                            Photo carte d'identité (Recto) 
                        </label>
                        <input
                            type="file"
                            name="idPhotoFront"
                            accept="image/"
                          
                            class="block w-full text-sm text-custom-dark file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-custom-primary hover:file:bg-orange-100 border border-gray-300 rounded-lg"
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark mb-1">
                            Photo carte d'identité (Verso) 
                        </label>
                        <input
                            type="file"
                            name="idPhotoBack"
                            accept="image/"
                          
                            class="block w-full text-sm text-custom-dark file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-custom-primary hover:file:bg-orange-100 border border-gray-300 rounded-lg"
                        />
                    </div>
                </div>

                <!-- Bouton de soumission -->
                <div>
                    <button
                        type="submit"
                        class="w-full bg-custom-primary hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center"
                        id="submitBtn"
                    >
                        <span id="submitText">Créer le compte</span>
                    </button>
                </div>

                <!-- Lien de connexion -->
                <div class="text-center">
                    <p class="text-sm text-custom-dark">
                        Vous avez déjà un compte ?
                        <a href="/login" class="font-medium text-custom-primary hover:text-orange-600 transition-colors">
                            Se connecter
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animation du formulaire
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            const text = document.getElementById('submitText');
            
            text.textContent = 'Création en cours...';
            btn.disabled = true;
            btn.classList.add('opacity-60');
        });

        // Validation du téléphone sénégalais
        document.getElementById('phone').addEventListener('input', function(e) {
            const phone = e.target.value.replace(/\D/g, '');
            const isValid = /^(77|78|76|75|70)\d{7}$/.test(phone);
            
            if (phone.length > 0) {
                if (isValid) {
                    e.target.classList.remove('border-red-500', 'bg-red-50');
                    e.target.classList.add('border-green-500', 'bg-green-50');
                } else {
                    e.target.classList.remove('border-green-500', 'bg-green-50');
                    e.target.classList.add('border-red-500', 'bg-red-50');
                }
            } else {
                e.target.classList.remove('border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
            }
        });

        // Validation de la CNI sénégalaise
        document.getElementById('numerosCarteIdentite').addEventListener('input', function(e) {
            const cni = e.target.value.replace(/\D/g, '');
            const isValid = /^[1-2]\d{13}$/.test(cni);
            
            if (cni.length > 0) {
                if (isValid) {
                    e.target.classList.remove('border-red-500', 'bg-red-50');
                    e.target.classList.add('border-green-500', 'bg-green-50');
                } else {
                    e.target.classList.remove('border-green-500', 'bg-green-50');
                    e.target.classList.add('border-red-500', 'bg-red-50');
                }
            } else {
                e.target.classList.remove('border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
            }
        });

        // Validation de la force du mot de passe
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthDiv = document.getElementById('password-strength');
            
            let score = 0;
            let feedback = [];
            
            if (password.length >= 8) score++;
            else feedback.push('8+ caractères');
            
            if (/[A-Z]/.test(password)) score++;
            else feedback.push('majuscule');
            
            if (/[a-z]/.test(password)) score++;
            else feedback.push('minuscule');
            
            if (/\d/.test(password)) score++;
            else feedback.push('chiffre');
            
            if (/[^a-zA-Z0-9]/.test(password)) score++;
            else feedback.push('caractère spécial');
            
            if (password.length === 0) {
                strengthDiv.innerHTML = '';
                e.target.classList.remove('border-red-500', 'border-yellow-500', 'border-green-500');
            } else if (score < 3) {
                strengthDiv.innerHTML = '<span class="text-red-500">Faible - Manque: ' + feedback.join(', ') + '</span>';
                e.target.classList.remove('border-yellow-500', 'border-green-500');
                e.target.classList.add('border-red-500');
            } else if (score < 5) {
                strengthDiv.innerHTML = '<span class="text-yellow-500">Moyen - Manque: ' + feedback.join(', ') + '</span>';
                e.target.classList.remove('border-red-500', 'border-green-500');
                e.target.classList.add('border-yellow-500');
            } else {
                strengthDiv.innerHTML = '<span class="text-green-500">Fort ✓</span>';
                e.target.classList.remove('border-red-500', 'border-yellow-500');
                e.target.classList.add('border-green-500');
            }
        });

        // Validation de la confirmation du mot de passe
        document.getElementById('confirm_password').addEventListener('input', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = e.target.value;
            
            if (confirmPassword.length === 0) {
                e.target.classList.remove('border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
            } else if (password !== confirmPassword) {
                e.target.classList.remove('border-green-500', 'bg-green-50');
                e.target.classList.add('border-red-500', 'bg-red-50');
            } else {
                e.target.classList.remove('border-red-500', 'bg-red-50');
                e.target.classList.add('border-green-500', 'bg-green-50');
            }
        });

        // Validation des noms
        ['prenom', 'nom'].forEach(fieldId => {
            document.getElementById(fieldId).addEventListener('input', function(e) {
                const value = e.target.value;
                const isValid = /^[a-zA-ZÀ-ÿ\s\-']+$/.test(value) && value.length >= 2;
                
                if (value.length === 0) {
                    e.target.classList.remove('border-red-500', 'border-green-500');
                } else if (isValid) {
                    e.target.classList.remove('border-red-500');
                    e.target.classList.add('border-green-500');
                } else {
                    e.target.classList.remove('border-green-500');
                    e.target.classList.add('border-red-500');
                }
            });
        });

        // Validation de l'adresse
        document.getElementById('adresse').addEventListener('input', function(e) {
            const value = e.target.value;
            const isValid = value.length >= 5;
            
            if (value.length === 0) {
                e.target.classList.remove('border-red-500', 'border-green-500');
            } else if (isValid) {
                e.target.classList.remove('border-red-500');
                e.target.classList.add('border-green-500');
            } else {
                e.target.classList.remove('border-green-500');
                e.target.classList.add('border-red-500');
            }
        });
    </script>
</body>
</html>

<?php
$content = ob_get_clean();
echo $content;
?>