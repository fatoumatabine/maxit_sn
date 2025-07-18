<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - MAXITSA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff6b35',
                        'primary-hover': '#e55a2b',
                        secondary: '#f7931e'
                        
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">


        <div class="lg:w-1/2 bg-gradient-to-br from-primary to-secondary flex flex-col justify-center items-center p-8 lg:p-12 relative overflow-hidden">
            <img src="/uploads/images/bnt.png" alt="Visuel MAXITSA" class="absolute inset-0 w-full h-full object-cover z-0" style="background: #fff;">
            <div class="absolute inset-0 bg-black bg-opacity-20 z-10"></div>
            <!-- Content -->
            
        </div>

        <!-- Panneau de droite -->
        <div class="lg:w-1/2 flex items-center bg-[#FFFFF] justify-center p-6 lg:p-12">
            <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl p-8 lg:p-12">
                
                <div class="flex items-center mb-8">
                    <div class="bg-primary text-white px-6 py-3 rounded-full font-bold text-xl mr-4">
                        MaxitSa
                    </div>
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">Connexion</h2>
                    </div>
                </div>
                
                <p class="text-gray-600 mb-8 text-lg">
                    Connectez-vous à votre compte pour accéder aux services
                </p>

                <!-- Messages d'erreur/succès -->
                <div id="errorMessage" class="hidden bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-400 mr-3"></i>
                        <p class="text-red-700"></p>
                    </div>
                </div>

                <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <p class="text-green-700"></p>
                    </div>
                </div>

                <!-- Formulaire -->
         
                   <form method="POST" action="/login" id="loginForm"  >

                    <div>
                        <label for="loginField" class="block text-lg font-medium text-gray-700 mb-3">
                            <i class="fas fa-user mr-2 text-primary"></i>
                            Téléphone ou Email
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                id="loginField"
                                name="login"
                                class="w-full px-6 py-4 pl-12 text-lg border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Numéro de téléphone ou email"
                                autocomplete="username"
                                
                            >
                            <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Champ mot de passe -->
                    <div>
                        <label for="password" class="block text-lg font-medium text-gray-700 mb-3">
                            <i class="fas fa-lock mr-2 text-primary"></i>
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="w-full px-6 py-4 pl-12 text-lg border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary transition-all duration-200 bg-gray-50 focus:bg-white pr-14"
                                placeholder="Mot de passe"
                                autocomplete="current-password"
                                
                            >
                            <i class="fas fa-key absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                                aria-label="Afficher le mot de passe"
                            >
                                <i id="eyeIcon" class="fas fa-eye text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Se souvenir de moi -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-lg text-gray-700 cursor-pointer">
                            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-primary border-2 border-gray-300 rounded focus:ring-primary focus:ring-2 mr-3">
                            <span>Se souvenir de moi</span>
                        </label>
                        <a href="#" class="text-primary hover:text-primary-hover font-medium text-lg transition-colors">
                            <i class="fas fa-question-circle mr-1"></i>
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Bouton de connexion -->
                    <button 
                      
                        class="w-full bg-primary hover:bg-primary-hover text-white font-bold py-4 px-8 rounded-xl text-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        <span id="loginText">Se connecter</span>
                    </button>
                </form>

                <!-- Lien d'inscription -->
                <div class="text-center mt-8 pt-8 border-t border-gray-200">
                    <p class="text-lg text-gray-600">
                        <i class="fas fa-user-plus mr-2 text-gray-400"></i>
                        Vous n'avez pas de compte ?
                        <a href="/register" class="text-primary hover:text-primary-hover font-semibold ml-2 transition-colors">
                            <i class="fas fa-arrow-right mr-1"></i>
                            Créer un compte
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>