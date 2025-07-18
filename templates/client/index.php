<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - Dashboard Bancaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-primary': '#FF8303',
                        'orange-light': '#FFB366',
                        'gray-dark': '#2C2C2C',
                        'black-dark': '#1A1A1A',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="bg-orange-primary p-2 rounded-lg">
                        <i class="fas fa-user-tie text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-orange-primary">Espace Client</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-circle text-gray-dark text-lg"></i>
                        <span class="text-gray-dark font-medium"></span>
                    </div>
                    <form action="/logout" method='POST'>
                    <button type="submit"class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                         Déconnexion
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-black-dark min-h-screen shadow-xl">
            <div class="p-6">
                <!-- Sidebar Header -->
                <div class="flex items-center space-x-3 mb-8 pb-6 border-b border-gray-700">
                    <div class="w-12 h-12 bg-orange-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Binetou Fall</h3>
                        <p class="text-gray-400 text-sm">Client Premium</p>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="/account" class="flex items-center space-x-3 text-white bg-orange-primary px-4 py-3 rounded-lg font-medium transition-all hover:bg-orange-light group">
                        <i class="fas fa-wallet text-white group-hover:text-white"></i>
                        <span>Mes comptes</span>
                    </a>
                    <a href="/account/create" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg font-medium transition-all group">
                        <i class="fas fa-plus-circle text-orange-primary group-hover:text-orange-light"></i>
                        <span>Créer un compte</span>
                    </a>
                    <a href="#transactions" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg font-medium transition-all group">
                        <i class="fas fa-exchange-alt text-orange-primary group-hover:text-orange-light"></i>
                        <span>Transactions</span>
                    </a>
                    <a href="#profile" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg font-medium transition-all group">
                        <i class="fas fa-user text-orange-primary group-hover:text-orange-light"></i>
                        <span>Mon profil</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg font-medium transition-all group">
                        <i class="fas fa-cog text-orange-primary group-hover:text-orange-light"></i>
                        <span>Paramètres</span>
                    </a>
                    <button class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-gray-800 px-4 py-3 rounded-lg font-medium transition-all group">
                        <i class="fas fa-sign-out-alt text-orange-primary group-hover:text-orange-light"></i>
                        <span>Déconnexion</span>
                    </button>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-50">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Tableau de bord</h1>
                <p class="text-black">Bienvenue dans votre espace client</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                <!-- Solde Total -->
                <div class="bg-white rounded-2xl shadow-sm p-10 border-l-8 border-orange-primary hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-sm font-medium text-gray-600 mb-1">Solde total</h6>
                            <span class="text-2xl font-bold text-gray-800"> 1 250 000 CFA</span>
                            <p class="text-xs text-green-600 mt-1">
                            </p>
                        </div>
                        <div class="bg-orange-primary p-3 rounded-full">
                            <i class="fas fa-money-bill-wave text-black text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Compte Courant -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border-l-8 border-orange-primary hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>depott</h6>
                            <span class="text-2xl font-bold text-gray-800"> 800 000 CFA</span>
                        </div>
                        <div class="bg-orange-primary p-3 rounded-full">
                            <i class="fas fa-piggy-bank text-black text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Compte Épargne -->
                <div class="bg-white rounded-2xl shadow-sm p-6 border-l-8 border-orange-primary hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-sm font-medium text-gray-600 mb-1">retrait</h6>
                            <span class="text-2xl font-bold text-black"> 450 000 CFA</span>
                            <p class="text-xs text-green-600 mt-1">
                            </p>
                        </div>
                        <div class="bg-orange-primary p-3 rounded-full">
                            <i class="fas fa-coins text-black text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>



            <div class="grid grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Transactions -->
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-2xl shadow-sm p-6" id="transactions">
                        <div class="flex items-center justify-between mb-6">
                            <h5 class="text-lg font-semibold text-gray-800">
                                <i class="fas fa-list mr-2 text-orange-primary"></i>
                                Dernières transactions
                            </h5>
                            <button class="text-orange-primary hover:text-orange-light text-sm font-medium">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto max-w-10xl mx-auto">
                            <table class="w-full  text-base">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-[13%] py-4 text-left rounded-tl-lg">Date</th>
                                        <th class="px-[12%] py-4 text-left ">Type</th>
                                        <th class="px-[12%] py-4 text-left rounded-tr-lg">Montant</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">14/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-orange-primary text-white px-3 py-2 rounded-full text-sm font-medium">Paiement</span>
                                        </td>
                                        <td class="px-[12%] py-2 font-medium text-green-600">200 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">13/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block  border border-orange-500 text-black px-3 py-2 rounded-full text-sm font-medium">Retrait</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-red-600">-  50 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">12/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-white text-gray-800 border border-gray-800 px-3 py-2 rounded-full text-sm font-medium">Dépôt</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-green-600">  100 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">11/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-orange-primary text-white px-3 py-2 rounded-full text-sm font-medium">Paiement</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-green-600"> 30 000 CFA </td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">10/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block  border border-orange-500 text-black px-3 py-2 rounded-full text-sm font-medium">Retrait</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-red-600"> 20 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">09/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-orange-primary text-white px-3 py-2 rounded-full text-sm font-medium">Paiement</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-green-600">  80 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">08/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block  border border-orange-500 text-black px-3 py-2 rounded-full text-sm font-medium">Retrait</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-red-600">  10 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">07/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-white text-gray-800 border border-gray-800 px-3 py-2 rounded-full text-sm font-medium">Dépôt</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-green-600"> 60 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">06/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block bg-orange-primary text-white px-3 py-2 rounded-full text-sm font-medium">Paiement</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-green-600"> 40 000 CFA</td>
                                    </tr>
                                    <tr class="hover:bg-orange-100 transition-colors">
                                        <td class="px-[12%] py-4 text-black">05/07/2025</td>
                                        <td class="px-[12%] py-4">
                                            <span class="inline-block  border border-orange-500 text-black px-3 py-2 rounded-full text-sm font-medium">Retrait</span>
                                        </td>
                                        <td class="px-[12%] py-4 font-medium text-red-600"> 15 000CFA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            <button class="bg-orange-primary hover:bg-orange-light text-white px-6 py-2 rounded-full text-sm font-medium transition-colors">
                                Voir toutes les transactions
                            </button>
                        </div>
                    </div>
                </div>

                <
            </div>
        </main>
    </div>

   

    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(46, 42, 42, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>